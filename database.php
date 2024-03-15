<?php
    $db_host = "localhost";
    $db_user = "root";
    $db_pass = "";
    $db_name = "inventaris_barang";
    $connect = mysqli_connect($db_host, $db_user, $db_pass, $db_name) or die("Gagal terhubung dengan Database: " . mysqli_error($dbconnect));


    function checkLogin($username, $password)
    {
		global $connect; 
		$uname = $username;
		$upass = $password;		
		$hasil = mysqli_query($connect,"SELECT * from user where username='$uname' and password=md5('$upass')");
		$cek = mysqli_num_rows($hasil);
		if($cek > 0 ){
            $query = mysqli_fetch_array($hasil);
            $_SESSION['id'] = $query['id'];
            $_SESSION['username'] = $query['username'];
            $_SESSION['role'] = $query['role'];
            $_SESSION['no_identitas'] = $query['no_identitas'];
			return true;		
        }
		else {
			return false;
		}	
	}

    
    
    function showdataUser()
    {
        global $connect;    
        $hasil=mysqli_query($connect,"SELECT user.id, user.no_identitas, user.nama, user.status, user.username, user.role from user;");
        $rows=[];
        while($row = mysqli_fetch_assoc($hasil))
        {
            $rows[] = $row;
        }
        return $rows;
    }

    function showdataBarang()
    {
        global $connect;    
        $hasil=mysqli_query($connect,"SELECT barang.id, barang.kode_brg, barang.nama_brg, barang.kategori, barang.merk, barang.jumlah from barang;");
        $rows=[];
        while($row = mysqli_fetch_assoc($hasil))
        {
            $rows[] = $row;
        }
        return $rows;

    }

    function showdataPeminjaman()
    {
    global $connect;    
    $hasil=mysqli_query($connect,"SELECT * FROM peminjaman");
    $rows=[];
    while($row = mysqli_fetch_assoc($hasil))
    {
        $rows[] = $row;
    }
    return $rows;
    }
    
    

    function editData($tablename, $id)
    {
        global $connect;
        $hasil=mysqli_query($connect,"select * from $tablename where id='$id'");
        return $hasil;
    }

    function delete($tablename,$id)
    {
        global $connect;
        $hasil=mysqli_query($connect,"delete from $tablename where id='$id'");
        return $hasil;
    }

    function getBarangSeringDipinjam($limit = 5) {
        global $connect;
    
        $query = "SELECT kode_brg, COUNT(*) as jumlah_pinjam FROM peminjaman GROUP BY kode_brg ORDER BY jumlah DESC LIMIT $limit";
        $result = mysqli_query($connect, $query);
    
        $barang_sering_dipinjam = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $barang_sering_dipinjam[] = $row;
        }
    
        return $barang_sering_dipinjam;
    }
?>