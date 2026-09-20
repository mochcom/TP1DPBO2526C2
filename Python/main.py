# Saya Moch Fadillah Pratama dengan NIM 2506968 mengerjakan Tugas Praktikum 1 dalam mata kuliah Desain dan Pemrograman Berbasis Objek untuk keberkahan-Nya maka saya tidak melakukan kecurangan seperti yang telah dispesifikasikan. Aamiin.

from Studio import Studio # Mengimpor kelas Studio dari berkas Studio.py

# Handler untuk input string tidak kosong
def input_string(prompt): # Mendefinisikan fungsi validasi masukan berupa teks
    while True: # Perulangan tak terbatas sampai diperoleh masukan yang valid
        val = input(prompt).strip() # Membaca masukan dari pengguna lalu menghapus spasi awal/akhir
        if not val: # Memeriksa apakah nilai variabel bernilai kosong
            print("[Error] Input tidak boleh kosong! Silakan masukkan teks yang valid.") # Menampilkan pesan peringatan kesalahan
        else: # Jika teks terisi dan valid
            return val # Mengembalikan teks valid dan menghentikan perulangan

# Handler untuk input integer valid dan non-negatif
def input_int(prompt): # Mendefinisikan fungsi validasi masukan angka bulat
    while True: # Perulangan berulang hingga nilai bilangan bulat diterima
        raw = input(prompt).strip() # Membaca teks mentah dari terminal
        try: # Blok pengujian konversi tipe data
            val = int(raw) # Mengonversi teks mentah menjadi tipe integer
            if val < 0: # Pengecekan nilai agar tidak bernilai negatif
                print("[Error] Nilai tidak boleh negatif! Masukkan angka 0 atau lebih.") # Menampilkan pesan kesalahan bilangan negatif
            else: # Jika nilai tidak negatif
                return val # Mengembalikan angka bulat yang terverifikasi
        except ValueError: # Menangkap kesalahan konversi nilai bukan angka
            print(f"[Error] Input harus berupa angka bulat! '{raw}' tidak valid.") # Menampilkan instruksi perbaikan format

# Handler untuk input float valid dan non-negatif
def input_float(prompt): # Mendefinisikan fungsi validasi masukan angka desimal
    while True: # Perulangan hingga nilai desimal valid diproses
        raw = input(prompt).strip() # Membaca input mentah pengguna
        try: # Blok pengujian konversi tipe data float
            val = float(raw) # Konversi string mentah menjadi float
            if val < 0: # Validasi agar angka desimal tidak bernilai negatif
                print("[Error] Nilai tidak boleh negatif! Masukkan nominal yang valid.") # Cetak pemberitahuan angka negatif
            else: # Jika input angka riil sudah valid
                return val # Mengembalikan nilai desimal
        except ValueError: # Menangkap exception kegagalan kasting tipe float
            print(f"[Error] Input harus berupa angka desimal/riil! '{raw}' tidak valid.") # Pesan format masukan tidak sesuai

# Fungsi pencarian berdasarkan Getter ID
def cari_index_studio(daftar_studio, id_target): # Fungsi mencari posisi indeks elemen studio berdasar ID
    for i, st in enumerate(daftar_studio): # Melakukan iterasi beserta indeks terhadap daftar studio
        if st.get_id_studio().lower() == id_target.lower(): # Pencarian ID tanpa membedakan kapitalisasi karakter
            return i # Mengembalikan posisi indeks jika ID cocok
    return -1 # Mengembalikan -1 jika ID tidak ditemukan dalam daftar

