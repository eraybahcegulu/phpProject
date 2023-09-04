<?php
session_start();
include("db/db.php");


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $kullanici_adi = $_POST["username"];
    $sifre = $_POST["password"];


    $sql = "SELECT * FROM users WHERE kullanici_adi = ?";


    $stmt = $conn->prepare($sql);


    $stmt->bind_param("s", $kullanici_adi);


    $stmt->execute();


    $result = $stmt->get_result();

    if ($result->num_rows == 0) {

        $sql = "INSERT INTO users (kullanici_adi, sifre) VALUES (?, ?)";


        $stmt = $conn->prepare($sql);


        $stmt->bind_param("ss", $kullanici_adi, $sifre);

        if ($stmt->execute()) {

            $basari = true;
        } 
    } else {

        $hata = true;
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/register.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.1/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Register</title>
</head>
<body>
    
    <div class="login-container">
        <h2>Kayıt Ol</h2>
        <form action="register.php" method="POST">
            <div class="form-group">
                <label for="username">Kullanıcı Adı:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Şifre:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit">Kayıt Ol</button>
        </form>

        <a class="back-button" href="login.php"> <i class="fa-solid fa-chevron-left"></i> </a>

        <br />
        <?php
        if (isset($basari) && $basari) {
            echo "<div class='alert alert-success' role='alert'>Kayıt başarıyla tamamlandı!</div>";
        }
        if (isset($hata) && $hata) {
            echo "<div class='alert alert-danger' role='alert'>Kullanıcı adı zaten kullanılıyor!</div>";
        }
        ?>


    </div>
</body>
</html>
