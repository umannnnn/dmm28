<?php
session_start();

if( isset($_SESSION["loginRegis"]) ){
    header("Location: utama.php");
    exit;
}

require 'function.php';

if (isset($_POST["register"])){
    
    if(registrasi($_POST) > 0 ){
        echo "<script>
                alert('user baru berhasil ditambahkan!');
            </script>";
    } else {
        echo mysqli_error($conn);
    }
}

if (isset($_POST["login"])){

    $email1 = $_POST["email1"];
    $password1 = $_POST["password1"];

    $result = mysqli_query($conn, "SELECT * FROM user WHERE email = '$email1' ");

    if(mysqli_num_rows($result) === 1){
        $row = mysqli_fetch_assoc($result);
        if(password_verify($password1, $row["password"])){
            if($row["userType"] == "admin"){
                $_SESSION["loginRegis"] = true;
                $_SESSION["username"] = $row["username"];
                header("location: index2.php");
            }elseif($row["userType"] == "user"){
                $_SESSION["loginRegis"] = true;
                $_SESSION["username"] = $row["username"];
                header("location: utama.php");
            }
        } 
    }
    $error = true;
}

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masuk/Daftar</title>
    <link rel="stylesheet" href="dist/css/styleLoginRegis.css">
</head>

<body>
<section>
    <div class="container">
        <div class="user signinBx">
        <div class="imgBx">
            <img src="img/mobil/satu.jpg" alt="signin img">
        </div>
        <div class="formBx">
            <form action="" method="POST";>
            <h2>LOGIN</h2>
            <label>
                <input type="text" name="email1" placeholder="Masukan Email" required>
            </label>
            <label>
                <input type="password" name="password1" placeholder="Masukan Password" required>
            </label>
            
            <?php if( isset($error)):?>
                <p style="color: red;">Email atau Password Salah!</p>
            <?php endif; ?>

            <button type="submit" name="login">Masuk</button>
            <p class="signup">Belum memiliki akun ? <a href="#" onclick="toggleForm();">Sign up!</a></p>
            </form>
        </div>
        </div>

        <div class="user signupBx">
        <div class="formBx">
            <form action="" method="POST">
            <h2>Buat Akun Baru</h2>
            <label>
                <input type="text" name="username" placeholder="Masukan Username" required>
            </label>
            <label>
                <input type="text" name="email" placeholder="Masukan Email" required>
            </label>
            <label>
                <input type="password" name="password" placeholder="Masukan Password" required>
            </label> 
            <select style="padding: 15px; margin-bottom: 20px; margin-top: 13px; border-color: #555; color: #555; border-radius: 5px; font-size: 14px;" name="userType">
                <option value="user">User</option>
                <option value="admin">Admin</option>
            </select>
            <button type= "submit" name="register">Daftar</button>
            <p class="signup">Sudah memiliki akun ? <a href="#" onclick="toggleForm();">sign in!</a></p>
            </form>
        </div>
        <div class="imgBx">
            <img src="img/mobil/dua.jpg" alt="signin img">
        </div>
        </div>
    </div>
</section>

<script src="js/jquery.min.js"></script>

<script>
    function toggleForm() {
    var container = document.querySelector(".container");
    container.classList.toggle("active");
    }
</script>

</body>
</html>