# Tampilan tabel dengan akses data via Getter
def tampilkan_tabel(list_studio): # Fungsi untuk memformat dan menampilkan tabel studio
    if not list_studio: # Pengecekan jika daftar studio tidak berisi data
        print("Belum ada data studio.") # Mencetak pemberitahuan data kosong
        return # Keluar dari fungsi

    headers = ["ID", "Nama Studio", "Kapasitas", "Tipe Layar", "Harga Sewa", "Lantai", "Sistem Suara", "Proyektor", "Path Gambar"] # Daftar judul kolom tabel
    lebar = [len(h) for h in headers] # Menghitung lebar awal setiap kolom berdasarkan judulnya

    for st in list_studio: # Iterasi seluruh objek studio untuk kalkulasi penyesuaian lebar kolom
        lebar[0] = max(lebar[0], len(st.get_id_studio())) # Penyesuaian lebar kolom ID
        lebar[1] = max(lebar[1], len(st.get_nama_studio())) # Penyesuaian lebar kolom Nama Studio
        lebar[2] = max(lebar[2], len(str(st.get_kapasitas_kursi()))) # Penyesuaian lebar kolom Kapasitas
        lebar[3] = max(lebar[3], len(st.get_tipe_layar())) # Penyesuaian lebar kolom Tipe Layar
        lebar[4] = max(lebar[4], len(f"{st.get_harga_sewa():.0f}")) # Penyesuaian lebar kolom Harga Sewa
        lebar[5] = max(lebar[5], len(str(st.get_lokasi_lantai()))) # Penyesuaian lebar kolom Lokasi Lantai
        lebar[6] = max(lebar[6], len(st.get_sistem_suara())) # Penyesuaian lebar kolom Sistem Suara
        lebar[7] = max(lebar[7], len(st.get_proyektor())) # Penyesuaian lebar kolom Proyektor
        lebar[8] = max(lebar[8], len(st.get_gambar())) # Penyesuaian lebar kolom Path Gambar

    garis = "+" + "+".join(["-" * (l + 2) for l in lebar]) + "+" # Membuat struktur garis pembatas horizontal

    print(garis) # Mencetak garis pembatas atas tabel
    header_str = "|" + "|".join([f" {headers[i]:<{lebar[i]}} " for i in range(len(headers))]) + "|" # Menyusun baris teks header tabel
    print(header_str) # Mencetak teks baris header
    print(garis) # Mencetak garis pemisah antara header dan isi tabel

    for st in list_studio: # Iterasi cetak data setiap objek studio
        row = f"| {st.get_id_studio():<{lebar[0]}} | {st.get_nama_studio():<{lebar[1]}} | {st.get_kapasitas_kursi():<{lebar[2]}} | {st.get_tipe_layar():<{lebar[3]}} | {st.get_harga_sewa():<{lebar[4]}.0f} | {st.get_lokasi_lantai():<{lebar[5]}} | {st.get_sistem_suara():<{lebar[6]}} | {st.get_proyektor():<{lebar[7]}} | {st.get_gambar():<{lebar[8]}} |" # Format baris data yang Rata Kiri
        print(row) # Mencetak baris data studio
    print(garis) # Mencetak garis pembatas bawah tabel

