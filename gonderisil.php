<?php
require_once 'includes/kontrol.php';
require_once 'includes/database.php';

if (!isset($_GET['id'])) {
    echo "Geçersiz istek!";
    exit;
}

$gonderi_id = $_GET['id'];
$kullanici_id = $_SESSION['kullanici_id'];

// Kullanıcıya ait mi kontrol et
$sorgu = $baglanti->prepare("SELECT * FROM posts WHERE id = ? AND user_id = ?");
$sorgu->execute([$gonderi_id, $kullanici_id]);
$gonderi = $sorgu->fetch(PDO::FETCH_ASSOC);

if (!$gonderi) {
    echo "Gönderi bulunamadı veya silme yetkiniz yok!";
    exit;
}

// Silme işlemi
$sil = $baglanti->prepare("DELETE FROM posts WHERE id = ?");
$sil->execute([$gonderi_id]);

header("Location: ana_sayfa.php");
exit;
