<?php
session_start();
if (isset($_SESSION["kullanici_adi"])) {
    $kullanici_adi = $_SESSION["kullanici_adi"];
}

if (isset($_SESSION["sifre"])) {
    $sifre = $_SESSION["sifre"];
}
if (isset($_SESSION["pass_changed"]) && $_SESSION["pass_changed"]) {
    $pass_changed = true;
    $_SESSION["pass_changed"] = false; 


    if (isset($_SESSION["yeni_sifre"])) {
        $sifre = $_SESSION["yeni_sifre"];
        unset($_SESSION["yeni_sifre"]); 
    }
}
if (isset($_SESSION["pass_not_match"]) && $_SESSION["pass_not_match"]) {
    $pass_not_match=true;
    $_SESSION["pass_not_match"] = false; 
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="main_page.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">
    <title>Anasayfa</title>
</head>

<body>


    <main>
        <div class="main-container">
            <div class="users-container">


                <h2>Hoşgeldin
                    <?php
        echo $kullanici_adi;
    ?>
                </h2>

                <p>Giriş Sağlayan Kişinin Kullanıcı adı:
                    <?php
echo $kullanici_adi;
?>
                </p>



                <p>Giriş Sağlayan Kişinin Şifresi:
                    <?php
echo $sifre;
?>
                </p>



                <form action="logout.php" method="POST">
                    <button class="cikis-buton" name="logout">Çıkış Yap</button>
                </form>

            </div>

            <div class="form-container">
    <h2>Şifre Değiştir</h2>
    <form action="change_pass.php" method="POST">
        <label for="yeni_sifre">Yeni Şifre:</label>
        <input type="password" id="yeni_sifre" name="yeni_sifre" oninput="onlyLettersAndNumbers(this)"><br><br>

        <label for="yeni_sifre_tekrar">Yeni Şifre (Tekrar):</label>
        <input type="password" id="yeni_sifre_tekrar" name="yeni_sifre_tekrar" oninput="onlyLettersAndNumbers(this)"><br><br>

        <button class="profil-buton" name="sifre_degistir">Şifre Değiştir</button>

  

    </form>
</div>


        </div>





    </main>

    <script>
window.onload = function() {
    <?php
    if (isset($pass_changed) && $pass_changed) {
        echo 'showAlert("Şifre değiştirildi!", "success");';

    }
    if (isset($pass_not_match) && $pass_not_match) {
        echo 'showAlert("Şifreler birbiriyle uyuşmuyor!", "danger");';
    }
    ?>
};

function showAlert(message, type) {
    const alertDiv = document.createElement("div");
    alertDiv.classList.add("alert", `alert-${type}`);
    alertDiv.textContent = message;
    document.querySelector(".form-container").appendChild(alertDiv);

    setTimeout(function() {
        alertDiv.remove();
    }, 2000);
}

</script>

<script>
        function onlyLettersAndNumbers(input) {

            input.value = input.value.replace(/[^a-zA-Z0-9]/g, '');
        }
    </script>

</body>

</html>