def main(): # Fungsi utama eksekusi program
    # Data dummy awal
    daftar_studio = [ # Inisialisasi daftar array bertipe objek Studio
        Studio("STD-01", "Studio 1 Ultra", 150, "IMAX 3D", 5000000, 3, "Dolby Atmos 7.1", "Laser 4K", "assets/studio1.png") # Objek studio awal
    ]

    pilihan = 0 # Inisialisasi pilihan menu awal
    while pilihan != 6: # Perulangan menu utama sampai pengguna memilih keluar (angka 6)
        print("\n=== SYSTEM MANAGEMENT STUDIO BIOSKOP (PYTHON) ===") # Cetak judul sistem
        print("1. Tambah Data Studio") # Opsi menu 1
        print("2. Tampilkan Semua Studio") # Opsi menu 2
        print("3. Cari Data Studio") # Opsi menu 3
        print("4. Update Data Studio") # Opsi menu 4
        print("5. Hapus Data Studio") # Opsi menu 5
        print("6. Keluar") # Opsi menu 6

        pilihan = input_int("Pilih menu (1-6): ") # Menerima dan memvalidasi pilihan angka menu

        if pilihan == 1: # Eksekusi alur tambah data
            print("\n--- TAMBAH DATA STUDIO ---") # Cetak sub-header tambah data
            while True: # Perulangan validasi keunikan ID
                id_studio = input_string("ID Studio       : ") # Input ID Studio
                if cari_index_studio(daftar_studio, id_studio) != -1: # Periksa apakah ID telah terdaftar sebelumnya
                    print(f"[Error] ID Studio '{id_studio}' sudah ada! Masukkan ID lain.") # Tampilkan pesan error jika duplikat
                else: # Jika ID unik
                    break # Keluar dari loop validasi ID

            nama = input_string("Nama Studio     : ") # Input nama studio
            kapasitas = input_int("Kapasitas Kursi : ") # Input kapasitas kursi
            layar = input_string("Tipe Layar      : ") # Input jenis tipe layar
            harga = input_float("Harga Sewa      : ") # Input harga sewa
            lantai = input_int("Lokasi Lantai   : ") # Input lokasi lantai
            suara = input_string("Sistem Suara    : ") # Input sistem suara
            proyektor = input_string("Proyektor       : ") # Input jenis proyektor
            gambar = input_string("Path Gambar     : ") # Input lokasi berkas gambar

            # Instansiasi objek baru
            st_baru = Studio(id_studio, nama, kapasitas, layar, harga, lantai, suara, proyektor, gambar) # Membuat objek Studio baru
            daftar_studio.append(st_baru) # Menambahkan objek ke dalam list
            print("[+] Data Studio berhasil ditambahkan!") # Pesan konfirmasi keberhasilan

        elif pilihan == 2: # Eksekusi alur penampil data
            print("\n--- DAFTAR SELURUH STUDIO ---") # Cetak sub-header tampilkan data
            tampilkan_tabel(daftar_studio) # Memanggil fungsi penampil tabel

        elif pilihan == 3: # Eksekusi alur pencarian data
            print("\n--- CARI DATA STUDIO ---") # Cetak sub-header cari data
            id_studio = input_string("Masukkan ID Studio: ") # Input ID sasaran pencarian
            idx = cari_index_studio(daftar_studio, id_studio) # Mencari posisi indeks data
            if idx != -1: # Jika data ditemukan
                print("[+] Data Ditemukan:") # Pesan informasi sukses cari
                tampilkan_tabel([daftar_studio[idx]]) # Menampilkan data studio terpilih
            else: # Jika tidak ditemukan
                print(f"[Error] Data dengan ID '{id_studio}' tidak ditemukan!") # Pesan pemberitahuan data tidak ada

        elif pilihan == 4: # Eksekusi alur pembaruan data
            print("\n--- UPDATE DATA STUDIO ---") # Cetak sub-header ubah data
            id_studio = input_string("Masukkan ID Studio yang ingin diubah: ") # Input ID sasaran ubah
            idx = cari_index_studio(daftar_studio, id_studio) # Menentukan lokasi indeks
            if idx != -1: # Jika ID ditemukan
                print("\nMasukkan Data Baru:") # Instruksi input data pembaruan
                st = daftar_studio[idx] # Mengambil objek dari daftar
                st.set_nama_studio(input_string("Nama Studio     : ")) # Memperbarui nama studio via setter
                st.set_kapasitas_kursi(input_int("Kapasitas Kursi : ")) # Memperbarui kapasitas via setter
                st.set_tipe_layar(input_string("Tipe Layar      : ")) # Memperbarui tipe layar via setter
                st.set_harga_sewa(input_float("Harga Sewa      : ")) # Memperbarui harga sewa via setter
                st.set_lokasi_lantai(input_int("Lokasi Lantai   : ")) # Memperbarui lantai via setter
                st.set_sistem_suara(input_string("Sistem Suara    : ")) # Memperbarui sistem suara via setter
                st.set_proyektor(input_string("Proyektor       : ")) # Memperbarui proyektor via setter
                st.set_gambar(input_string("Path Gambar     : ")) # Memperbarui gambar via setter
                print("[+] Data Studio berhasil diperbarui!") # Pesan konfirmasi pembaruan sukses
            else: # Jika ID tidak ada
                print(f"[Error] Data dengan ID '{id_studio}' tidak ditemukan!") # Pesan kegagalan ubah data

        elif pilihan == 5: # Eksekusi alur penghapusan data
            print("\n--- HAPUS DATA STUDIO ---") # Cetak sub-header hapus data
            id_studio = input_string("Masukkan ID Studio yang ingin dihapus: ") # Input ID sasaran hapus
            idx = cari_index_studio(daftar_studio, id_studio) # Mengambil indeks elemen
            if idx != -1: # Jika ID ditemukan
                daftar_studio.pop(idx) # Menghapus elemen objek dari list berdasarkan indeks
                print("[+] Data Studio berhasil dihapus!") # Pesan informasi sukses hapus
            else: # Jika ID tidak ditemukan
                print(f"[Error] Data dengan ID '{id_studio}' tidak ditemukan!") # Pesan gagal hapus data

        elif pilihan == 6: # Eksekusi alur keluar program
            print("Terima kasih, program selesai.") # Cetak salam penutup program
        else: # Penanganan masukan angka pilihan diluar rentang menu
            print("[Error] Pilihan menu tidak valid! Harap masukkan angka 1-6.") # Pesan kesalahan menu tidak valid

if __name__ == "__main__": # Memeriksa jika skrip dijalankan secara langsung
    main() # Memanggil fungsi utama main()