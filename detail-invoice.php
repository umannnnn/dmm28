<?php 
session_start();

if( !isset($_SESSION["loginRegis"])){
    header("Location: loginRegis.php");
    exit;
}

require 'function.php';

$id_pelanggan = $_GET["id_pelanggan"];
$details = query("SELECT * FROM datapelanggan WHERE id_pelanggan=$id_pelanggan")[0];

$tanggal_awal = new DateTime($details["tglPesan"]);
$tanggal_akhir = new DateTime($details["tglBalik"]);
$biayaSewa = $details["sewaMobil"];

$diff = $tanggal_awal->diff($tanggal_akhir);
$totalHarga = $diff->days * $biayaSewa;

$pelanggan = query("SELECT * FROM datapelanggan");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.2.0/css/fontawesome.min.css" integrity="sha384-z4tVnCr80ZcL0iufVdGQSUzNvJsKjEtqYZjiQrrYKlpGow+btDHDfQWkFjoaz/Zr" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.1.0/mdb.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet">

</head>
<body>
    
<div class="card">
    <div class="card-body">
        <div class="container mb-5 mt-3">
            <div class="row d-flex align-items-baseline">
                <div class="col-xl-9">
                <p style="color: #7e8d9f;font-size: 20px;">Invoice >> <strong>ID: INV-0<?= $details["id_pelanggan"]; ?></strong></p>
                </div>
                <div class="col-xl-3 float-end">
                <a class="btn btn-light text-capitalize border-0" data-mdb-ripple-color="dark"><i
                    class="fas fa-print text-primary"></i> Print</a>
                <a class="btn btn-light text-capitalize" data-mdb-ripple-color="dark"><i
                    class="far fa-file-pdf text-danger"></i> Export</a>
                <a href="utama.php" type="button" class="btn-close" aria-label="Close"></a>
                </div>
                <hr>
            </div>
            <div class="container">
                <div class="col-md-12">
                    <div class="text-center">
                        <img src="img/Logo/12.png" style="background-color: black"  width="50" height="50">
                        <p class="pt-0">DMM28 RENT CAR</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-8">
                        <ul class="list-unstyled">
                        <li class="text-muted">Kepada : <span style="color:#5d9fc5 ;"><?= $details["nama"]; ?></span></li>
                        <li class="text-muted">Alamat : <?= $details["alamat"]; ?></li>
                        <li class="text-muted"><i class="fas fa-phone"></i> +<?= $details["noHp"]; ?></li>
                        </ul>
                    </div>
                    <div class="col-xl-4">
                        <p class="text-muted">Invoice</p>
                        <ul class="list-unstyled">
                            <li class="text-muted">
                                <i class="fas fa-circle" style="color:black ;"></i> 
                                <span class="fw-bold">ID:</span> 
                                INV-0<?= $details["id_pelanggan"]; ?>
                            </li>
                            <li class="text-muted">
                                <i class="fas fa-circle" style="color:black ;"></i> 
                                <span class="fw-bold">Invoice Tanggal: </span>
                                <?php echo date("d F Y"); ?>
                            <li class="text-muted">
                                <i class="fas fa-circle" style="color:black ;"></i> 
                                <span class="me-1 fw-bold">Status:</span>
                                <?php 
                                    if ($details['status'] == 0) {
                                    echo "<span class='badge bg-warning text-black fw-bold'>Pending</span>";
                                    }
                                    else{
                                    echo "<span class='badge bg-success text-black fw-bold'>Diterima</span>";
                                    }
                                ?>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="row my-2 mx-1 justify-content-center">
                <table class="table table-striped table-borderless">
                    <thead style="background-color:black ; text-align: center;" class="text-white">
                    <tr>
                        <th scope="col">Merk Mobil</th>
                        <th scope="col">Tanggal Pemesanan</th>
                        <th scope="col">Tanggal Pengembalian</th>
                        <th scope="col">Biaya Sewa per Hari</th>
                        <th scope="col">Total Hari</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr style="text-align: center;">
                        <td><?= $details["merk"]; ?></td>
                        <td><?= $details["tglPesan"]; ?></td>
                        <td><?= $details["tglBalik"]; ?></td>
                        <td>Rp. <?= $details["sewaMobil"]; ?></td>
                        <?php
                            echo "<td>" . $diff->days . " hari</td>";
                        ?>
                    </tr>
                    </tbody>
                </table>
                </div> <br> <br> <br>
                <div class="row">
                    <div class="col-xl-8">
                        <p class="ms-3">*Untuk Pembayaran, Pihak Kami Sudah Mengirimkan Invoice Lanjutan Melalui Whatsapp.</p>
                    </div>
                    <div class="col-xl-3">
                        <p class="text-black float-start"><span class="text-black me-3"> Total Amount</span><span
                            style="font-size: 25px;">
                            <?php
                            echo "<td> Rp. " . $totalHarga . "</td>";
                            ?>
                        </span></p>
                    </div>
                </div>
                <hr> 
                <div class="row">
                    <div class="col" style="text-align: center;">
                        <b>Terima Kasih Telah Menggunakan Layanan DMM28</b>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--FOOTER START-->
    <footer class="bg-dark text-white p-2" style="text-align: center; margin-top: -8px;">
        <div class="container">
            <p>Copyrigt &copy; 2022-DMM 28 Rent Car. All Rights Reserved. </p>
        </div>
    </footer>
    <!--FOOTER END-->
</div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

</body>
</html>