<?php 
session_start();

if( !isset($_SESSION["loginRegis"])){   //Apabila belum ada user yang login maka tidak bisa masuk ke bagian booking
    header("Location: loginRegis.php"); //harus login terlebih dahulu
    exit;
}

require 'function.php'; //pengambilan fungsi-fungsi yang ada pada bagian function.php

$id_mobil = $_GET["id_mobil"];
$details = query("SELECT * FROM detailmobil WHERE id_mobil=$id_mobil")[0]; //untuk menampilkan detailmobil sesuai dengan id masing-masing

if ( isset($_POST["kirim"])){
    if ( dataPelanggan($_POST) > 0){ //fungsi untuk mengirimkan data pelanggan ke database menggunakan method POST
        echo "
            <script>
                alert('Data anda telah diterima, Mohon tunggu konfirmasi dari Admin untuk melanjutkan pesanan');
                document.location.href = 'utama.php';
                </script> 
            ";
    } else {
        echo "
            <script>
                alert('Pesanan Anda Gagal!');
                document.location.href = 'utama.php';
                </script> 
            ";
        }
    }
?>

<!DOCTYPE html>
<html lang="en" >
<head>
    <meta charset="UTF-8">
    <title>Booking Page</title>
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css'>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"  integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="dist/css/styleBook.css">
</head>

