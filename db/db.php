<?php

$servername = "localhost";
$username = "root"; 
$password = ""; 
$database = "phpproject"; 


$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Veritabanı bağlantısı başarısız: " . $conn->connect_error);
}


function girisKontrol($kullanici_adi, $sifre) {
    global $conn;
    
    $kullanici_adi = mysqli_real_escape_string($conn, $kullanici_adi);
    $sifre = mysqli_real_escape_string($conn, $sifre);
    
    $sql = "SELECT * FROM users WHERE kullanici_adi='$kullanici_adi' AND sifre='$sifre'";
    $sonuc = $conn->query($sql);
    
    if ($sonuc->num_rows > 0) {

        return true;
    } else {

        return false;
    }
}
?>
