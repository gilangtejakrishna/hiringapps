Berikut tutorial yang disesuaikan dengan nama aplikasi "Hiring Apps", menggunakan database `laravel`, user `root`, dan password kosong:

1. **Clone Repository**
   - Clone repository aplikasi Laravel dari sumber yang kamu punya:
     ```bash
     git clone https://github.com/username/hiring-apps.git
     ```
   - Setelah selesai, masuk ke direktori project:
     ```bash
     cd hiring-apps
     ```

2. **Install Dependencies**
   - Laravel menggunakan **Composer** untuk mengelola dependensi. Pastikan Composer sudah terinstall. Jika belum, download dan install dari [sini](https://getcomposer.org/).
   - Setelah Composer terinstall, jalankan perintah berikut untuk menginstall dependensi Laravel:
     ```bash
     composer install
     ```

3. **Copy File .env**
   - Buat salinan file `.env` dari file `.env.example`:
     ```bash
     cp .env.example .env
     ```

4. **Generate Application Key**
   - Laravel membutuhkan application key untuk enkripsi data. Jalankan perintah ini untuk generate key baru:
     ```bash
     php artisan key:generate
     ```
   - Ini akan otomatis mengisi `APP_KEY` di file `.env`.

5. **Setup Database**
   - Buka file `.env` dan sesuaikan konfigurasi database sesuai dengan informasi berikut:
     ```bash
     DB_CONNECTION=mysql
     DB_HOST=127.0.0.1
     DB_PORT=3306
     DB_DATABASE=laravel
     DB_USERNAME=root
     DB_PASSWORD=
     ```
   - Buat database di MySQL jika belum ada:
     ```bash
     mysql -u root
     CREATE DATABASE laravel;
     ```

6. **Migrasi Database**
   - Setelah setting database, jalankan migrasi untuk membuat tabel:
     ```bash
     php artisan migrate
     ```

7. **Konfigurasi Permission**
   - Pastikan folder `storage` dan `bootstrap/cache` memiliki permission yang benar:
     ```bash
     sudo chmod -R 775 storage
     sudo chmod -R 775 bootstrap/cache
     ```
   - Jika menggunakan server seperti Nginx atau Apache, pastikan user web server punya akses ke direktori tersebut:
     ```bash
     sudo chown -R www-data:www-data storage
     sudo chown -R www-data:www-data bootstrap/cache
     ```

8. **Jalankan Aplikasi**
   - Setelah semua setup selesai, jalankan aplikasi Laravel di local development server:
     ```bash
     php artisan serve
     ```
   - Aplikasi akan berjalan di `http://localhost:8000`.