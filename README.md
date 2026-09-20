# TP1DPBO2526C2
# Tugas Praktikum 1 - Desain dan Pemrograman Berbasis Objek (DPBO)

## 📌 Janji
> Saya Moch Fadillah Pratama dengan NIM 2506968 mengerjakan Tugas Praktikum 1 dalam mata kuliah Desain dan Pemrograman Berbasis Objek untuk keberkahan-Nya maka saya tidak melakukan kecurangan seperti yang telah dispesifikasikan. Aamiin.

---

## 👤 Informasi Mahasiswa
| Detail | Informasi |
| :--- | :--- |
| **Nama** | `Moch Fadillah Pratama` |
| **NIM** | `2506968` |
| **Kelas** | `C2` |
| **Repository** | `TP1DPBO2526C2` |

---

## 🎬 Deskripsi Program
Program ini merupakan aplikasi pengelolaan data bioskop berbasis Object-Oriented Programming (OOP) sederhana yang diimplementasikan dalam 4 bahasa pemrograman yaitu **C++**, **Java**, **Python**, dan **PHP**. 

Aplikasi ini mengelola kumpulan objek (film/bioskop) dalam bentuk *array/list of objects* dengan fitur CRUD (Create, Read, Update, Delete) serta pencarian data.

### 🛠️ Fitur Utama
- ➕ **Tambah Data**: Menambahkan objek data bioskop baru ke dalam daftar.
- 📋 **Tampilkan Data**: Menampilkan seluruh data bioskop yang tersimpan.
- ✏️ **Update Data**: Mengubah data bioskop berdasarkan identifier unik (`ID`).
- 🗑️ **Hapus Data**: Menghapus data bioskop berdasarkan identifier unik (`ID`).
- 🔍 **Cari Data**: Mencari data bioskop spesifik berdasarkan identifier unik (`ID`).

---

## 🏛️ Desain Class & Atribut

Program ini menggunakan **1 class tunggal** bernama `Studio` untuk mepresentasikan data dengan tema bioskop.

### Atribut Class
| Nama Atribut | Tipe Data | Keterangan |
| :--- | :--- | :--- |
| `id` | `String` / `int` | Identifier unik untuk setiap data |
| `judul` | `String` | Judul film / acara bioskop |
| `genre` | `String` | Genre film |
| `harga` | `double` / `int` | Harga tiket bioskop |
| `gambar` | `String` | Path file lokal tempat gambar disimpan |

---

## 🔄 Flow & Alur Kode Program

### 1. Versi CLI (C++, Java, Python)
1. **Inisialisasi**: Program menyiapkan struktur data berupa *list/vector/array* untuk menyimpan objek `Studio`.
2. **Menu Utama**: Program menampilkan antarmuka menu berbasis terminal berulang (loop) hingga pengguna memilih opsi keluar.
3. **Pilihan Operasi**:
   - **Opsi 1 (Tambah Data)**: Meminta input atribut data baru dari pengguna, membuat objek `Studio`, lalu menambahkannya ke dalam list.
   - **Opsi 2 (Tampilkan Data)**: Melakukan iterasi pada list untuk menampilkan atribut seluruh objek yang ada.
   - **Opsi 3 (Cari Data)**: Meminta input `ID`, lalu melakukan pencarian sekuensial pada list. Jika ditemukan, detail objek ditampilkan.
   - **Opsi 4 (Update Data)**: Meminta input `ID`. Jika data ditemukan, pengguna dapat memasukkan nilai atribut baru untuk memperbarui objek.
   - **Opsi 5 (Hapus Data)**: Meminta input `ID`. Jika data ditemukan, elemen objek dihapus dari list.

### 2. Versi Web (PHP)
1. **Form Input HTML**: Pengguna dapat memasukkan data baru melalui formulir input HTML, termasuk mengunggah/memilih path file gambar lokal.
2. **Data**: Menampilkan seluruh objek beserta thumbnail gambar lokal.
3. **Aksi CRUD**:
   - **Submit Form**: Menambahkan objek baru ke dalam daftar.
   - **Tombol Edit/Hapus**: Memproses perubahan atau penghapusan objek berdasarkan `ID` unik.

---

## 📁 Struktur Folder Repositori

```text
TP1DPBO2526C2/
│
├── CPP/
│   ├── main.cpp
│   └── Studio.cpp
│
├── Python/
│   ├── main.py
│   └── Studio.py
│
├── Java/
│   ├── Main.java
│   └── Studio.java
│
├── PHP/
│   ├── assets/
│   │   └── images/
│   │       ├── default.jpg
│   │       ├── studio1.jpg
│   │       └── studio2.jpg
│   ├── uploads/
│   ├── index.php
│   ├── Studio.php
│   └── style.css
│
├── Dokumentasi/
│   ├── cpp_output/
│   ├── java_output/
│   ├── python_output/
│   └── php_output/
│
└── README.md
```

---

## 📸 Dokumentasi Program Berjalan

Berikut adalah bukti dokumentasi tangkapan layar/screenrecord dari masing-masing bahasa pemrograman saat program berhasil dijalankan:

### A. C++ (CLI Output)
![Output Pembuka C++](Dokumentasi/cpp_output/Output_pembuka.png)

#### 1. Tambah Data
![Tambah Data C++](Dokumentasi/cpp_output/Output1.png)

#### 2. Tampilkan Data
![Tampilkan Data C++](Dokumentasi/cpp_output/Output2.png)

#### 3. Cari Data
![Cari Data C++](Dokumentasi/cpp_output/Output3.png)

#### 4. Update Data
![Update Data C++](Dokumentasi/cpp_output/Output4.png)

#### 5. Hapus Data
![Hapus Data C++](Dokumentasi/cpp_output/Output5.png)


### B. Java (CLI Output)
![Output Pembuka Java](Dokumentasi/java_output/Output_pembuka.png)

#### 1. Tambah Data
![Tambah Data Java](Dokumentasi/java_output/Output1.png)

#### 2. Tampilkan Data
![Tampilkan Data Java](Dokumentasi/java_output/Output2.png)

#### 3. Cari Data
![Cari Data Java](Dokumentasi/java_output/Output3.png)

#### 4. Update Data
![Update Data Java](Dokumentasi/java_output/Output4.png)

#### 5. Hapus Data
![Hapus Data Java](Dokumentasi/java_output/Output5.png)


### C. Python (CLI Output)
![Output Pembuka Python](Dokumentasi/python_output/Output_pembuka.png)

#### 1. Tambah Data
![Tambah Data Python](Dokumentasi/python_output/Output1.png)

#### 2. Tampilkan Data
![Tampilkan Data Python](Dokumentasi/python_output/Output2.png)

#### 3. Cari Data
![Cari Data Python](Dokumentasi/python_output/Output3.png)

#### 4. Update Data
![Update Data Python](Dokumentasi/python_output/Output4.png)

#### 5. Hapus Data
![Hapus Data Python](Dokumentasi/python_output/Output5.png)


### D. PHP (Web Output)
#### 1. Tambah Data
![Tambah Data PHP](Dokumentasi/php_output/Output1.png)

#### 2. Tampilkan Data
![Tampilkan Data PHP](Dokumentasi/php_output/Output2.png)

#### 3. Update Data
![Update Data PHP](Dokumentasi/php_output/Output4_1.png)
![Setelah Update Data PHP](Dokumentasi/php_output/Output4_2.png)

#### 4. Hapus Data
![Hapus Data PHP](Dokumentasi/php_output/Output5_1.png)
![Setelah Hapus Data PHP](Dokumentasi/php_output/Output5_2.png)