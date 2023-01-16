<?php 
session_start();

if( !isset($_SESSION["loginRegis"])){
    header("Location: loginRegis.php");
    exit;
}

require 'function.php';

$id_pelanggan = $_GET["id_pelanggan"];
$details = query("SELECT * FROM datapelanggan WHERE id_pelanggan=$id_pelanggan")[0];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.2.0/css/fontawesome.min.css" integrity="sha384-z4tVnCr80ZcL0iufVdGQSUzNvJsKjEtqYZjiQrrYKlpGow+btDHDfQWkFjoaz/Zr" crossorigin="anonymous">
</head>
<body>
    <table class="table table-hover">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Nama</th>
            <th scope="col">No HP</th>
            <th scope="col">Tanggal Pesan</th>
            <th scope="col">Tanggal Balik</th>
        </tr>
        </thead>
    <tbody>
        <tr>
            <th><?= $details["id_pelanggan"]; ?></th>
            <td><?= $details["nama"]; ?></td>
            <td><?= $details["noHp"]; ?></td>
            <td><?= $details["tglPesan"]; ?></td>
            <td><?= $details["tglBalik"]; ?></td>
        </tr>
    </tbody>
</table>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

</body>
</html>