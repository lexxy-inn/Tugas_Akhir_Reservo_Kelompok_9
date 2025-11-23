# Reservo

Reservo adalah aplikasi reservasi online khusus **lapangan olahraga** seperti padel, badminton, basket, dan tenis.  
Aplikasi ini hadir untuk memudahkan proses booking yang biasanya masih manual melalui chat atau telepon.  

Dengan Reservo, pengguna dapat melihat ketersediaan jadwal secara **real-time**, melakukan reservasi dengan cepat, serta membantu pemilik venue mengatur jadwal secara efisien.

---

## ✨ Fitur Utama
- 📅 **Booking Online** – Reservasi lapangan olahraga secara instan.  
- 🗓 **Kalender Ketersediaan** – Lihat jadwal real-time dan pilih waktu sesuai.  
- 💳 **Pembayaran Praktis** – Sistem pembayaran aman & cepat.  
- 🔔 **Notifikasi Status** – Pengingat & konfirmasi otomatis.  
- 🔍 **Pencarian Lapangan** – Temukan venue olahraga sesuai kebutuhan.  

---

## 🎯 Tujuan
- Membantu pemain olahraga melakukan reservasi lapangan tanpa ribet.  
- Memberikan pemilik lapangan sistem efisien dalam mengatur penyewaan.  
- Mengurangi risiko *double booking* dan kebingungan jadwal.  

---

## 👤 Target Pengguna
- Atlet, pelajar, mahasiswa, dan masyarakat umum yang aktif berolahraga.  
- Pemilik lapangan olahraga yang ingin manajemen booking lebih modern.  

---

## 🛠 Teknologi
- [Laravel](https://laravel.com/) – Backend Framework  
- [Tailwind CSS](https://tailwindcss.com/) – Styling  
- [MySQL](https://www.mysql.com/) – Database  

---

## 🚀 Timeline Pengembangan
1. **Minggu 1-4** → Perancangan fitur, flowchart, prototipe.  
2. **Minggu 4-8** → Pembuatan website dengan Laravel & MySQL.  
3. **Minggu 8-12** → Testing, dokumentasi, presentasi.  

---

## 👥 Tim Pengembang (Kelompok 9)
- **Jericho Aurelio Rowdy** – Fullstack Developer  
- **Rainer Marvelie** – UI/UX Designer  
- **Darvin Gian Cardo** – UI/UX Designer

Berikut **lanjutan README**-nya dalam format **Markdown (bisa langsung copy–paste ke GitHub)**
Aku lanjutkan sesuai ketentuan tugas: **CRUD untuk entitas wajib**, **desain high-fidelity**, **fungsionalitas berjalan**, **alur penggunaan**, dan **cara instalasi**.

---

## 📂 Entity & CRUD yang Disediakan

Reservo memenuhi ketentuan bahwa seluruh entitas utama yang berkaitan dengan fitur booking memiliki **CRUD lengkap**, yaitu:

### **1. Court (Lapangan)**

Fitur:

* Create data lapangan
* Read daftar lapangan + detail
* Update informasi lapangan
* Delete lapangan

### **2. Court Category**

Fitur:

* Create kategori
* Read daftar kategori
* Update kategori
* Delete kategori

### **3. Schedule (Jadwal)**

Fitur:

* Generate jadwal otomatis
* Read jadwal berdasarkan lapangan
* Update status (available/booked)
* Delete jadwal

### **4. Booking**

Fitur:

* Create booking (user memilih tanggal & waktu)
* Read status booking
* Update pembayaran / status order
* Delete booking

---

## 🧩 Arsitektur Fitur Utama

Aplikasi dibangun mengikuti flow:

1. **User memilih lapangan**
2. **User melihat halaman `description` (detail court)**
3. **User memilih tanggal**
4. **User memilih time slot yang tersedia**
5. **User melakukan proses booking**
6. **Booking masuk ke halaman Orders**
7. **User dapat mengecek status / pembayaran**

Semua proses berjalan secara real-time berdasarkan data jadwal di database.

---

## 🎨 Desain High Fidelity

Aplikasi ini dilengkapi dengan desain **Hi-Fi (High Fidelity)** untuk seluruh halaman:

* Landing Page
* Dashboard / Discover
* Available Courts
* Description (Detail lapangan + kalender + jadwal)
* Booking Page
* Payment Page
* Orders Page
* Admin CRUD (Court, Category, Schedule)

Desain dibuat oleh tim UI/UX menggunakan Figma.

---

## 🧪 Testing

Sebelum finalisasi, seluruh fitur diuji:

* ✔️ Booking lapangan
* ✔️ Validasi tanggal tidak boleh tanggal yang lewat
* ✔️ Time slot otomatis disable jika sudah di-book
* ✔️ Redirect dari Description → Payment → Orders
* ✔️ Login + session
* ✔️ CRUD Admin berjalan
* ✔️ Seeder dan storage gambar berfungsi

---

## 🚀 Cara Instalasi & Menjalankan Aplikasi

### **1. Clone Repository**

```bash
git clone https://github.com/lexxy-inn/Tugas_Akhir_Reservo_Kelompok_9.git
cd Tugas_Akhir_Reservo_Kelompok_9
```

### **2. Install Dependencies**

```bash
composer install
npm install
```

### **3. Copy File Environment**

```bash
cp .env.example .env
php artisan key:generate
```

### **4. Setup Database**

Buat database MySQL lalu isi `.env`:

```
DB_DATABASE=reservo
DB_USERNAME=root
DB_PASSWORD=
```

### **5. Migrasi & Seeder**

```bash
php artisan migrate --seed
```

### **6. Jalankan Server**

```bash
php artisan serve
npm run dev
```

---

## 🧑‍💻 Hak Akses

### **User**

* Bisa melihat daftar lapangan
* Booking
* Pembayaran
* Melihat riwayat pemesanan

### **Admin**

* CRUD Court
* CRUD Categories
* CRUD Schedule
* Manajemen Booking

---

## 📊 ERD (Entity Relationship Diagram)

**Court —< Schedule —< Booking >— User**

---

## 📝 Lisensi

Aplikasi ini dibuat untuk keperluan **Tugas Akhir Kelompok 9** SMK Kriten Immanuel Pontianak tahun 2025.
