<?php
session_start();

if( !isset($_SESSION["loginRegis"])){ //Apabila belum ada user yang login maka tidak bisa masuk ke bagian booking
  header("Location: loginRegis.php"); //harus login terlebih dahulu
  exit;
}

require 'function.php'; //pengambilan fungsi-fungsi yang ada pada bagian function.php

$mobil = query("SELECT * FROM detailmobil"); // ambil data dari tabel mobil

if ( isset($_POST["submit"])){ //menambahkan detail mobil baru 

    if ( updateDetail($_POST) > 0){
        echo "
            <script>
                alert('Detail data berhasil diubah!');
                document.location.href = 'index2.php';
                </script> 
            ";
    } else {
        echo "
            <script>
                alert('Detail data gagal diubah!');
                document.location.href = 'index2.php';
                </script> 
            ";
    }
}

$hitungarmada = "select count(id_mobil) as jumlah from detailmobil"; //fungsi untuk menampilkan jumlah armada atau jumlah mobil yang ada di tabel detailmobil
$jmlarmada = $conn->query($hitungarmada);
$jmlarmada = mysqli_fetch_row($jmlarmada);

$hitungadmin = "select count(id_user) as jumlah from user where userType = 'admin'"; //fungsi untuk menampilkan jumlah admin pada tabel user
$jmladmin = $conn->query($hitungadmin);
$jmladmin = mysqli_fetch_row($jmladmin);

$hitunguser = "select count(id_user) as jumlah from user where userType = 'user'"; //fungsi untuk menampilkan jumlah user pada tabel user
$jmluser = $conn->query($hitunguser);
$jmluser = mysqli_fetch_row($jmluser);

$hitungpelanggan = "select count(id_pelanggan) as jumlah from datapelanggan"; //fungsi untuk menghitung jumlah pelanggan yang ada pada tabel datapelanggan
$jmlpelanggan = $conn->query($hitungpelanggan);
$jmlpelanggan = mysqli_fetch_row($jmlpelanggan);

$tampil = "SELECT * FROM user"; //fungsi untuk menampilkan user yang sedang login
$tampiluser = $conn->query($tampil);
$tampiluser = mysqli_fetch_assoc($tampiluser);

