// Saya Moch Fadillah Pratama dengan NIM 2506968 mengerjakan Tugas Praktikum 1 dalam mata kuliah Desain dan Pemrograman Berbasis Objek untuk keberkahan-Nya maka saya tidak melakukan kecurangan seperti yang telah dispesifikasikan. Aamiin.

import java.util.*; // Mengimpor seluruh utility library Java seperti Scanner, List, ArrayList, dan Collections

public class Main { // Deklarasi kelas utama bernama Main
    private static final Scanner scanner = new Scanner(System.in); // Deklarasi objek Scanner statis untuk membaca input dari konsol

    private static String inputString(String prompt) { // Metode privat untuk validasi input berupa string/teks
        while (true) { // Perulangan tak terbatas sampai input valid dimasukkan
            System.out.print(prompt); // Menampilkan pesan petunjuk ke konsol
            String input = scanner.nextLine().trim(); // Membaca baris teks dan menghapus spasi di awal/akhir
            if (input.isEmpty()) { // Memeriksa apakah teks yang diinputkan kosong
                System.out.println("[Error] Input tidak boleh kosong! Silakan masukkan teks yang valid."); // Menampilkan pesan kesalahan
            } else { // Jika input tidak kosong
                return input; // Mengembalikan string yang valid dan keluar dari metode
            } // Penutup blok if-else
        } // Penutup perulangan while
    } // Penutup metode inputString

    private static int inputInt(String prompt) { // Metode privat untuk validasi input berupa bilangan bulat (int)
        while (true) { // Perulangan tak terbatas hingga input angka integer valid
            System.out.print(prompt); // Menampilkan pesan petunjuk ke konsol
            String raw = scanner.nextLine().trim(); // Membaca teks mentah dari input pengguna
            try { // Blok try untuk menangkap potensi exception parsing angka
                int val = Integer.parseInt(raw); // Mengonversi teks menjadi tipe data integer
                if (val < 0) { // Memeriksa jika angka yang dimasukkan bernilai negatif
                    System.out.println("[Error] Nilai tidak boleh kurang dari 0 (negatif)! Masukkan angka 0 atau lebih."); // Menampilkan error nilai negatif
                } else { // Jika nilai non-negatif valid
                    return val; // Mengembalikan nilai integer yang valid
                } // Penutup kondisi nilai negatif
            } catch (NumberFormatException e) { // Menangkap error jika teks gagal dikonversi ke integer
                System.out.println("[Error] Input harus berupa angka bulat! Huruf/karakter '" + raw + "' tidak diperbolehkan."); // Menampilkan pesan error format
            } // Penutup blok try-catch
        } // Penutup perulangan while
    } // Penutup metode inputInt

    private static double inputDouble(String prompt) { // Metode privat untuk validasi input berupa bilangan desimal (double)
        while (true) { // Perulangan tak terbatas hingga input angka desimal valid
            System.out.print(prompt); // Menampilkan pesan petunjuk ke konsol
            String raw = scanner.nextLine().trim(); // Membaca teks mentah dari konsol
            try { // Blok try untuk konversi ke double
                double val = Double.parseDouble(raw); // Mengonversi teks mentah menjadi nilai double
                if (val < 0) { // Memeriksa apakah nilai kurang dari nol
                    System.out.println("[Error] Harga tidak boleh kurang dari 0 (negatif)! Masukkan nominal yang valid."); // Menampilkan error harga negatif
                } else { // Jika nilai desimal valid
                    return val; // Mengembalikan nilai double yang valid
                } // Penutup kondisi batas nilai desimal
            } catch (NumberFormatException e) { // Menangkap exception kegagalan parse angka desimal
                System.out.println("[Error] Input harus berupa angka desimal/riil! Huruf/karakter '" + raw + "' tidak diperbolehkan."); // Menampilkan pesan error format desimal
            } // Penutup blok try-catch
        } // Penutup perulangan while
    } // Penutup metode inputDouble

