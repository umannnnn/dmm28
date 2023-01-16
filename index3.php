<?php
session_start();

if( !isset($_SESSION["loginRegis"])){ //Apabila belum ada user yang login maka tidak bisa masuk ke bagian booking
  header("Location: loginRegis.php"); //harus login terlebih dahulu
  exit;
}

include("function.php"); //pengambilan fungsi-fungsi yang ada pada bagian function.php

$mobil = query("SELECT * FROM detailmobil");

$hitungarmada = "select count(id_mobil) as jumlah from detailmobil"; 
$jmlarmada = $conn->query($hitungarmada);
$jmlarmada = mysqli_fetch_row($jmlarmada);

$hitungadmin = "select count(id_user) as jumlah from user where userType = 'admin'"; 
$jmladmin = $conn->query($hitungadmin);
$jmladmin = mysqli_fetch_row($jmladmin);

$hitunguser = "select count(id_user) as jumlah from user where userType = 'user'"; 
$jmluser = $conn->query($hitunguser);
$jmluser = mysqli_fetch_row($jmluser);

$hitungpelanggan = "select count(id_pelanggan) as jumlah from datapelanggan"; 
$jmlpelanggan = $conn->query($hitungpelanggan);
$jmlpelanggan = mysqli_fetch_row($jmlpelanggan);

$pelanggan = query("SELECT * FROM datapelanggan");

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Dashboard Pesanan</title>

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
    <a href="index2.php" class="brand-link">
      <img src="img/Logo/12.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Dmm28 Rent Car</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Usman Pamungkas</a>
          <a class="nav-link" href="logout.php">Logout</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">  
          <li class="nav-header">DASHBOARD</li>
          <li class="nav-item">
            <a href="./index2.php" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>Armada</p>
            </a>
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
            <h1 class="m-0">Dashboard Pesanan</h1>
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
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Tabel Konfirmasi</h3>
                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">
                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default">
                        <i class="fas fa-search"></i>
                      </button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Nama</th>
                      <th>Merk Mobil</th>
                      <th>Tanggal Pemesanan</th>
                      <th>Tanggal Kembali</th>
                      <th>Status</th>
                      <th class="text-center">Action</th>
                      <th>Invoice</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ( $pelanggan as $row ) : ?>
                      <tr>
                        <td><?= $row["id_pelanggan"];?></td>
                        <td><?= $row["nama"];?></td>
                        <td><?= $row["merk"];?></td>
                        <td><?= $row["tglPesan"];?></td>
                        <td><?= $row["tglBalik"];?></td>
                        <td>
                          <?php 
                            if ($row['status'] == 0) {
                              echo "<span class='badge badge-warning'>Pending</span>";
                            }
                            else{
                              echo "<span class='badge badge-success'>Diterima</span>";
                            }
                          ?>
                        </td>
                        <td class="d-flex flex-row">
                          <form action="terima.php?id_pelanggan=<?php echo $row['id_pelanggan']; ?>" method="POST">
                            <input type="hidden" name="appid" value="<?php echo $row['id_pelanggan']; ?>">
                            <?php 
                            if ($row['status'] == 0) {
                              echo "<input type='submit' class='btn btn-block btn-success btn-sm' name='terima' value='Terima'>";
                            }
                            else{
                              echo "<input type='submit' class='btn btn-block btn-success btn-sm' name='terima' value='Terima' disabled>";
                            }
                          ?>
                          </form>
                          <a href="tolak.php?id=<?php echo $row["id_pelanggan"]; ?>" type="button" name="tolak" class="btn btn-block btn-danger btn-sm ml-3">Tolak</a>                      
                        </td>
                        <td>
                          <?php
                            if ($row['status'] == 0) {
                            echo "";
                            }else{
                              echo "<a href='https://api.whatsapp.com/send?phone=".$row["noHp"]."&text=DMM%2028%20Rent%20Car%20%0AID%20Inovice%20:%20INV-0".$row["id_pelanggan"]."%0A%0AKepada%20:%0A%0ANama%20:%20".$row["nama"]."%0ANo%20KTP%20:%20".$row["noKtp"]."%0AAlamat%20:%20".$row["alamat"]."%0A%0ADeskripsi%20:%0A%0APemesanan%20Mobil%20:%20".$row["merk"]."%0ATanggal%20Pemesanan%20Mobil%20:%20*".$row["tglPesan"]."*%0ATanggal%20Pengembalian%20Mobil%20:%20*".$row["tglBalik"]."*%0A%0A=============================%0ATotal%20Biaya%20Pemesanan%20:%20*Rp.350.000*%20%0A=============================%0A%0AMetode%20Pembayaran%20:%20%0A%0ABank%20BRI%20:%20*5276375235283*%20%0ADana%20:%20*082227974000*%20%0AShopeepay%20:%20*082223507171*%20%0A%0AMaksimal%20Pembayaran%20*1%20Hari*%20Setelah%20Invoice%20ini%20Dikirim,%20Apabila%20belum%20dibayarkan%20maka%20pesanan%20otomatis%20dibatalkan.%20' class='btn btn-info btn-sm'>Kirim Invoice</a>";
                            }
                          ?>
                        </td>
                      </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
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

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="plugins/raphael/raphael.min.js"></script>
<script src="plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="plugins/jquery-mapael/maps/usa_states.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>

<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard2.js"></script>
</body>
</html>
