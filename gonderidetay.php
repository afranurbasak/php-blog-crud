<?php
require_once 'includes/kontrol.php';
require_once 'includes/database.php';

if (!isset($_GET['id'])) {
    echo "Geçersiz gönderi!";
    exit;
}

$gonderi_id = $_GET['id'];
$sorgu = $baglanti->prepare("SELECT posts.*, users.username FROM posts JOIN users ON posts.user_id = users.id WHERE posts.id = ?");
$sorgu->execute([$gonderi_id]);
$gonderi = $sorgu->fetch(PDO::FETCH_ASSOC);

if (!$gonderi) {
    echo "Gönderi bulunamadı!";
    exit;
}
?>

<h2><?php echo htmlspecialchars($gonderi['title']); ?></h2>
<p><em>Oluşturan: <?php echo htmlspecialchars($gonderi['username']); ?></em></p>
<p><?php echo nl2br(htmlspecialchars($gonderi['content'])); ?></p>
<p><small>Oluşturulma: <?php echo $gonderi['created_at']; ?></small></p>

<?php if ($_SESSION['kullanici_id'] == $gonderi['user_id']): ?>
    <p>
        <a href="gonderiduzenle.php?id=<?php echo $gonderi['id']; ?>">Düzenle</a> |
        <a href="gonderisil.php?id=<?php echo $gonderi['id']; ?>" onclick="return confirm('Silmek istediğine emin misin?')">Sil</a>
    </p>
<?php endif; ?>
