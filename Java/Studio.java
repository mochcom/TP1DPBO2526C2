// Saya Moch Fadillah Pratama dengan NIM 2506968 mengerjakan Tugas Praktikum 1 dalam mata kuliah Desain dan Pemrograman Berbasis Objek untuk keberkahan-Nya maka saya tidak melakukan kecurangan seperti yang telah dispesifikasikan. Aamiin.

public class Studio { // Deklarasi kelas publik Studio
    private String idStudio; // Variabel privat penampung ID Studio
    private String namaStudio; // Variabel privat penampung Nama Studio
    private int kapasitasKursi; // Variabel privat penampung Kapasitas Kursi
    private String tipeLayar; // Variabel privat penampung Tipe Layar
    private double hargaSewa; // Variabel privat penampung Harga Sewa
    private int lokasiLantai; // Variabel privat penampung Lokasi Lantai
    private String sistemSuara; // Variabel privat penampung Sistem Suara
    private String proyektor; // Variabel privat penampung jenis Proyektor
    private String gambar; // Variabel privat penampung Path Gambar

    public Studio(String id, String nama, int kapasitas, String layar, double harga, int lantai, String suara, String proyektor, String gambar) { // Konstruktor berparameter untuk inisialisasi objek Studio
        this.idStudio = id; // Mengisi variabel idStudio dengan argumen id
        this.namaStudio = nama; // Mengisi variabel namaStudio dengan argumen nama
        this.kapasitasKursi = kapasitas; // Mengisi variabel kapasitasKursi dengan argumen kapasitas
        this.tipeLayar = layar; // Mengisi variabel tipeLayar dengan argumen layar
        this.hargaSewa = harga; // Mengisi variabel hargaSewa dengan argumen harga
        this.lokasiLantai = lantai; // Mengisi variabel lokasiLantai dengan argumen lantai
        this.sistemSuara = suara; // Mengisi variabel sistemSuara dengan argumen suara
        this.proyektor = proyektor; // Mengisi variabel proyektor dengan argumen proyektor
        this.gambar = gambar; // Mengisi variabel gambar dengan argumen gambar
    } // Penutup konstruktor

    // Getters
    public String getIdStudio() { return idStudio; } // Getter untuk mengambil nilai idStudio
    public String getNamaStudio() { return namaStudio; } // Getter untuk mengambil nilai namaStudio
    public int getKapasitasKursi() { return kapasitasKursi; } // Getter untuk mengambil nilai kapasitasKursi
    public String getTipeLayar() { return tipeLayar; } // Getter untuk mengambil nilai tipeLayar
    public double getHargaSewa() { return hargaSewa; } // Getter untuk mengambil nilai hargaSewa
    public int getLokasiLantai() { return lokasiLantai; } // Getter untuk mengambil nilai lokasiLantai
    public String getSistemSuara() { return sistemSuara; } // Getter untuk mengambil nilai sistemSuara
    public String getProyektor() { return proyektor; } // Getter untuk mengambil nilai proyektor
    public String getGambar() { return gambar; } // Getter untuk mengambil nilai path gambar

    // Setters
    public void setIdStudio(String id) { this.idStudio = id; } // Setter untuk mengubah nilai idStudio
    public void setNamaStudio(String nama) { this.namaStudio = nama; } // Setter untuk mengubah nilai namaStudio
    public void setKapasitasKursi(int kapasitas) { this.kapasitasKursi = kapasitas; } // Setter untuk mengubah nilai kapasitasKursi
    public void setTipeLayar(String layar) { this.tipeLayar = layar; } // Setter untuk mengubah nilai tipeLayar
    public void setHargaSewa(double harga) { this.hargaSewa = harga; } // Setter untuk mengubah nilai hargaSewa
    public void setLokasiLantai(int lantai) { this.lokasiLantai = lantai; } // Setter untuk mengubah nilai lokasiLantai
    public void setSistemSuara(String suara) { this.sistemSuara = suara; } // Setter untuk mengubah nilai sistemSuara
    public void setProyektor(String p) { this.proyektor = p; } // Setter untuk mengubah nilai proyektor
    public void setGambar(String g) { this.gambar = g; } // Setter untuk mengubah nilai path gambar
} // Penutup kelas Studio