<?php
session_start();
include("db/db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $kullanici_adi = $_POST["username"];
    $sifre = $_POST["password"];

    if (girisKontrol($kullanici_adi, $sifre)) {
        $_SESSION["kullanici_adi"] = $kullanici_adi;
        $_SESSION["sifre"] = $sifre;
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
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.1/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
        integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/login.css">
    <title>Login</title>

</head>
<body>
    <div class="login-container">
        <div class="form">
            <div class="login-form">
                <form action="login.php" method="POST" onsubmit="return validateForm()">
                    <a style="text-decoration: none;" href="index.html"><p style="font-size: 40px; color:orange">GİRİŞ YAP</p></a>
                    <input id="username" name="username" style="margin-top: 10px;" type="text" maxlength="25" placeholder="Kullanıcı Adı">
                    <input id="password" name="password" type="password" maxlength="25" placeholder="Şifre">
                    <br>
                    <button class="giris-yap-button">Giriş Yap</button>
                </form>
                <br>
                <a style="color:black" href=""> Şifremi Unuttum</a>
                <br>
                <a href="register.php">
                    <button class="uye-ol-button">Üye Ol</button>
                </a>
                <?php
                if (isset($hata) && $hata) {
                    echo "<div class='hata-mesaji'>Kullanıcı adı veya şifre hatalı!</div>";
                }
                ?>
            </div>
        </div>
    </div>

    <script>
        function validateForm() {
            var username = document.getElementById("username").value;
            var password = document.getElementById("password").value;
            
            if (username.length < 3 || password.length < 3) {
                alert("Kullanıcı adı ve şifre en az 3 karakter olmalıdır!");
                return false;
            }
            
            return true;
        }
    </script>
</body>
</html>