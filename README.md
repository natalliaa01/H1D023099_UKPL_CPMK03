# Proyek Ujian CPMK03 - Lily Cafe (Laravel Dusk)

Ini adalah proyek untuk memenuhi Ujian Tengah Semester mata kuliah Uji Kualitas Perangkat Lunak (UKPL) dengan Capaian Pembelajaran (CPMK) 03. Proyek ini mengimplementasikan otomasi pengujian (browser test) menggunakan **Laravel Dusk** untuk memverifikasi fungsionalitas CRUD (Create, Read, Update, Delete) pada modul **Manajemen Menu** di aplikasi web "Lily Cafe".

---

## Biodata Mahasiswa

| Keterangan | Data |
| :--- | :--- |
| **Nama** | Natalia Nidya Fidelia |
| **NIM** | H1D023099 |
| **Kelas** | B |


---

## 3 Langkah Cepat untuk Menjalankan Proyek

### 1. Setup Awal (Download & Database)

1.  **Download Proyek:** Clone atau download repository ini.
2.  **Install Dependensi:** Buka terminal dan jalankan `composer install`.
3.  **Setup `.env`:** Salin file `.env.example` menjadi `.env`.
    ```bash
    copy .env.example .env
    ```
4.  **Buat Database:** Buat database kosong di XAMPP/Laragon (misal: `lily_cafe`).
5.  **Edit `.env`:** Sesuaikan pengaturan database di file `.env` kamu.
    ```env
    DB_DATABASE=lily_cafe
    DB_USERNAME=root
    DB_PASSWORD=
    ```
6.  **Generate Key:** Jalankan `php artisan key:generate`.

### 2. Migrasi & Seeding (Mengisi Data)

Ini adalah langkah kunci untuk membuat struktur database dan akun admin.

1.  **Buat Migrasi Sesi:** Jalankan ini agar tabel `sessions` dibuat (sesuai arahan).
    ```bash
    php artisan session:table
    ```
2.  **Migrasi Database:** Jalankan ini untuk membuat tabel `users`, `menus`, dan `sessions`.
    ```bash
    php artisan migrate
    ```
3.  **Seeding Akun Admin:** Jalankan ini untuk membuat akun admin (`admin@lilycafe.test` dengan password `password`), sesuai dengan file `DatabaseSeeder.php`.
    ```bash
    php artisan db:seed
    ```

### 3. Jalankan Aplikasi & Tes

1.  **Siapkan Aset:** Jalankan `npm install` lalu `npm run build`.
2.  **Jalankan Server:**
    ```bash
    php artisan serve
    ```
    > Aplikasi sekarang berjalan di `http://127.0.0.1:8000`.

3.  **Jalankan Tes Dusk:** Untuk menjalankan tes otomatisasi:
    ```bash
    php artisan dusk
    ```

## Screenshot
![Image width="216"](https://github.com/user-attachments/assets/d0a68a6f-15ba-49a0-a939-30785ec9a2e9)

![Image](https://github.com/user-attachments/assets/349aa2d1-676f-40cf-9c7e-708941c272bd)

![Image](https://github.com/user-attachments/assets/2a1a9f8c-964a-499b-b142-d1c369751b4f)
