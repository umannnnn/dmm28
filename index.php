<?php

require 'function.php';

// ambil data dari tabel mobil
$mobil = query("SELECT * FROM detailmobil");

?>

<!DOCTYPE html>
<html lang="ID">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RENTAL MOBIL | KELOMPOK 4</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.2.0/css/fontawesome.min.css" integrity="sha384-z4tVnCr80ZcL0iufVdGQSUzNvJsKjEtqYZjiQrrYKlpGow+btDHDfQWkFjoaz/Zr" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
</head>
<body>

    <!-- NAVIGASI START-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
        <div class="container">
            <img src="img/Logo/11.png">
            <a class="navbar-brand" href="#">DMM28 RENT CAR</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-right" id="navbarNavAltMarkup">
                <div class="navbar-nav ms-auto">
                    <a class="nav-link" href="index.php">Home</a>
                    <a class="nav-link" href="loginRegis.php">Masuk/Daftar</a>
                </div>
            </div>
        </div>
    </nav>
    <!--NAVIGASI END-->
    
    <!--CAROUSEL START-->
    <section class="rent_header">
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="img/poster/poster1.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="img/poster/poster2.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="img/poster/poster3.jpg" class="d-block w-100" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
            </div>
        </div>
    </section>
    <!--CARIUSEL END-->

    <!--ABOUT START-->
    <aside class="grid py-5 container">
        <div class="row text-center text-lg-start">
            <h1 class="fw-bold">TENTANG KAMI</h1>
            <p>DMM28 Rental Car ini adalah Sebuah perusahaan yang bergerak di bidang Jasa Transportasi. Aplikasi ini memiliki tujuan untuk pemesanan atau penyewaan kendaraan roda empat berbasis website. Visi Misi dari DMM28 Car Rent adalah untuk meningkatkan dan memajukan UMKM serta mempermudah pengguna dalam melakukan penyewaan mobil.</p>
        </div>
    </aside>
    <!---ABOUT END-->

    <aside class="grid container">
        <div class="row text-center text-lg-center">
            <h2 class="fw-bold">ARMADA KAMI</h2>
        </div>
    </aside>

    <!--CONTENT START-->
    <section class="rent_content">
        <div class="container mx-auto">
            <div class="row py-3">
            <?php foreach ( $mobil as $row ) : ?>
                <div class="col-sm-12 col-md-6 col-lg-4 my-2 ">
                    <div class="card shadow-lg">
                        <img src="img/<?= $row["gambar"]; ?>" height="200px" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"><?= $row["namaMobil"]; ?></h5>
                            <p class="card-text"><?= $row["detail"]; ?></p>
                            <a href="loginRegis.php" class="btn btn-primary">Booking Now!</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </section>
    <!--CONTENT END-->

    <!--CONTACT START-->
    <aside class="grid py-5 container">
        <div class="row my-3">
            <div class="col-12 col-md-6 my-2">
                <div class="card overflow-hidden">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d990.2228759103717!2d109.54019172923684!3d-6.903576368306638!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6fd93c42fa56cb%3A0xe3f2ec90296447f2!2sKios%20pakan%20burung%20om%20joko!5e0!3m2!1sid!2sid!4v1667362587283!5m2!1sid!2sid" width="   100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                </div>
            </div>
            <div class="col-12 col-md-6 my-2">
            <h2 class="fw-bold">CONTACT US</h2>
            <hr>
            <div class="row">
                <div class="d-flex gap-3">
                    <i><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-map" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M15.817.113A.5.5 0 0 1 16 .5v14a.5.5 0 0 1-.402.49l-5 1a.502.502 0 0 1-.196 0L5.5 15.01l-4.902.98A.5.5 0 0 1 0 15.5v-14a.5.5 0 0 1 .402-.49l5-1a.5.5 0 0 1 .196 0L10.5.99l4.902-.98a.5.5 0 0 1 .415.103zM10 1.91l-4-.8v12.98l4 .8V1.91zm1 12.98 4-.8V1.11l-4 .8v12.98zm-6-.8V1.11l-4 .8v12.98l4-.8z"/>
                        </svg></i>
                <p>&nbsp;Dusun Tunggul, Desa Sikayu, Kec. Comal, Kabupaten Pemalang, Jawa Tengah 52363 (Kios pakan burung om Joko)</p>
                </div>
                <div class="d-flex gap-3">
                    <i><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-whatsapp" viewBox="0 0 16 16">
                        <path d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z"/>
                        </svg></i>
                <p>&nbsp;+62 823 2288 9600</p>
                </div>
                <div class="d-flex gap-3">
                    <i><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope" viewBox="0 0 16 16">
                        <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z"/>
                        </svg></i>
                <p>&nbsp;aldimaldini2020@gmail.com</p>
                </div>
            </div>
            </div>
        </div>
    </aside>
    <!--CONTACT END-->

    <!--FOOTER START-->
    <footer class="bg-dark text-center text-white p-2">
        <div class="container">
            <p>Copyrigt &copy; 2022-DMM 28 Rent Car. All Rights Reserved. </p>
        </div>
    </footer>
    <!--FOOTER END-->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="js/jquery.min.js"></script>
    
    </body>
</html>