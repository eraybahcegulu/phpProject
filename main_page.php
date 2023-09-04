        <?php
        session_start();
        if (isset($_SESSION["kullanici_adi"])) {
            $kullanici_adi = $_SESSION["kullanici_adi"];
        }

        if (isset($_SESSION["sifre"])) {
            $sifre = $_SESSION["sifre"];
        }
        
        ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/main_page.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">
    <title>Anasayfa</title>
</head>
<body>
    <header>
        <button class="profil-buton">
            <i class="fa-regular fa-user"></i>
            <?php
                echo $kullanici_adi;
            ?>
        </button>
    </header>
    
    <main>
        <h2>Hoşgeldin</h2>

        <p>Giriş Sağlayan Kişininin Kullanıcı adı:
        <?php
            echo $kullanici_adi;
        ?>
        </p>



        <p>Giriş Sağlayan Kişininin Şifresi:
        <?php
            echo $sifre;
        ?>
        </p>

        <form action="logout.php" method="POST">
        <button class="cikis-buton" name="logout">Çıkış Yap</button>
    </form>

    </main>
    
</body>
</html>
