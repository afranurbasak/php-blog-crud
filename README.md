# PHP Blog (CRUD)

Simple multi-user blog: users register and sign in, then create, edit and delete their own posts.

## Features

- Registration and login with `password_hash` / `password_verify`, session-based access control
- Post CRUD with ownership checks (users can only edit or delete their own posts)
- PDO with prepared statements

## Setup

1. Import `blogproje.sql` into MySQL.
2. Place the folder in your web server root (e.g. XAMPP `htdocs/`) and adjust `includes/database.php` if needed.
3. Open `giris.php` and sign in with the demo account `demo@example.com` / `demo1234`, or register a new user.

## Tech stack

PHP · PDO · MySQL · Sessions

UI text is in Turkish.