<body style="background-color: rgb(241, 241, 241);"></body>
    
    <!-- NAVIGASI START-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
            <img src="img/Logo/11.png">
            <a class="navbar-brand" href="#">DMM28 RENT CAR</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-right" id="navbarNavAltMarkup">
                <div class="navbar-nav ms-auto">
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Pesanan</a>
                        <ul class="dropdown-menu dropdown-menu-dark dropdown-menu-start">
                            <span class="dropdown-header text-center">Invoice Masuk</span>
                            <li><a class="dropdown-item" href="#">Invoice untuk id Pesanan #882</a></li>
                        </ul>
                        </li>
                    </ul>
                    <a class="nav-link" href="utama.php">Home</a>
                    <a class="nav-link" href="logout.php">Logout</a>
                </div>
            </div>
        </div>
    </nav>
    <!--NAVIGASI END-->

    <div class="grid container">
        <div class="row mt-5">
            <div class="col-12 col-md-8 mt-3 border">
                <!-- User this HTML for Slider -->
                <div class="card my-3">
                    <div class="card-body">
                        <section class="banner-section">
                            <div class="p-2 mb-3"> 
                                <h1 class="card-title" name="namaMobil"><?php echo $details["namaMobil"]; ?></h1> 
                                <h5 class="card-subtitle py-1 text-muted" name="biayaSewa">Rp. <?php echo $details["biayaSewa"];?></h5> 
                            </div>
                            <div class="">
                                <div class="vehicle-detail-banner banner-content clearfix">
                                    <div class="banner-slider">
                                        
                                        <div class="slider slider-for">
                                            <!-- disini for -->
                                            <div class="slider-banner-image">
                                                <!-- eksterior -->
                                                <img src="img\png mobil\<?php echo $details["tampilMobil"]; ?>" alt="Car-Image">
                                            </div>
                                            <div class="slider-banner-image">
                                                <img src="img\png mobil\<?php echo $details["exterMobil1"]; ?>" alt="Car-Image">
                                            </div>
                                            <div class="slider-banner-image">
                                                <img src="img\png mobil\<?php echo $details["exterMobil2"]; ?>" alt="Car-Image">
                                            </div>
                                            <div class="slider-banner-image">
                                                <img src="img\png mobil\<?php echo $details["interMobil3"]; ?>" alt="Car-Image">
                                            </div>
                                            <div class="slider-banner-image">
                                                <img src="img\png mobil\<?php echo $details["interMobil1"]; ?>" alt="Car-Image">
                                            </div>
                                            <div class="slider-banner-image">
                                                <img src="img\png mobil\<?php echo $details["interMobil2"]; ?>" alt="Car-Image">
                                            </div>
                                            <div class="slider-banner-image">
                                                <img src="img\png mobil\<?php echo $details["interMobil3"]; ?>" alt="Car-Image">
                                            </div>
                                        </div>
                                        <div class="slider slider-nav thumb-image">
                                            <!-- disini for -->
                                            <div class="thumbnail-image">
                                                <div class="thumbImg">
                                                    <img src="img\png mobil\<?php echo $details["tampilMobil"]; ?>" alt="slider-img">
                                                </div>
                                            </div>
                                            <div class="thumbnail-image">
                                                <div class="thumbImg">
                                                    <img src="img\png mobil\<?php echo $details["exterMobil1"]; ?>" alt="slider-img">
                                                </div>
                                            </div>
                                            <div class="thumbnail-image">
                                                <div class="thumbImg">
                                                    <img src="img\png mobil\<?php echo $details["exterMobil2"]; ?>" alt="slider-img">
                                                </div>
                                            </div>
                                            <div class="thumbnail-image">
                                                <div class="thumbImg">
                                                    <img src="img\png mobil\<?php echo $details["exterMobil3"]; ?>" alt="slider-img">
                                                </div>
                                            </div>
                                            <div class="thumbnail-image">
                                                <div class="thumbImg">
                                                    <img src="img\png mobil\<?php echo $details["interMobil1"]; ?>" alt="slider-img">
                                                </div>
                                            </div>
                                            <div class="thumbnail-image">
                                                <div class="thumbImg">
                                                    <img src="img\png mobil\<?php echo $details["interMobil2"]; ?>" alt="slider-img">
                                                </div>
                                            </div>
                                            <div class="thumbnail-image">
                                                <div class="thumbImg">
                                                    <img src="img\png mobil\<?php echo $details["interMobil3"]; ?>" alt="slider-img">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
                <!-- End User this HTML for Slider -->

                <!-- <div class="row d-flex text-start"> -->

                <div class="row content">
                    <div class="card ms-3" style="width: 200px;">
                        <div class="row g-0">
                            <div class="col-md-4 mt-4">
                            <img src="./img/icon/automatic-transmission1.png"><img>
                            </div>
                            <div class="col-md-8 mt-3">
                            <div class="card-body">
                                <h6 class="card-title">Transmisi</h6>
                                <p class="card-text"><small class="text-muted"><?php echo $details["transmisiMobil"]; ?></small></p>
                            </div>
                            </div>
                        </div>
                    </div>

                    <div class="card ml-3" style="width: 200px;">
                        <div class="row g-0">
                            <div class="col-md-4 mt-4">
                            <img src="./img/icon/fuel1.png" class="img-fluid rounded-start" alt="...">
                            </div>
                            <div class="col-md-8 mt-3">
                            <div class="card-body">
                                <h6 class="card-title">Bahan Bakar</h6>
                                <p class="card-text"><small class="text-muted"><?php echo $details["bahanBakar"]; ?></small></p>
                            </div>
                            </div>
                        </div>
                    </div>

                    <div class="card ml-3" style="width: 200px;">
                        <div class="row g-0">
                            <div class="col-md-4 mt-4">
                            <img src="./img/icon/car-engine1.png" class="img-fluid rounded-start" alt="...">
                            </div>
                            <div class="col-md-8 mt-3">
                            <div class="card-body">
                                <h6 class="card-title">Mesin</h6>
                                <p class="card-text"><small class="text-muted"><?php echo $details["mesinMobil"]; ?> cc</small></p>
                            </div>
                            </div>
                        </div>
                    </div>

                    <div class="card ml-3" style="width: 200px;">
                        <div class="row g-0">
                            <div class="col-md-4 mt-4">
                            <img src="./img/icon/car-seat1.png" class="img-fluid rounded-start" alt="...">
                            </div>
                            <div class="col-md-8 mt-3">
                            <div class="card-body">
                                <h6 class="card-title">Tempat Duduk</h6>
                                <p class="card-text"><small class="text-muted"><?php echo $details["tempatDuduk"]; ?> seater</small></p>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card my-3">
                    <div class="card-body">
                        <h4 class="card-title">Review Mobil</h4>
                        <h6 class="card-subtitle mb-3 text-muted"><?php echo $details["namaMobil"]; ?></h6>
                        <p>PT Toyota Astra Motor (TAM) selaku Agen Pemegang Merek Toyota di Indonesia resmi meluncurkan salah satu mobil LCGC (Low Cost Green Car) 
                            mereka, yaitu Toyota Agya versi facelift. </p>
                        <p>Mobil ini diluncurkan pada tahun 2013 lalu dan telah mendapatkan pembaruan pada beberapa bagian, seperti pada sisi eksterior dan 
                            interiornya yang kini tampak lebih modern, serta fitur-fitur yang disematkan pun juga lebih canggih. Toyota Agya terbaru ini dinilai 
                            dapat terus meningkatkan penjualan kendaraan mobil Toyota karena mobil LCGC tersebut bisa mencapai pangsa pasar hingga 30% pada tahun 
                            2016 lalu.</p>
                        <p>Selain itu, Toyota Agya dibanderol dengan harga yang terjangkau dan dibekali beragam fitur yang cukup mumpuni guna menambah kenyamanan 
                            bagi pengemudi dan penumpang mobil tersebut. Konsep desainnya sendiri mengikuti selera anak-anak muda yang kekinian. </p>
                    </div>
                </div>

                <div class="card mb-3" style="max-width: auto;">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="img/png mobil/<?php echo $details["gambarReview"]; ?>" class="img-fluid rounded-start" alt="...">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">Review Pengguna</h5>
                                <p class="card-text">Berikut ini adalah review dari pengguna mobil <?php echo $details["namaMobil"]; ?> yang mencakup tentang kelebihan dan kekurangan mobil ini berdasarkan pengalaman pengguna.</p>
                                <a href="<?php echo $details["linkReviewUser"]; ?>" class="stretched-link">Klik Disini</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-4 mt-3 border " style="z-index: 2;">
                <div class="card my-3 pemesanan-column sticky-top">
                    <div class="card-body">
                        <h5 class="card-title">FORM ISI DATA PELANGGAN</h5>
                        <h6 class="card-subtitle mb-4 mt-4 text-muted">*Isi data dibawah ini untuk booking mobil yang diinginkan</h6>
                        <form action="" method="POST">
                            <div class="mb-3">
                                <label for="merk" class="col-form-label">Merk Mobil :</label>
                                <input type="text" name="merk" class="form-control" id="merk" value="<?php echo $details["namaMobil"]; ?> " readonly>
                            </div>
                            <div class="mb-3">
                                <label for="biaya" class="col-form-label">Biaya Sewa Mobil :</label>
                                <input type="text" name="biaya" class="form-control" id="biaya" value="<?php echo $details["biayaSewa"]; ?> " readonly>
                                <div id="emailHelp" class="form-text">Biaya sewa per harinya</div>
                            </div>
                            <div class="mb-3">
                                <label for="nama" class="col-form-label">Nama Lengkap :</label>
                                <input type="text" name="nama" class="form-control" id="nama" required>
                            </div>
                            <div class="mb-3">
                                <label for="noKtp" class="col-form-label">Nomor KTP :</label>
                                <input type="text" name="noKtp" class="form-control" id="noKtp" required>
                            </div>
                            <div class="mb-3">
                                <label for="alamat" class="col-form-label">Alamat :</label>
                                <input type="text" name="alamat" class="form-control" id="alamat" required>
                            </div>
                            <div class="mb-3">
                                <label for="noHp" class="col-form-label">Nomor Handphone :</label>
                                <input type="text" name="noHp" class="form-control" id="noHp" required>
                                <div id="emailHelp" class="form-text">Ganti Angka 0 dengan Kode Negara</div>
                            </div>
                            <div class="form-group">
                            <div class="mb-3">
                                <label for="tglPesan" class="col-form-label">Tanggal Pemesanan :</label>
                                <input type="datetime-local" name="tglPesan" class="form-control" id="tglPesan" required>
                            </div>
                            <div class="mb-3">
                                <label for="tglBalik" class="col-form-label">Tanggal Pengembalian :</label>
                                <input type="datetime-local" name="tglBalik" class="form-control" id="tglBalik" required>
                            </div>
                            <div class="mb-3">
                                <label for="fotoKtp" class="col-form-label">Foto KTP :</label>
                                <input type="file" name="fotoKtp" class="form-control" id="fotoKtp" required>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" name="kirim" class="btn btn-primary">Kirim</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="row my-3">
            <h4 class="card-title text-center">Review Videos</h4>
            <div class="col-12 col-lg-3 my-2 border">
                <div class="card">
                    <div class="card-body row content">
                        <div class="card" >
                            <iframe <?php echo $details["videoReview1"]; ?>></iframe>
                            <div class="card-body" style="height: 104px;">
                            <p class="card-text"><?php echo $details["textReview1"]; ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-3 my-2 border">
                <div class="card">
                    <div class="card-body row content">
                        <div class="card" >
                            <iframe <?php echo $details["videoReview2"]; ?>></iframe>                            
                            <div class="card-body" style="height: 104px;">
                            <p class="card-text"><?php echo $details["textReview2"]; ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-3 my-2 border">
                <div class="card">
                    <div class="card-body row content">
                        <div class="card" >
                            <iframe <?php echo $details["videoReview3"]; ?>></iframe>                            
                            <div class="card-body" style="height: 104px;">
                            <p class="card-text"><?php echo $details["textReview3"]; ?></p>
                            </div>
                        </div>
                    </div>
                </div>  
            </div>
            <div class="col-12 col-lg-3 my-2 border">
                <div class="card">
                    <div class="card-body row content">
                        <div class="card" >
                            <iframe <?php echo $details["videoReview4"]; ?>></iframe>                           
                            <div class="card-body" style="height: 104px;">
                            <p class="card-text"><?php echo $details["textReview4"]; ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
    
    <!--FOOTER START-->
    <footer class="bg-dark text-center text-white p-2">
        <div class="container">
            <p>Copyrigt &copy; 2022-DMM 28 Rent Car. All Rights Reserved.</p>
        </div>
    </footer>
    <!--FOOTER END-->

    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js'></script><script  src="./script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="js/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

    <script>
    config = {
        enableTime: false,
        dateFormat: "d-m-Y",
    }
    
    flatpickr("input[type=datetime-local]", config);
    
    jQuery(document).ready(function($) {
        $('.slider-for').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: false,
            fade: true,
            asNavFor: '.slider-nav'
        });
        $('.slider-nav').slick({
            slidesToShow: 4,
            slidesToScroll: 1,

            asNavFor: '.slider-for',
            dots: false,
            focusOnSelect: true,
            responsive: [{
                    breakpoint: 992,
                    settings: {
                        vertical: false,
                        slidesToShow: 3,
                    }
                },
                {
                    breakpoint: 768,
                    settings: {
                        vertical: false,
                        slidesToShow: 3,
                    }
                },
                {
                    breakpoint: 580,
                    settings: {
                        vertical: false,
                        slidesToShow: 2,
                    }
                },
                {
                    breakpoint: 380,
                    settings: {
                        vertical: false,
                        slidesToShow: 2,
                    }
                }
            ]
        });
    });
    </script>
    </body>
</html>