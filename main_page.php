<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/main_page.css">
    <title>Anasayfa</title>
</head>
<body>
    <header>
        <button class="profil-buton">Profilim</button>
    </header>
    
    <main>
        <h2>Anasayfa İçeriği</h2>
        <?php
        session_start();
        if (isset($_SESSION["kullanici_adi"])) {
            $kullanici_adi = $_SESSION["kullanici_adi"];
            echo "<p>Hoş geldiniz, $kullanici_adi</p>";
        }
        ?>
    </main>
    
    <footer>
        <p>&copy; 2023 Eray Bahçegülü</p>
    </footer>
</body>
</html>
