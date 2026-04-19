# 🧾 BiyaLog - PHP & MySQL

BiyaLog adalah aplikasi sederhana untuk mencatat lagu dalam bentuk receipt aesthetic (mirip struk Spotify).

Dibuat menggunakan PHP Native dan MySQL sebagai latihan membuat mini web app dengan UI unik.

---

## ✨ Fitur

* Tambah lagu
* Tampilkan daftar lagu (receipt style)
* Hitung total durasi otomatis
* Hapus lagu
* Reset semua data
* Export receipt menjadi gambar

---

## 🛠️ Teknologi

* PHP
* MySQL
* Tailwind CSS
* HTML & JavaScript

---

## 📁 Struktur Folder

biyalog/  
│  
├── core.php  
├── forge.php  
├── portal.php  
├── purge.php  
├── receiptify.sql  
└── README.md  

---

## ⚙️ Cara Menjalankan

1. Clone repository ini  
2. Pindahkan ke folder `htdocs`  
3. Jalankan XAMPP / Laragon (Apache & MySQL)  
4. Import database `receiptify.sql` ke phpMyAdmin  
5. Buka di browser:  
   http://localhost/biyalog/forge.php  

---

## 🧾 Database

CREATE DATABASE receiptify;

USE receiptify;

CREATE TABLE tracks (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255),
    artist VARCHAR(255),
    duration VARCHAR(10)
);
Biya
