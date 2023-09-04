

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/main_page.css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.1/css/bootstrap.min.css" />
    <title>Anasayfa</title>
</head>
<body>
    <header>
        <nav>
        <ul>
            <li><a href="#">Ana Sayfa</a></li>
            <li><a href="#">Hakkımızda</a></li>
            <li><a href="#">Ürünler</a></li>
            <li><a href="#">İletişim</a></li>
        </ul>
    </nav>
    </header>
    

    
    <main>
        <h2>Anasayfa İçeriği</h2>
        <?php
session_start();

if (isset($_SESSION["kullanici_adi"])) {
    $kullanici_adi = $_SESSION["kullanici_adi"];
    echo "<p>Hoş geldiniz, $kullanici_adi</p>";
} else {
    echo "<p>Oturum açmış bir kullanıcı bulunmuyor.</p>";
}
?>


        
    </main>
    
    <footer>
        <p>&copy; 2023 Eray Bahçegülü</p>
    </footer>
</body>
</html>