<?php
require_once 'includes/kontrol.php';
require_once 'includes/database.php';

if (!isset($_GET['id'])) {
    echo "Geçersiz işlem!";
    exit;
}

$gonderi_id = $_GET['id'];
$kullanici_id = $_SESSION['kullanici_id'];

$sorgu = $baglanti->prepare("SELECT * FROM posts WHERE id = ? AND user_id = ?");
$sorgu->execute([$gonderi_id, $kullanici_id]);
$gonderi = $sorgu->fetch(PDO::FETCH_ASSOC);

if (!$gonderi) {
    echo "Gönderi bulunamadı ya da yetkiniz yok!";
    exit;
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $baslik = trim($_POST['baslik']);
    $icerik = trim($_POST['icerik']);

    if ($baslik && $icerik) {
        $guncelle = $baglanti->prepare("UPDATE posts SET title = ?, content = ? WHERE id = ?");
        $guncelle->execute([$baslik, $icerik, $gonderi_id]);
        header("Location: gonderidetay.php?id=" . $gonderi_id);
        exit;
    } else {
        echo "Tüm alanları doldurun.";
    }
}
?>

<h2>Gönderiyi Düzenle</h2>
<form method="POST" action="">
    <label>Başlık:</label><br>
    <input type="text" name="baslik" value="<?php echo htmlspecialchars($gonderi['title']); ?>" required><br><br>

    <label>İçerik:</label><br>
    <textarea name="icerik" rows="5" cols="40" required><?php echo htmlspecialchars($gonderi['content']); ?></textarea><br><br>

    <button type="submit">Güncelle</button>
</form>
