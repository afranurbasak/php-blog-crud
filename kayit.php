<?php
require_once 'includes/database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $kullanici_adi = trim($_POST['kullanici_adi']);
    $email = trim($_POST['email']);
    $sifre = password_hash($_POST['sifre'], PASSWORD_DEFAULT);

    $sorgu = $baglanti->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
    $sorgu->execute([$kullanici_adi, $email, $sifre]);

    header("Location: giris.php");
    exit;
}
?>

<h2>Kayıt Ol</h2>
<form method="POST" action="">
    <label>Kullanıcı Adı:</label><br>
    <input type="text" name="kullanici_adi" required><br><br>

    <label>E-posta:</label><br>
    <input type="email" name="email" required><br><br>

    <label>Şifre:</label><br>
    <input type="password" name="sifre" required><br><br>

    <button type="submit">Kayıt Ol</button>
</form>
