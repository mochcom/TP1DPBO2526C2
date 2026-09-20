// Saya Moch Fadillah Pratama dengan NIM 2506968 mengerjakan Tugas Praktikum 1 dalam mata kuliah Desain dan Pemrograman Berbasis Objek untuk keberkahan-Nya maka saya tidak melakukan kecurangan seperti yang telah dispesifikasikan. Aamiin.

<?php
class Studio {
    private $idStudio;       // Atribut ID Studio (private)
    private $namaStudio;     // Atribut Nama Studio (private)
    private $kapasitasKursi; // Atribut Kapasitas Kursi (private)
    private $tipeLayar;      // Atribut Tipe Layar (private)
    private $hargaSewa;      // Atribut Harga Sewa (private)
    private $lokasiLantai;   // Atribut Lokasi Lantai (private)
    private $sistemSuara;    // Atribut Sistem Suara (private)
    private $proyektor;      // Atribut Tipe Proyektor (private)
    private $gambar;         // Atribut Path Gambar (private)

    /**
     * Constructor untuk inisialisasi instance Objek Studio
     */
    public function __construct(
        $id = "", 
        $nama = "", 
        $kapasitas = 0, 
        $layar = "", 
        $harga = 0.0, 
        $lantai = 0, 
        $suara = "", 
        $proyektor = "", 
        $gambar = ""
    ) {
        $this->idStudio = $id; // Set ID awal
        $this->namaStudio = $nama; // Set nama studio awal
        $this->kapasitasKursi = (int)$kapasitas; // Casting ke integer
        $this->tipeLayar = $layar; // Set tipe layar awal
        $this->hargaSewa = (float)$harga; // Casting ke float
        $this->lokasiLantai = (int)$lantai; // Casting ke integer
        $this->sistemSuara = $suara; // Set sistem suara awal
        $this->proyektor = $proyektor; // Set tipe proyektor awal
        $this->gambar = $gambar; // Set path gambar awal
    }

    // --- Getter Methods ---
    public function getIdStudio() { return $this->idStudio; } // Ambil ID Studio
    public function getNamaStudio() { return $this->namaStudio; } // Ambil Nama Studio
    public function getKapasitasKursi() { return $this->kapasitasKursi; } // Ambil Kapasitas
    public function getTipeLayar() { return $this->tipeLayar; } // Ambil Tipe Layar
    public function getHargaSewa() { return $this->hargaSewa; } // Ambil Harga Sewa
    public function getLokasiLantai() { return $this->lokasiLantai; } // Ambil Lokasi Lantai
    public function getSistemSuara() { return $this->sistemSuara; } // Ambil Sistem Suara
    public function getProyektor() { return $this->proyektor; } // Ambil Tipe Proyektor
    public function getGambar() { return $this->gambar; } // Ambil Path Gambar

    // --- Setter Methods ---
    public function setIdStudio($id) { $this->idStudio = $id; } // Ubah ID Studio
    public function setNamaStudio($nama) { $this->namaStudio = $nama; } // Ubah Nama Studio
    public function setKapasitasKursi($kapasitas) { $this->kapasitasKursi = (int)$kapasitas; } // Ubah Kapasitas
    public function setTipeLayar($layar) { $this->tipeLayar = $layar; } // Ubah Tipe Layar
    public function setHargaSewa($harga) { $this->hargaSewa = (float)$harga; } // Ubah Harga Sewa
    public function setLokasiLantai($lantai) { $this->lokasiLantai = (int)$lantai; } // Ubah Lokasi Lantai
    public function setSistemSuara($suara) { $this->sistemSuara = $suara; } // Ubah Sistem Suara
    public function setProyektor($p) { $this->proyektor = $p; } // Ubah Tipe Proyektor
    public function setGambar($g) { $this->gambar = $g; } // Ubah Path Gambar
}