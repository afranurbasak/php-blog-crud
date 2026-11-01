<?php
require_once 'includes/kontrol.php';
require_once 'includes/database.php';

// Giriş yapan kullanıcının gönderilerini çek
$kullanici_id = $_SESSION['kullanici_id'];
$sorgu = $baglanti->prepare("SELECT * FROM posts WHERE user_id = ? ORDER BY created_at DESC");
$sorgu->execute([$kullanici_id]);
$gonderiler = $sorgu->fetchAll(PDO::FETCH_ASSOC);
?>

<h2>Hoş geldin, <?php echo $_SESSION['kullanici_adi']; ?>!</h2>
<p><a href="gonderiolustur.php">Yeni Gönderi Oluştur</a> | <a href="cikis.php">Çıkış Yap</a></p>

<?php if (count($gonderiler) > 0): ?>
    <ul>
        <?php foreach ($gonderiler as $gonderi): ?>
            <li>
                <strong><?php echo htmlspecialchars($gonderi['title']); ?></strong><br>
                <?php echo htmlspecialchars(substr($gonderi['content'], 0, 100)); ?>...
                <br>
                <a href="gonderidetay.php?id=<?php echo $gonderi['id']; ?>">Detay</a> |
                <a href="gonderiduzenle.php?id=<?php echo $gonderi['id']; ?>">Düzenle</a> |
                <a href="gonderisil.php?id=<?php echo $gonderi['id']; ?>" onclick="return confirm('Silmek istediğine emin misin?')">Sil</a>
            </li>
            <hr>
        <?php endforeach; ?>
    </ul>
<?php else: ?>
    <p>Henüz gönderin yok. Hadi ilk gönderini oluştur!</p>
<?php endif; ?>
