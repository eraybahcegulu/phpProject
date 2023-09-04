<?php
session_start();
include("db/db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $kullanici_adi = $_POST["username"];
    $sifre = $_POST["password"];

    if (girisKontrol($kullanici_adi, $sifre)) {
        $_SESSION["kullanici_adi"] = $kullanici_adi;
        header("Location: main_page.php");
        exit;
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
    <link rel="stylesheet" type="text/css" href="css/login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.1/css/bootstrap.min.css" />
    <title>Login</title>
</head>
<body>
    
    <div class="login-container">
        <h2>Giriş Yap</h2>
        <form action="login.php" method="POST">
            <div class="form-group">
                <label for="username">Kullanıcı Adı:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Şifre:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit">Giriş Yap</button>
        </form>
        <p>Hesabınız yok mu? <a href="register.php">Kayıt Ol</a></p>

        <?php
        if (isset($hata) && $hata) {
            echo "<div class='alert alert-danger' role='alert'>Kullanıcı adı veya şifre hatalı!</div>";
        }
        ?>
    </div>
</body>
</html>