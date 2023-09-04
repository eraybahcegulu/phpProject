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
    <title>Register</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
        integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/register.css">
</head>
<body>
    <div class="register-container">
        <div class="form">
            <div class="register-form">

            </div>
            <form action="register.php" method="POST" onsubmit="return validateForm()">
                <a style="text-decoration: none;" href="index.html"><p style="font-size: 40px; color:orange">KAYIT OL</p>
                </a>
                <br>
                <input id="username" name="username" type="text" placeholder="Kullanıcı Adı" maxlength="25">
                <br>
                <input type="password" id="password" name="password" placeholder="Şifre" maxlength="25">

                <button style="margin-top: 10px;"class="uye-ol-button">Üye Ol</button>
            </form>
            
            <a href="login.php">
                <i style="color:orange; font-size:30px; float:left; margin-top:10px;" class="fa-solid fa-circle-chevron-left"></i>
             </a>

             <div class="mesajlar">
                <?php
                if (isset($basari) && $basari) {
                    echo "<div class='alert alert-success' role='alert'>Kayıt başarıyla tamamlandı!</div>";
                }
                if (isset($hata) && $hata) {
                    echo "<div class='alert alert-danger' role='alert'>Kullanıcı adı zaten kullanılıyor!</div>";
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