    private static int cariIndexStudio(List<Studio> list, String id) { // Metode pencarian indeks elemen Studio berdasarkan ID
        for (int i = 0; i < list.size(); i++) { // Iterasi dari indeks 0 sampai panjang list
            if (list.get(i).getIdStudio().equalsIgnoreCase(id)) return i; // Membandingkan ID tanpa membedakan huruf besar/kecil dan mengembalikan indeks jika cocok
        } // Penutup perulangan for
        return -1; // Mengembalikan -1 jika objek Studio tidak ditemukan
    } // Penutup metode cariIndexStudio

    private static void tampilkanTabel(List<Studio> list) { // Metode untuk menampilkan daftar studio dalam bentuk format tabel
        if (list.isEmpty()) { // Memeriksa jika list data studio dalam kondisi kosong
            System.out.println("Belum ada data studio."); // Menampilkan pesan bahwa tidak ada data
            return; // Menghentikan eksekusi metode
        } // Penutup penanganan list kosong

        String[] headers = {"ID", "Nama Studio", "Kapasitas", "Tipe Layar", "Harga Sewa", "Lantai", "Sistem Suara", "Proyektor", "Path Gambar"}; // Menginisialisasi nama-nama header kolom
        int[] lebar = new int[headers.length]; // Membuat array integer penampung lebar masing-masing kolom
        for (int i = 0; i < headers.length; i++) lebar[i] = headers[i].length(); // Menentukan lebar awal berdasarkan panjang teks header

        for (Studio st : list) { // Iterasi setiap objek Studio untuk menghitung panjang data terpanjang pada tiap kolom
            lebar[0] = Math.max(lebar[0], st.getIdStudio().length()); // Mengukur lebar maksimum kolom ID
            lebar[1] = Math.max(lebar[1], st.getNamaStudio().length()); // Mengukur lebar maksimum kolom Nama Studio
            lebar[2] = Math.max(lebar[2], String.valueOf(st.getKapasitasKursi()).length()); // Mengukur lebar maksimum kolom Kapasitas Kursi
            lebar[3] = Math.max(lebar[3], st.getTipeLayar().length()); // Mengukur lebar maksimum kolom Tipe Layar
            lebar[4] = Math.max(lebar[4], String.format("%.0f", st.getHargaSewa()).length()); // Mengukur lebar maksimum kolom Harga Sewa
            lebar[5] = Math.max(lebar[5], String.valueOf(st.getLokasiLantai()).length()); // Mengukur lebar maksimum kolom Lokasi Lantai
            lebar[6] = Math.max(lebar[6], st.getSistemSuara().length()); // Mengukur lebar maksimum kolom Sistem Suara
            lebar[7] = Math.max(lebar[7], st.getProyektor().length()); // Mengukur lebar maksimum kolom Proyektor
            lebar[8] = Math.max(lebar[8], st.getGambar().length()); // Mengukur lebar maksimum kolom Path Gambar
        } // Penutup iterasi kalkulasi lebar kolom

        StringBuilder garis = new StringBuilder("+"); // Inisialisasi StringBuilder untuk konstruksi garis pembatas
        for (int l : lebar) garis.append("-".repeat(l + 2)).append("+"); // Membuat garis pembatas horizontal sesuai lebar kolom

        System.out.println(garis); // Mencetak garis pembatas paling atas
        System.out.print("|"); // Mencetak karakter pembuka awal baris header
        for (int i = 0; i < headers.length; i++) { // Iterasi untuk mencetak teks setiap judul header
            System.out.printf(" %-" + lebar[i] + "s |", headers[i]); // Mencetak nama header dengan format perataan kiri
        } // Penutup loop cetak header
        System.out.println("\n" + garis); // Mencetak garis pembatas bawah header

        for (Studio st : list) { // Iterasi untuk mencetak isi baris data setiap objek Studio
            System.out.printf("| %-" + lebar[0] + "s | %-" + lebar[1] + "s | %-" + lebar[2] + "d | %-" + lebar[3] + "s | %-" + lebar[4] + ".0f | %-" + lebar[5] + "d | %-" + lebar[6] + "s | %-" + lebar[7] + "s | %-" + lebar[8] + "s |\n", // Menformat dan mencetak seluruh nilai atribut secara sejajar
                    st.getIdStudio(), st.getNamaStudio(), st.getKapasitasKursi(), st.getTipeLayar(), // Argumen data ID, Nama, Kapasitas, dan Tipe Layar
                    st.getHargaSewa(), st.getLokasiLantai(), st.getSistemSuara(), st.getProyektor(), st.getGambar()); // Argumen data Harga, Lantai, Suara, Proyektor, dan Gambar
        } // Penutup loop cetak data
        System.out.println(garis); // Mencetak garis pembatas paling bawah tabel
    } // Penutup metode tampilkanTabel

