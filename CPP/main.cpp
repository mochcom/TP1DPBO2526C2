// Saya Moch Fadillah Pratama dengan NIM 2506968 mengerjakan Tugas Praktikum 1 dalam mata kuliah Desain dan Pemrograman Berbasis Objek untuk keberkahan-Nya maka saya tidak melakukan kecurangan seperti yang telah dispesifikasikan. Aamiin.

#include <iostream>  // Mengimpor library iostream untuk operasi input/output dasar (cin, cout)
#include <vector>    // Mengimpor library vector untuk mengelola array dinamis
#include <string>    // Mengimpor library string untuk memproses teks
#include <algorithm> // Mengimpor library algorithm untuk fungsi manipulasi data seperti transform dan max
#include <iomanip>   // Mengimpor library iomanip untuk mengatur format output (setw, setprecision, fixed)
#include <limits>    // Mengimpor library limits untuk membersihkan buffer input (numeric_limits)
#include "Studio.cpp" // Mengimpor definisi dan implementasi class Studio dari file Studio.cpp

using namespace std; // Menggunakan namespace std agar tidak perlu menuliskan 'std::' di setiap fungsi dasar

// Validasi input String (Tidak Boleh Kosong)
string inputString(const string& prompt) { // Deklarasi fungsi inputString dengan parameter prompt berupa referensi konstan
    string val; // Deklarasi variabel val untuk menyimpan input dari pengguna
    while (true) { // Melakukan perulangan tak terbatas hingga input valid
        cout << prompt; // Menampilkan pesan petunjuk ke layar
        getline(cin, val); // Membaca satu baris teks penuh termasuk spasi dari input keyboard
        if (val.empty()) { // Memeriksa apakah input teks kosong
            cout << "[Error] Input tidak boleh kosong! Silakan masukkan teks yang valid.\n"; // Menampilkan pesan error jika kosong
        } else { // Jika input mengandung teks
            return val; // Mengembalikan nilai teks yang valid dan keluar dari fungsi
        } // Penutup kondisi if-else
    } // Penutup blok perulangan while
} // Penutup fungsi inputString

// Validasi input Integer (Cek Huruf & Nilai Negatif)
int inputInt(const string& prompt, bool izinkanNegatif = false) { // Deklarasi fungsi inputInt dengan default parameter izinkanNegatif
    int val; // Deklarasi variabel val bernilai integer
    while (true) { // Melakukan perulangan tak terbatas hingga input bilangan bulat valid
        cout << prompt; // Menampilkan pesan petunjuk ke layar
        if (cin >> val) { // Memeriksa apakah input berhasil diubah menjadi bilangan bulat
            cin.ignore(numeric_limits<streamsize>::max(), '\n'); // Membersihkan karakter sisa seperti newline dari buffer input
            if (!izinkanNegatif && val < 0) { // Memeriksa jika nilai negatif tidak diizinkan dan angka yang diinput < 0
                cout << "[Error] Nilai tidak boleh negatif (kurang dari 0)! Masukkan angka 0 atau lebih.\n"; // Menampilkan pesan error
            } else { // Jika validasi lolos
                return val; // Mengembalikan nilai integer yang valid
            } // Penutup kondisi batas nilai angka
        } else { // Jika pengguna menginput tipe data selain angka (misal huruf)
            cout << "[Error] Input harus berupa angka bulat! Huruf/karakter tidak diperbolehkan.\n"; // Menampilkan pesan error
            cin.clear(); // Memulihkan status cin dari kondisi fail state
            cin.ignore(numeric_limits<streamsize>::max(), '\n'); // Membuang karakter yang salah dari buffer input
        } // Penutup kondisi pembacaan input cin
    } // Penutup blok perulangan while
} // Penutup fungsi inputInt

// Validasi input Double/Float (Cek Huruf & Nilai Negatif)
double inputDouble(const string& prompt, bool izinkanNegatif = false) { // Deklarasi fungsi inputDouble untuk membaca tipe desimal
    double val; // Deklarasi variabel val bernilai double
    while (true) { // Perulangan tak terbatas untuk validasi
        cout << prompt; // Menampilkan pesan petunjuk
        if (cin >> val) { // Memeriksa apakah input berhasil diubah menjadi tipe double
            cin.ignore(numeric_limits<streamsize>::max(), '\n'); // Membersihkan sisa karakter buffer hingga newline
            if (!izinkanNegatif && val < 0) { // Memeriksa jika angka bernilai negatif saat tidak diizinkan
                cout << "[Error] Nilai tidak boleh negatif (kurang dari 0)! Masukkan nominal yang valid.\n"; // Menampilkan error nilai negatif
            } else { // Jika nilai desimal valid
                return val; // Mengembalikan nilai double yang diinput
            } // Penutup batas nilai angka desimal
        } else { // Jika input gagal (bukan angka desimal/riil)
            cout << "[Error] Input harus berupa angka desimal/bilangan riil!\n"; // Menampilkan pesan error
            cin.clear(); // Mereset kondisi error pada cin
            cin.ignore(numeric_limits<streamsize>::max(), '\n'); // Membuang input tidak valid dari buffer
        } // Penutup cek kondisi cin desimal
    } // Penutup perulangan while
} // Penutup fungsi inputDouble

