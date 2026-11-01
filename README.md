# PHP Blog (CRUD)

## 🇹🇷 Türkçe

### Proje Hakkında
Kullanıcıların kayıt olup giriş yaptıktan sonra kendi blog gönderilerini oluşturabildiği, düzenleyebildiği ve silebildiği çok kullanıcılı basit bir blog uygulamasıdır. Veritabanı işlemleri PDO ve hazır sorgularla yapılır.

### Özellikler
- Kullanıcı kaydı ve girişi; şifreler `password_hash` ile saklanır ve `password_verify` ile doğrulanır
- Oturum (session) tabanlı erişim kontrolü ve çıkış
- Gönderi oluşturma, listeleme, detay görüntüleme, düzenleme ve silme (CRUD)
- Sahiplik kontrolü: kullanıcılar yalnızca kendi gönderilerini düzenleyebilir veya silebilir
- PDO ile hazır sorgular (prepared statements)

### Kullanılan Teknolojiler
PHP, PDO, MySQL / MariaDB, HTML, Session

### Kurulum
1. XAMPP veya PHP 8 + MySQL/MariaDB içeren bir ortam kurun.
2. Depoyu web sunucusunun kök dizinine klonlayın:
   ```bash
   git clone https://github.com/afranurbasak/php-blog-crud.git
   ```
3. `blogproje.sql` dosyasını MySQL'e aktarın.
4. Gerekirse `includes/database.php` dosyasındaki bağlantı bilgilerini düzenleyin.

### Kullanım
Tarayıcıda `http://localhost/php-blog-crud/giris.php` adresini açın. Demo hesapla (`demo@example.com` / `demo1234`) giriş yapabilir ya da `kayit.php` üzerinden yeni kullanıcı oluşturabilirsiniz.

Arayüz metinleri Türkçedir.

## 🇬🇧 English

### About the Project
A simple multi-user blog application where users register, sign in, and then create, edit and delete their own blog posts. Database operations use PDO with prepared statements.

### Features
- User registration and login; passwords are stored with `password_hash` and verified with `password_verify`
- Session-based access control and logout
- Creating, listing, viewing, editing and deleting posts (CRUD)
- Ownership checks: users can only edit or delete their own posts
- Prepared statements with PDO

### Technologies
PHP, PDO, MySQL / MariaDB, HTML, Sessions

### Installation
1. Install XAMPP or any PHP 8 + MySQL/MariaDB environment.
2. Clone the repository into your web server's root directory:
   ```bash
   git clone https://github.com/afranurbasak/php-blog-crud.git
   ```
3. Import `blogproje.sql` into MySQL.
4. If needed, edit the connection settings in `includes/database.php`.

### Usage
Open `http://localhost/php-blog-crud/giris.php` in your browser. Sign in with the demo account (`demo@example.com` / `demo1234`) or create a new user via `kayit.php`.

The user interface is in Turkish.
