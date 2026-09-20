// Saya Moch Fadillah Pratama dengan NIM 2506968 mengerjakan Tugas Praktikum 1 dalam mata kuliah Desain dan Pemrograman Berbasis Objek untuk keberkahan-Nya maka saya tidak melakukan kecurangan seperti yang telah dispesifikasikan. Aamiin.

#include <iostream> // Mengimpor library standar input/output
#include <string>   // Mengimpor library untuk pengolahan string

using namespace std; // Menggunakan namespace standar

class Studio { // Deklarasi class Studio
private: // Akses modifier private agar variabel hanya bisa diakses dari dalam class
    string idStudio;      // Deklarasi atribut idStudio
    string namaStudio;    // Deklarasi atribut namaStudio
    int kapasitasKursi;   // Deklarasi atribut kapasitasKursi
    string tipeLayar;     // Deklarasi atribut tipeLayar
    double hargaSewa;     // Deklarasi atribut hargaSewa
    int lokasiLantai;     // Deklarasi atribut lokasiLantai
    string sistemSuara;   // Deklarasi atribut sistemSuara
    string proyektor;     // Deklarasi atribut proyektor
    string gambar;        // Deklarasi atribut gambar

public: // Akses modifier public agar method dapat diakses dari luar class
    // Constructor Kosong
    Studio() : kapasitasKursi(0), hargaSewa(0.0), lokasiLantai(0) {} // Constructor default dengan initializer list nilai awal

    // Constructor Berparameter
    Studio(string id, string nama, int kapasitas, string layar, double harga, int lantai, string suara, string proyektor, string gambar) { // Constructor dengan nilai awal berparameter
        this->idStudio = id;        // Mengisi idStudio dengan nilai parameter id
        this->namaStudio = nama;    // Mengisi namaStudio dengan nilai parameter nama
        this->kapasitasKursi = kapasitas; // Mengisi kapasitasKursi dengan nilai parameter kapasitas
        this->tipeLayar = layar;    // Mengisi tipeLayar dengan nilai parameter layar
        this->hargaSewa = harga;    // Mengisi hargaSewa dengan nilai parameter harga
        this->lokasiLantai = lantai; // Mengisi lokasiLantai dengan nilai parameter lantai
        this->sistemSuara = suara;  // Mengisi sistemSuara dengan nilai parameter suara
        this->proyektor = proyektor; // Mengisi proyektor dengan nilai parameter proyektor
        this->gambar = gambar;      // Mengisi gambar dengan nilai parameter gambar
    } // Penutup constructor berparameter

    // Getters
    string getIdStudio() const { return idStudio; }           // Method getter untuk mengembalikan idStudio
    string getNamaStudio() const { return namaStudio; }       // Method getter untuk mengembalikan namaStudio
    int getKapasitasKursi() const { return kapasitasKursi; }  // Method getter untuk mengembalikan kapasitasKursi
    string getTipeLayar() const { return tipeLayar; }         // Method getter untuk mengembalikan tipeLayar
    double getHargaSewa() const { return hargaSewa; }         // Method getter untuk mengembalikan hargaSewa
    int getLokasiLantai() const { return lokasiLantai; }     // Method getter untuk mengembalikan lokasiLantai
    string getSistemSuara() const { return sistemSuara; }     // Method getter untuk mengembalikan sistemSuara
    string getProyektor() const { return proyektor; }         // Method getter untuk mengembalikan proyektor
    string getGambar() const { return gambar; }               // Method getter untuk mengembalikan path gambar

    // Setters
    void setIdStudio(string id) { idStudio = id; }            // Method setter untuk mengubah idStudio
    void setNamaStudio(string nama) { namaStudio = nama; }    // Method setter untuk mengubah namaStudio
    void setKapasitasKursi(int kapasitas) { kapasitasKursi = kapasitas; } // Method setter untuk mengubah kapasitasKursi
    void setTipeLayar(string layar) { tipeLayar = layar; }    // Method setter untuk mengubah tipeLayar
    void setHargaSewa(double harga) { hargaSewa = harga; }    // Method setter untuk mengubah hargaSewa
    void setLokasiLantai(int lantai) { lokasiLantai = lantai; } // Method setter untuk mengubah lokasiLantai
    void setSistemSuara(string suara) { sistemSuara = suara; } // Method setter untuk mengubah sistemSuara
    void setProyektor(string p) { proyektor = p; }            // Method setter untuk mengubah proyektor
    void setGambar(string g) { gambar = g; }                  // Method setter untuk mengubah path gambar
}; // Penutup definisi class Studio