int cariIndexStudio(const vector<Studio>& daftarStudio, const string& id) { // Fungsi pencarian indeks objek Studio dalam vector berdasarkan ID
    for (size_t i = 0; i < daftarStudio.size(); i++) { // Melakukan iterasi ke seluruh elemen vector daftarStudio
        string idCurrent = daftarStudio[i].getIdStudio(); // Mengambil ID dari objek Studio pada indeks i
        string idTarget = id; // Menampung ID target yang ingin dicari
        transform(idCurrent.begin(), idCurrent.end(), idCurrent.begin(), ::tolower); // Mengubah semua karakter idCurrent menjadi huruf kecil
        transform(idTarget.begin(), idTarget.end(), idTarget.begin(), ::tolower); // Mengubah semua karakter idTarget menjadi huruf kecil
        if (idCurrent == idTarget) return i; // Mengembalikan nilai indeks i jika ID ditemukan
    } // Penutup blok perulangan for
    return -1; // Mengembalikan -1 jika ID tidak ditemukan dalam vector
} // Penutup fungsi cariIndexStudio

string buatGaris(const vector<int>& lebar) { // Fungsi pembantu untuk membuat garis pembatas horizontal tabel
    string garis = "+"; // Inisialisasi awal string garis pembatas
    for (int l : lebar) garis += string(l + 2, '-') + "+"; // Menambahkan pola garis '-' sesuai lebar kolom ditambah tanda '+'
    return garis; // Mengembalikan string garis lengkap
} // Penutup fungsi buatGaris

void tampilkanTabelStudio(const vector<Studio>& list) { // Fungsi untuk menampilkan seluruh data studio dalam bentuk tabel rapi
    if (list.empty()) { // Memeriksa jika vector list studio kosong
        cout << "Belum ada data studio.\n"; // Menampilkan pesan jika tidak ada data
        return; // Menghentikan eksekusi fungsi
    } // Penutup batas cek ketersediaan data

    vector<string> headers = {"ID", "Nama Studio", "Kapasitas", "Tipe Layar", "Harga Sewa", "Lantai", "Sistem Suara", "Proyektor", "Path Gambar"}; // Membuat vector judul kolom
    vector<int> lebar(headers.size()); // Menyiapkan vector penampung lebar masing-masing kolom
    for (size_t i = 0; i < headers.size(); i++) lebar[i] = headers[i].length(); // Mengisi lebar awal berdasarkan panjang string header

    for (const auto& st : list) { // Iterasi setiap data Studio untuk mencari nilai panjang teks maksimum tiap kolom
        lebar[0] = max(lebar[0], (int)st.getIdStudio().length()); // Meng-update lebar kolom ID jika data lebih panjang
        lebar[1] = max(lebar[1], (int)st.getNamaStudio().length()); // Meng-update lebar kolom Nama Studio
        lebar[2] = max(lebar[2], (int)to_string(st.getKapasitasKursi()).length()); // Meng-update lebar kolom Kapasitas
        lebar[3] = max(lebar[3], (int)st.getTipeLayar().length()); // Meng-update lebar kolom Tipe Layar
        lebar[4] = max(lebar[4], (int)to_string((long long)st.getHargaSewa()).length()); // Meng-update lebar kolom Harga Sewa
        lebar[5] = max(lebar[5], (int)to_string(st.getLokasiLantai()).length()); // Meng-update lebar kolom Lokasi Lantai
        lebar[6] = max(lebar[6], (int)st.getSistemSuara().length()); // Meng-update lebar kolom Sistem Suara
        lebar[7] = max(lebar[7], (int)st.getProyektor().length()); // Meng-update lebar kolom Proyektor
        lebar[8] = max(lebar[8], (int)st.getGambar().length()); // Meng-update lebar kolom Path Gambar
    } // Penutup iterasi penentuan lebar kolom

    string garis = buatGaris(lebar); // Membuat string garis pembatas tabel berdasarkan lebar maksimal
    cout << garis << "\n|"; // Mencetak garis atas tabel
    for (size_t i = 0; i < headers.size(); i++) cout << " " << left << setw(lebar[i]) << headers[i] << " |"; // Mencetak judul-judul kolom
    cout << "\n" << garis << "\n"; // Mencetak garis pembatas di bawah header

    for (const auto& st : list) { // Iterasi mencetak setiap baris data Studio
        cout << "| " << left << setw(lebar[0]) << st.getIdStudio() // Cetak kolom ID
             << " | " << left << setw(lebar[1]) << st.getNamaStudio() // Cetak kolom Nama
             << " | " << left << setw(lebar[2]) << st.getKapasitasKursi() // Cetak kolom Kapasitas Kursi
             << " | " << left << setw(lebar[3]) << st.getTipeLayar() // Cetak kolom Tipe Layar
             << " | " << left << setw(lebar[4]) << fixed << setprecision(0) << st.getHargaSewa() // Cetak kolom Harga Sewa tanpa angka desimal
             << " | " << left << setw(lebar[5]) << st.getLokasiLantai() // Cetak kolom Lokasi Lantai
             << " | " << left << setw(lebar[6]) << st.getSistemSuara() // Cetak kolom Sistem Suara
             << " | " << left << setw(lebar[7]) << st.getProyektor() // Cetak kolom Proyektor
             << " | " << left << setw(lebar[8]) << st.getGambar() << " |\n"; // Cetak kolom Path Gambar
    } // Penutup perulangan cetak data
    cout << garis << "\n"; // Mencetak garis pembatas paling bawah tabel
} // Penutup fungsi tampilkanTabelStudio

