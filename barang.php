<?php 
require_once('database.php');
$data=showdataBarang();
$nomor=0;
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Peminjaman barang</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
          menu
        </a>
        <div class="dropdown-menu">
          <a class="dropdown-item" href="user.php">user</a>
          <a class="dropdown-item" href="barang.php">barang</a>
          <div class="dropdown-divider"></div>
        </div>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="pengembalian.php">Pengembalian<span class="sr-only">(current)</span></a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
    <a class="btn btn-outline-success my-2 my-sm-0" type="button" href="logout.php" >Logout</a>
  </form>
  </div>
</nav>

<center><h1>Barang</h1></center>

<table class="table">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">kode brg</th>
      <th scope="col">nama brg</th>
      <th scope="col">kategori</th>
      <th scope="col">merk</th>
      <th scope="col">jumlah</th>
      <th scope="col">action</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($data as $barang) : ?>
      <?php $nomor++; ?>
    <tr>
    <th scope="row"><?php echo "$nomor"; ?></th>
                        <td><?php echo "$barang[kode_brg]";?></td>
                        <td><?php echo "$barang[nama_brg]";?></td>
                        <td><?php echo "$barang[kategori]";?></td>
                        <td><?php echo "$barang[merk]";?></td>
                        <td><?php echo "$barang[jumlah]";?></td>
                        <td>
                            <?php
                                echo "
                                <a href='editbarang.php?id=$barang[id]'><button type='button' class='btn btn-warning btn-sm'>Edit</button></a>
                                |
                                <a href='javascript:deleteData(".$barang['id'].")'><button type='button' class='btn btn-danger btn-sm'>Hapus</button></a>
                                "
                            ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
    </tr>
  </tbody>
</table>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    -->
  </body>
</html>