    public static void main(String[] args) { // Metode utama titik awal eksekusi program Java
        List<Studio> daftarStudio = new ArrayList<>(); // Membuat instance ArrayList penampung objek Studio
        daftarStudio.add(new Studio("STD-01", "Studio 1 Ultra", 150, "IMAX 3D", 5000000, 3, "Dolby Atmos 7.1", "Laser 4K", "assets/studio1.png")); // Menambahkan data awal dummy ke dalam list

        int pilihan = 0; // Deklarasi variabel penampung nomor menu
        do { // Perulangan do-while untuk menampilkan menu berulang kali
            System.out.println("\n=== SYSTEM MANAGEMENT STUDIO BIOSKOP (JAVA) ==="); // Cetak judul program
            System.out.println("1. Tambah Data Studio"); // Cetak opsi menu 1
            System.out.println("2. Tampilkan Semua Studio"); // Cetak opsi menu 2
            System.out.println("3. Cari Data Studio"); // Cetak opsi menu 3
            System.out.println("4. Update Data Studio"); // Cetak opsi menu 4
            System.out.println("5. Hapus Data Studio"); // Cetak opsi menu 5
            System.out.println("6. Keluar"); // Cetak opsi menu 6

            pilihan = inputInt("Pilih menu (1-6): "); // Mengambil opsi menu yang diinput pengguna

            if (pilihan == 1) { // Jika pengguna memilih menu 1 (Tambah Data)
                System.out.println("\n--- TAMBAH DATA STUDIO ---"); // Cetak sub-header tambah data
                String id; // Deklarasi variabel penampung ID
                while (true) { // Loop validasi ketersediaan ID unik
                    id = inputString("ID Studio       : "); // Meminta input ID Studio
                    if (cariIndexStudio(daftarStudio, id) != -1) { // Cek jika ID sudah terdaftar pada list
                        System.out.println("[Error] ID Studio '" + id + "' sudah ada! Masukkan ID lain."); // Menampilkan error ID duplikat
                    } else { // Jika ID belum digunakan
                        break; // Keluar dari loop validasi ID
                    } // Penutup cek ID duplikat
                } // Penutup loop ID
                String nama = inputString("Nama Studio     : "); // Meminta input Nama Studio
                int kapasitas = inputInt("Kapasitas Kursi : "); // Meminta input Kapasitas Kursi
                String layar = inputString("Tipe Layar      : "); // Meminta input Tipe Layar
                double harga = inputDouble("Harga Sewa      : "); // Meminta input Harga Sewa
                int lantai = inputInt("Lokasi Lantai   : "); // Meminta input Lokasi Lantai
                String suara = inputString("Sistem Suara    : "); // Meminta input Sistem Suara
                String proyektor = inputString("Proyektor       : "); // Meminta input Proyektor
                String gambar = inputString("Path Gambar     : "); // Meminta input Path Gambar

                daftarStudio.add(new Studio(id, nama, kapasitas, layar, harga, lantai, suara, proyektor, gambar)); // Menambahkan instance Studio baru ke dalam ArrayList
                System.out.println("[+] Data Studio berhasil ditambahkan!"); // Menampilkan pesan sukses tambah data

            } else if (pilihan == 2) { // Jika pengguna memilih menu 2 (Tampilkan Semua Data)
                System.out.println("\n--- DAFTAR SELURUH STUDIO ---"); // Cetak sub-header tampilkan data
                tampilkanTabel(daftarStudio); // Memanggil metode tampilkanTabel untuk mencetak daftar studio

            } else if (pilihan == 3) { // Jika pengguna memilih menu 3 (Cari Data)
                System.out.println("\n--- CARI DATA STUDIO ---"); // Cetak sub-header pencarian data
                String id = inputString("Masukkan ID Studio: "); // Meminta masukan ID yang ingin dicari
                int idx = cariIndexStudio(daftarStudio, id); // Mencari indeks elemen berdasarkan ID
                if (idx != -1) { // Jika elemen ditemukan
                    System.out.println("[+] Data Ditemukan:"); // Menampilkan pemberitahuan data ditemukan
                    tampilkanTabel(Collections.singletonList(daftarStudio.get(idx))); // Tampilkan hanya data studio yang ditemukan
                } else { // Jika data tidak ditemukan
                    System.out.println("[Error] Data dengan ID '" + id + "' tidak ditemukan!"); // Menampilkan pesan error tidak ditemukan
                } // Penutup kondisi pencarian

            } else if (pilihan == 4) { // Jika pengguna memilih menu 4 (Update Data)
                System.out.println("\n--- UPDATE DATA STUDIO ---"); // Cetak sub-header perbarui data
                String id = inputString("Masukkan ID Studio yang ingin diubah: "); // Meminta ID studio yang akan diperbarui
                int idx = cariIndexStudio(daftarStudio, id); // Mencari indeks elemen
                if (idx != -1) { // Jika studio ditemukan
                    System.out.println("\nMasukkan Data Baru:"); // Menampilkan instruksi data baru
                    Studio st = daftarStudio.get(idx); // Mengambil referensi objek Studio dari list
                    st.setNamaStudio(inputString("Nama Studio     : ")); // Memperbarui nama studio
                    st.setKapasitasKursi(inputInt("Kapasitas Kursi : ")); // Memperbarui kapasitas kursi
                    st.setTipeLayar(inputString("Tipe Layar      : ")); // Memperbarui tipe layar
                    st.setHargaSewa(inputDouble("Harga Sewa      : ")); // Memperbarui harga sewa
                    st.setLokasiLantai(inputInt("Lokasi Lantai   : ")); // Memperbarui lokasi lantai
                    st.setSistemSuara(inputString("Sistem Suara    : ")); // Memperbarui sistem suara
                    st.setProyektor(inputString("Proyektor       : ")); // Memperbarui jenis proyektor
                    st.setGambar(inputString("Path Gambar     : ")); // Memperbarui path gambar
                    System.out.println("[+] Data Studio berhasil diperbarui!"); // Menampilkan pesan sukses update
                } else { // Jika data studio tidak ditemukan
                    System.out.println("[Error] Data dengan ID '" + id + "' tidak ditemukan!"); // Menampilkan pesan error
                } // Penutup kondisi update

            } else if (pilihan == 5) { // Jika pengguna memilih menu 5 (Hapus Data)
                System.out.println("\n--- HAPUS DATA STUDIO ---"); // Cetak sub-header hapus data
                String id = inputString("Masukkan ID Studio yang ingin dihapus: "); // Meminta ID studio yang akan dihapus
                int idx = cariIndexStudio(daftarStudio, id); // Mencari indeks studio dalam list
                if (idx != -1) { // Jika data ditemukan
                    daftarStudio.remove(idx); // Menghapus objek studio dari ArrayList berdasarkan indeks
                    System.out.println("[+] Data Studio berhasil dihapus!"); // Menampilkan pesan sukses hapus
                } else { // Jika ID tidak ditemukan
                    System.out.println("[Error] Data dengan ID '" + id + "' tidak ditemukan!"); // Menampilkan pesan error
                } // Penutup kondisi penghapusan

            } else if (pilihan == 6) { // Jika pengguna memilih menu 6 (Keluar)
                System.out.println("Terima kasih, program selesai."); // Pesan penutup program
            } else { // Jika angka pilihan menu di luar rentang 1-6
                System.out.println("[Error] Pilihan menu tidak valid! Harap masukkan angka 1-6."); // Menampilkan pesan pilihan tidak valid
            } // Penutup percabangan menu
        } while (pilihan != 6); // Perulangan berjalan terus selama pilihan bukan 6
    } // Penutup metode main
} // Penutup kelas Main