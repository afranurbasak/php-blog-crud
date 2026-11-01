<?php
$sunucu = "localhost";
$veritabani_adi = "blogproje";
$kullanici_adi = "root";
$sifre = "";

try {
    $baglanti = new PDO("mysql:host=$sunucu;dbname=$veritabani_adi;charset=utf8", $kullanici_adi, $sifre);
    $baglanti->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $hata) {
    die("Veritabanı bağlantı hatası: " . $hata->getMessage());
}
