<?php
session_start();
require_once 'includes/database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email']);
    $sifre = $_POST['sifre'];

    $sorgu = $baglanti->prepare("SELECT * FROM users WHERE email = ?");
    $sorgu->execute([$email]);
    $kullanici = $sorgu->fetch(PDO::FETCH_ASSOC);

    if ($kullanici && password_verify($sifre, $kullanici['password'])) {
        session_regenerate_id(true);
        $_SESSION['kullanici_id'] = $kullanici['id'];
        $_SESSION['kullanici_adi'] = $kullanici['username'];
        header("Location: ana_sayfa.php");
        exit;
    } else {
        echo "Hatalı e-posta veya şifre!";
    }
}
?>

<h2>Giriş Yap</h2>
<form method="POST" action="">
    <label>E-posta:</label><br>
    <input type="email" name="email" required><br><br>

    <label>Şifre:</label><br>
    <input type="password" name="sifre" required><br><br>

    <button type="submit">Giriş Yap</button>
</form>
