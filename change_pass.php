<?php
session_start();
include("db/db.php");

if (isset($_POST["sifre_degistir"])) {

    $yeni_sifre = $_POST["yeni_sifre"];
    $yeni_sifre_tekrar = $_POST["yeni_sifre_tekrar"];


    if ($yeni_sifre == $yeni_sifre_tekrar) {

        if (isset($_SESSION["kullanici_adi"])) {
            $kullanici_adi = $_SESSION["kullanici_adi"];


            $sql = "UPDATE users SET sifre='$yeni_sifre' WHERE kullanici_adi='$kullanici_adi'";
            if ($conn->query($sql) === TRUE) {

                $_SESSION["sifre"] = $yeni_sifre;
                $_SESSION["pass_changed"] = true; 
                header("Location: main_page.php"); 
                exit();
            } else {
                $_SESSION["pass_not_match"] = true; 
                header("Location: main_page.php"); 
                exit();
            }
        } else {
            $_SESSION["pass_not_match"] = true;
            header("Location: main_page.php"); 
            exit();
        }
    } else {
        $_SESSION["pass_not_match"] = true; 
        header("Location: main_page.php"); 
        exit();
    }
}
?>
