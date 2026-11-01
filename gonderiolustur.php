<?php
require_once 'includes/kontrol.php';
require_once 'includes/database.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $baslik = trim($_POST['baslik']);
    $icerik = trim($_POST['icerik']);
    $kullanici_id = $_SESSION['kullanici_id'];

    if ($baslik && $icerik) {
        $sorgu = $baglanti->prepare("INSERT INTO posts (user_id, title, content) VALUES (?, ?, ?)");
        $sorgu->execute([$kullanici_id, $baslik, $icerik]);
        header("Location: ana_sayfa.php");
        exit;
    } else {
        echo "Tüm alanları doldurun.";
    }
}
?>

<h2>Yeni Gönderi Oluştur</h2>
<form method="POST" action="">
    <label>Başlık:</label><br>
    <input type="text" name="baslik" required><br><br>

    <label>İçerik:</label><br>
    <textarea name="icerik" rows="5" cols="40" required></textarea><br><br>

    <button type="submit">Oluştur</button>
</form>