// ==================== PROGRAM UTAMA ====================
int main() { // Fungsi utama program C++
    vector<Studio> daftarStudio; // Deklarasi vector untuk menyimpan sekumpulan objek Studio
    daftarStudio.emplace_back("STD-01", "Studio 1 Ultra", 150, "IMAX 3D", 5000000, 3, "Dolby Atmos 7.1", "Laser 4K", "assets/studio1.png"); // Menambahkan data awal/dummy ke dalam vector

    int pilihan = 0; // Deklarasi variabel untuk menyimpan pilihan menu pengguna

    do { // Perulangan do-while untuk menampilkan menu utama
        cout << "\n=== SYSTEM MANAGEMENT STUDIO BIOSKOP (C++) ===\n"; // Cetak judul program
        cout << "1. Tambah Data Studio\n"; // Cetak opsi menu 1
        cout << "2. Tampilkan Semua Studio\n"; // Cetak opsi menu 2
        cout << "3. Cari Data Studio\n"; // Cetak opsi menu 3
        cout << "4. Update Data Studio\n"; // Cetak opsi menu 4
        cout << "5. Hapus Data Studio\n"; // Cetak opsi menu 5
        cout << "6. Keluar\n"; // Cetak opsi menu 6
        
        pilihan = inputInt("Pilih menu (1-6): "); // Mengambil input pilihan menu dari pengguna

        if (pilihan == 1) { // Mengecek jika pengguna memilih menu 1
            cout << "\n--- TAMBAH DATA STUDIO ---\n"; // Cetak sub-header tambah data
            string id; // Deklarasi variabel penampung ID
            while (true) { // Perulangan untuk memeriksa keunikan ID
                id = inputString("ID Studio       : "); // Meminta input ID Studio
                if (cariIndexStudio(daftarStudio, id) != -1) { // Mengecek jika ID sudah ada di vector
                    cout << "[Error] ID Studio '" << id << "' sudah digunakan! Masukkan ID lain.\n"; // Tampilkan error ID duplikat
                } else { // Jika ID unik
                    break; // Keluar dari perulangan validasi ID
                } // Penutup cek ID duplikat
            } // Penutup loop ID

            string nama = inputString("Nama Studio     : "); // Meminta input Nama Studio
            int kapasitas = inputInt("Kapasitas Kursi : "); // Meminta input Kapasitas Kursi
            string layar = inputString("Tipe Layar      : "); // Meminta input Tipe Layar
            double harga = inputDouble("Harga Sewa      : "); // Meminta input Harga Sewa
            int lantai = inputInt("Lokasi Lantai   : "); // Meminta input Lokasi Lantai
            string suara = inputString("Sistem Suara    : "); // Meminta input Sistem Suara
            string proyektor = inputString("Proyektor       : "); // Meminta input jenis Proyektor
            string gambar = inputString("Path Gambar     : "); // Meminta input Path Gambar

            daftarStudio.emplace_back(id, nama, kapasitas, layar, harga, lantai, suara, proyektor, gambar); // Membuat objek Studio baru dan menyimpannya di vector
            cout << "[+] Data Studio berhasil ditambahkan!\n"; // Pesan sukses penambahan data

        } else if (pilihan == 2) { // Mengecek jika pengguna memilih menu 2
            cout << "\n--- DAFTAR SELURUH STUDIO ---\n"; // Cetak sub-header tampilkan data
            tampilkanTabelStudio(daftarStudio); // Memanggil fungsi untuk menampilkan daftar studio dalam tabel

        } else if (pilihan == 3) { // Mengecek jika pengguna memilih menu 3
            cout << "\n--- CARI DATA STUDIO ---\n"; // Cetak sub-header cari data
            string id = inputString("Masukkan ID Studio: "); // Meminta ID studio yang akan dicari
            int idx = cariIndexStudio(daftarStudio, id); // Mencari indeks studio berdasarkan ID
            if (idx != -1) { // Jika studio ditemukan
                cout << "[+] Data Ditemukan:\n"; // Cetak pemberitahuan data ditemukan
                tampilkanTabelStudio({ daftarStudio[idx] }); // Tampilkan baris studio yang ditemukan dalam bentuk tabel
            } else { // Jika studio tidak ditemukan
                cout << "[Error] Data dengan ID '" << id << "' tidak ditemukan!\n"; // Cetak pesan error
            } // Penutup kondisi pencarian

        } else if (pilihan == 4) { // Mengecek jika pengguna memilih menu 4
            cout << "\n--- UPDATE DATA STUDIO ---\n"; // Cetak sub-header update data
            string id = inputString("Masukkan ID Studio yang ingin diubah: "); // Meminta ID studio yang akan diubah
            int idx = cariIndexStudio(daftarStudio, id); // Mencari indeks studio
            if (idx != -1) { // Jika data ditemukan
                cout << "\nMasukkan Data Baru:\n"; // Informasi input data baru
                daftarStudio[idx].setNamaStudio(inputString("Nama Studio     : ")); // Memperbarui Nama Studio
                daftarStudio[idx].setKapasitasKursi(inputInt("Kapasitas Kursi : ")); // Memperbarui Kapasitas Kursi
                daftarStudio[idx].setTipeLayar(inputString("Tipe Layar      : ")); // Memperbarui Tipe Layar
                daftarStudio[idx].setHargaSewa(inputDouble("Harga Sewa      : ")); // Memperbarui Harga Sewa
                daftarStudio[idx].setLokasiLantai(inputInt("Lokasi Lantai   : ")); // Memperbarui Lokasi Lantai
                daftarStudio[idx].setSistemSuara(inputString("Sistem Suara    : ")); // Memperbarui Sistem Suara
                daftarStudio[idx].setProyektor(inputString("Proyektor       : ")); // Memperbarui Proyektor
                daftarStudio[idx].setGambar(inputString("Path Gambar     : ")); // Memperbarui Path Gambar
                cout << "[+] Data Studio berhasil diperbarui!\n"; // Cetak pesan sukses update
            } else { // Jika ID tidak ditemukan
                cout << "[Error] Data dengan ID '" << id << "' tidak ditemukan!\n"; // Cetak pesan error
            } // Penutup kondisi update

        } else if (pilihan == 5) { // Mengecek jika pengguna memilih menu 5
            cout << "\n--- HAPUS DATA STUDIO ---\n"; // Cetak sub-header hapus data
            string id = inputString("Masukkan ID Studio yang ingin dihapus: "); // Meminta ID studio yang akan dihapus
            int idx = cariIndexStudio(daftarStudio, id); // Mencari indeks elemen
            if (idx != -1) { // Jika data ditemukan
                daftarStudio.erase(daftarStudio.begin() + idx); // Menghapus data dari vector berdasarkan posisinya
                cout << "[+] Data Studio berhasil dihapus!\n"; // Cetak pesan sukses hapus
            } else { // Jika data tidak ditemukan
                cout << "[Error] Data dengan ID '" << id << "' tidak ditemukan!\n"; // Cetak pesan error
            } // Penutup kondisi hapus

        } else if (pilihan == 6) { // Mengecek jika pengguna memilih menu 6
            cout << "Terima kasih, program selesai.\n"; // Pesan perpisahan saat keluar dari program
        } else { // Jika pilihan menu bukan angka 1-6
            cout << "[Error] Pilihan menu tidak valid! Harap masukkan angka 1-6.\n"; // Cetak pesan error menu
        } // Penutup percabangan menu utama

    } while (pilihan != 6); // Perulangan terus berjalan selama pengguna tidak memilih menu 6

    return 0; // Mengembalikan nilai 0 penanda program berhenti dengan sukses
} // Penutup fungsi main