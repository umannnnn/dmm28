<?php   

$conn = mysqli_connect("localhost", "root", "","dmm28"); //fungsi untuk koneksi ke database dmm28

function query($query){
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while( $row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }
    return $rows;
}

function registrasi($data){ //function registrasi dan parameter $data untuk proses registrasi user
    global $conn;

    $username = strtolower(stripslashes($data["username"])); 
    $email = stripslashes($data["email"]);
    $password = mysqli_real_escape_string($conn, $data["password"]); //untuk membaca tanda kutip yang user masukan kedalam password
    $userType = $data["userType"];

    $result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");
    if(mysqli_fetch_assoc($result)){
        echo "<script>
                alert('Username sudah terdaftar! Gunakan username lainya...')
              </script>";
        return false;
    }

    $password = password_hash($password, PASSWORD_DEFAULT); //password_hash berfungsi untuk mengenkripsi password

mysqli_query($conn, "INSERT INTO user VALUES('', '$username','$email','$password','$userType')"); //query untuk input data registrasi ke database

return mysqli_affected_rows($conn); //untuk menghasilkan angka 1 jika berhasil dan -1 jika gagal

}

function tambahDetail($data){ //function tambahDetail dan parameter $data untuk proses menambahkan mobil
    global $conn;

    $gambar = $data["gambar"];
    $detail = $data["detail"];
    $namaMobil = $data["namaMobil"];
    $biayaSewa = $data["biayaSewa"];
    $tampilMobil = $data["tampilMobil"];
    $interMobil1 = $data["interMobil1"];
    $interMobil2 = $data["interMobil2"];
    $interMobil3 = $data["interMobil3"];
    $exterMobil1 = $data["exterMobil1"];
    $exterMobil2 = $data["exterMobil2"];
    $exterMobil3 = $data["exterMobil3"];
    $transmisiMobil = $data["transmisiMobil"];
    $bahanBakar = $data["bahanBakar"];
    $mesinMobil = $data["mesinMobil"];
    $tempatDuduk = $data["tempatDuduk"];
    $gambarReview = $data["gambarReview"];
    $reviewMobil = $data["reviewMobil"];
    $linkReviewUser = $data["linkReviewUser"];
    $videoReview1 = $data["videoReview1"];
    $videoReview2 = $data["videoReview2"];
    $videoReview3 = $data["videoReview3"];
    $videoReview4 = $data["videoReview4"];
    $textReview1 = $data["textReview1"];
    $textReview2 = $data["textReview2"];
    $textReview3 = $data["textReview3"];
    $textReview4 = $data["textReview4"];

    $query = "INSERT INTO detailmobil VALUES ( 
        '', '$gambar', '$detail',
        '$namaMobil', '$biayaSewa', '$tampilMobil', 
        '$interMobil1', '$interMobil2', '$interMobil3', 
        '$exterMobil1', '$exterMobil2', '$exterMobil3', 
        '$transmisiMobil', '$bahanBakar', '$mesinMobil', 
        '$tempatDuduk', '$gambarReview', '$reviewMobil', 
        '$linkReviewUser', '$videoReview1', '$videoReview2', 
        '$videoReview3', '$videoReview4', '$textReview1', 
        '$textReview2', '$textReview3', '$textReview4'
        )";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function updateDetail($data){ //function tambahDetail dan parameter $data untuk proses menambahkan mobil
    global $conn;

    $id_mobil = $data["id_mobil"];
    $gambar = $data["gambar"];
    $detail = $data["detail"];
    $namaMobil = $data["namaMobil"];
    $biayaSewa = $data["biayaSewa"];
    $tampilMobil = $data["tampilMobil"];
    $interMobil1 = $data["interMobil1"];
    $interMobil2 = $data["interMobil2"];
    $interMobil3 = $data["interMobil3"];
    $exterMobil1 = $data["exterMobil1"];
    $exterMobil2 = $data["exterMobil2"];
    $exterMobil3 = $data["exterMobil3"];
    $transmisiMobil = $data["transmisiMobil"];
    $bahanBakar = $data["bahanBakar"];
    $mesinMobil = $data["mesinMobil"];
    $tempatDuduk = $data["tempatDuduk"];
    $gambarReview = $data["gambarReview"];
    $reviewMobil = $data["reviewMobil"];
    $linkReviewUser = $data["linkReviewUser"];
    $videoReview1 = $data["videoReview1"];
    $videoReview2 = $data["videoReview2"];
    $videoReview3 = $data["videoReview3"];
    $videoReview4 = $data["videoReview4"];
    $textReview1 = $data["textReview1"];
    $textReview2 = $data["textReview2"];
    $textReview3 = $data["textReview3"];
    $textReview4 = $data["textReview4"];

    $query = "UPDATE detailmobil SET  
        gambar = '$gambar', detail = '$detail',
        namaMobil = '$namaMobil', biayaSewa = '$biayaSewa', tampilMobil = '$tampilMobil', 
        interMobil1 = '$interMobil1', interMobil2 = '$interMobil2', interMobil3 = '$interMobil3', 
        exterMobil1 = '$exterMobil1', exterMobil2 = '$exterMobil2', exterMobil3 = '$exterMobil3', 
        transmisiMobil = '$transmisiMobil', bahanBakar = '$bahanBakar', mesinMobil = '$mesinMobil', 
        tempatDuduk = '$tempatDuduk', gambarReview = '$gambarReview', reviewMobil = '$reviewMobil', 
        linkReviewUser = '$linkReviewUser', videoReview1 = '$videoReview1', videoReview2 = '$videoReview2', 
        videoReview3 = '$videoReview3', videoReview4 = '$videoReview4', textReview1 = '$textReview1', 
        textReview2 = '$textReview2', textReview3 = '$textReview3', textReview4 = '$textReview4'
        WHERE id_mobil = $id_mobil";
        
        mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function hapus($id){ //function hapus dan parameter $id untuk proses hapus mobil berdasarkan id mobil tersebut
    global $conn;

    mysqli_query($conn, "DELETE FROM detailmobil WHERE id_mobil = $id");

    return mysqli_affected_rows($conn);
}

function dataPelanggan($pelanggan){ //function dataPelanggan dan parameter $pelanggan untuk proses menambahkan data pelanggan ke database
    global $conn;

    $pemesan = $_SESSION['username'];
    $merk = $pelanggan["merk"];
    $biaya = $pelanggan["biaya"];
    $nama = $pelanggan["nama"];
    $noKtp = $pelanggan["noKtp"];
    $alamat = $pelanggan["alamat"];
    $noHp = $pelanggan["noHp"];
    $tglPesan = $pelanggan["tglPesan"];
    $tglBalik = $pelanggan["tglBalik"];
    $fotoKtp = $pelanggan["fotoKtp"];

    $query = "INSERT INTO datapelanggan VALUES ('','$pemesan', '$merk', '$biaya', '$nama', '$noKtp', '$alamat', '$noHp', '$tglPesan', '$tglBalik', '$fotoKtp', 'status')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

?>