$id_mobil = $_GET["id_mobil"];
$update = query("SELECT * FROM detailmobil WHERE id_mobil=$id_mobil")[0]; //untuk menampilkan detailmobil sesuai dengan id masing-masing

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Dashboard Armada</title>
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-dark">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <p class="brand-link">
      <img src="img/Logo/12.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3">
      <span class="brand-text">Dmm28 Rent Car</span>
    </p>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <p class="d-block"><?php echo  $_SESSION['username']; ?></p>
          <a type="button" class="btn btn-outline-info btn-sm" class="nav-link" href="logout.php">Logout</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">  
            <li class="nav-header">DASHBOARD</li>
                <li class="nav-item menu-open">
                    <a href="#" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard
                        <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="./index2.php" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Armada</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="./tambahArmada.php" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Tambah Armada</p>
                            </a>
                        </li>  
                        <li class="nav-item">
                            <a href="./updateArmada.php" class="nav-link active disabled">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Update Armada</p>
                            </a>
                        </li>
                    </ul>
                </li>
            <li class="nav-item">
                <a href="./index3.php" class="nav-link">
                <i class="nav-icon fas fa-book"></i>
                <p>Pesanan</p>
                </a>
            </li>
            </ul>
        </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Update Armada</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-cog"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Total Armada</span>
                <span class="info-box-number">
                  <?=$jmlarmada[0]?>
                  <small>Unit</small>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-thumbs-up"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Total Admin</span>
                <span class="info-box-number"><?=$jmladmin[0]?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Pesanan</span>
                <span class="info-box-number"><?=$jmlpelanggan[0]?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Pelanggan</span>
                <span class="info-box-number"><?=$jmluser[0]?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <div class="col-md-12">

            <!-- TABLE: LATEST ORDERS -->
            <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Update Armada</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                        <div class="card-responsive">
                            <form action="" method="POST">
                                <div class="card-body">
                                    <h3>DETAIL MOBIL :</h3>
                                    <div class="row">
                                        <input type="hidden" name="id_mobil" value="<?= $update["id_mobil"]; ?>">
                                        <div class="form-group col-sm-3 mr-3 mt-3">
                                            <label for="InputText">Nama Mobil</label>
                                            <input type="text" class="form-control" name="namaMobil" id="InputText" value="<?= $update["namaMobil"]; ?>">
                                        </div> 
                                        <div class="form-group col-sm-3 mr-3 mt-3">
                                            <label for="InputText">Biaya Sewa</label>
                                            <input type="text" class="form-control" name="biayaSewa" id="InputText" value="<?= $update["biayaSewa"]; ?>">
                                        </div>
                                        <div class="form-group col-sm-4 mr-3 mt-3">
                                            <label for="detail">Detail Mobil</label>
                                            <input type="text" class="form-control" name="detail" id="detail" value="<?= $update["detail"]; ?>">
                                        </div>
                                    </div>
                                    <h3>TAMPILAN MOBIL :</h3>
                                    <div class="row">    
                                        <div class="form-group col-sm-3 mr-3 mt-3">
                                            <label for="gambar" class="form-label">Gambar Mobil</label>
                                            <input type="file" class="form-control" name="gambar" id="gambar" value="<?= $update["gambar"]; ?>" >
                                        </div>
                                        <div class="form-group col-sm-3 mr-3 mt-3">
                                            <label for="tampilMobil" class="form-label">Tampilan Mobil</label>
                                            <input type="file" class="form-control" name="tampilMobil" id="tampilMobil" value="<?= $update["tampilMobil"]; ?>">
                                        </div>
                                        <div class="form-group col-sm-3 mr-3 mt-3">
                                            <label for="interMobil1" class="form-label">Interior 1</label>
                                            <input type="file" class="form-control" name="interMobil1" id="interMobil1" value="<?= $update["interMobil1"]; ?>">
                                        </div>
                                        <div class="form-group col-sm-3 mr-3">
                                            <label for="interMobil2" class="form-label">Interior 2</label>
                                            <input type="file" class="form-control" name="interMobil2" id="interMobil2" value="<?= $update["interMobil2"]; ?>">
                                        </div>
                                        <div class="form-group col-sm-3 mr-3">
                                            <label for="interMobil3" class="form-label">Interior 3</label>
                                            <input type="file" class="form-control" name="interMobil3" id="interMobil3" value="<?= $update["interMobil3"]; ?>">
                                        </div>
                                        <div class="form-group col-sm-3 mr-3">
                                            <label for="exterMobil1" class="form-label">Exterior 1</label>
                                            <input type="file" class="form-control" name="exterMobil1" id="exterMobil1" value="<?= $update["exterMobil1"]; ?>">
                                        </div>
                                        <div class="form-group col-sm-3 mr-3">
                                            <label for="exterMobil2" class="form-label">Exterior 2</label>
                                            <input type="file" class="form-control" name="exterMobil2" id="exterMobil2" value="<?= $update["exterMobil2"]; ?>">
                                        </div>
                                        <div class="form-group col-sm-3 mr-3">
                                            <label for="exterMobil3" class="form-label">Exterior 3</label>
                                            <input type="file" class="form-control" name="exterMobil3" id="exterMobil3" value="<?= $update["exterMobil3"]; ?>">
                                        </div>
                                        <div class="form-group col-sm-3 mr-3 mb-5">
                                            <label for="inputFile" class="form-label">Gambar Review</label>
                                            <input type="file" class="form-control" name="gambarReview" id="inputFile" value="<?= $update["gambarReview"]; ?>">
                                        </div>
                                    </div>
                                    <h3>SPESIFIKASI MOBIL :</h3>
                                    <div class="row" >   
                                        <div class="form-group col-5 mr-4 mt-3">
                                            <label>Transmisi Mobil</label>
                                            <select class="form-control" name="transmisiMobil">
                                            <option>Otomatis</option>
                                            <option>Manual</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-5 mr-4 mt-3">
                                            <label>Bahan Bakar</label>
                                            <select class="form-control" name="bahanBakar">
                                            <option>Solar</option>
                                            <option>Bensin</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-5 mr-4 mt-3 mb-5">
                                            <label>Tempat Duduk</label>
                                            <select class="form-control" name="tempatDuduk">
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                            <option>6</option>
                                            <option>7</option>
                                            <option>8</option>
                                            <option>9</option>
                                            <option>10</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-5 mr-4 mt-3">
                                            <label for="inputText">Mesin Mobil (cc)</label>
                                            <input type="text" class="form-control" name="mesinMobil" id="inputText" value="<?= $update["mesinMobil"]; ?>">
                                        </div>
                                    </div>
                                    <h3>REVIEW MOBIL :</h3>
                                    <div class="row">
                                        <div class="form-group col-sm-5 mr-4 mt-3">
                                            <label for="InputText">Review Mobil</label>
                                            <input type="text" class="form-control" name="reviewMobil" id="InputText" value="<?= $update["reviewMobil"]; ?>" required>
                                        </div> 
                                        <div class="form-group col-sm-5 mr-4 mt-3 mb-5">
                                            <label for="InputText">Review User</label>
                                            <input type="text" class="form-control" name="linkReviewUser" id="InputText" value="<?= $update["linkReviewUser"]; ?>" required>
                                        </div>
                                    </div>
                                    <h3>VIDEO REVIEW MOBIL :</h3>
                                    <div class="row">    
                                        <div class="form-group col-sm-3 mr-4 mt-3">
                                            <label for="inputText" class="form-label">Video Review 1</label>
                                            <input type="Text" class="form-control" name="videoReview1" id="inputText" value="<?= $update["videoReview1"]; ?>" required>
                                        </div>
                                        <div class="form-group col-sm-3 mr-4 mt-3">
                                            <label for="inputText" class="form-label">Judul Video 1</label>
                                            <input type="Text" class="form-control" name="textReview1" id="inputText" value="<?= $update["textReview1"]; ?>" required>
                                        </div>
                                    </div>    
                                    <div class="row">     
                                        <div class="form-group col-sm-3 mr-4">
                                            <label for="inputText" class="form-label">Video Review 2</label>
                                            <input type="Text" class="form-control" name="videoReview2" id="inputText" value="<?= $update["videoReview2"]; ?>" required>
                                        </div>
                                        <div class="form-group col-sm-3 mr-4">
                                            <label for="inputText" class="form-label">Judul Video 2</label>
                                            <input type="Text" class="form-control" name="textReview2" id="inputText" value="<?= $update["textReview2"]; ?>" required>
                                        </div>
                                    </div>
                                    <div class="row">     
                                        <div class="form-group col-sm-3 mr-4">
                                            <label for="inputText" class="form-label">Video Review 3</label>
                                            <input type="Text" class="form-control" name="videoReview3" id="inputText" value="<?= $update["videoReview3"]; ?>" required>
                                        </div>
                                        <div class="form-group col-sm-3 mr-4">
                                            <label for="inputText" class="form-label">Judul Video 3</label>
                                            <input type="Text" class="form-control" name="textReview3" id="inputText" value="<?= $update["textReview3"]; ?>" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-sm-3 mr-4">
                                            <label for="inputText" class="form-label">Video Review 4</label>
                                            <input type="Text" class="form-control" name="videoReview4" id="inputText" value="<?= $update["videoReview4"]; ?>" required>
                                        </div>
                                        <div class="form-group col-sm-3 mr-4">
                                            <label for="inputText" class="form-label">Judul Video 4</label>
                                            <input type="Text" class="form-control" name="textReview4" id="inputText" value="<?= $update["textReview4"]; ?>" required>
                                        </div> 
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" name="submit" class="btn btn-primary float-right">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2022-2023 <a href="#">Dmm28 Rent Car</a>.</strong>
    All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- Modal -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="plugins/raphael/raphael.min.js"></script>

<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>

<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard2.js"></script>
</body>
</html>
