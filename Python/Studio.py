# Saya Moch Fadillah Pratama dengan NIM 2506968 mengerjakan Tugas Praktikum 1 dalam mata kuliah Desain dan Pemrograman Berbasis Objek untuk keberkahan-Nya maka saya tidak melakukan kecurangan seperti yang telah dispesifikasikan. Aamiin.

class Studio: # Definisi kelas Studio
    def __init__(self, id_studio="", nama="", kapasitas=0, layar="", harga=0.0, lantai=0, suara="", proyektor="", gambar=""): # Konstruktor kelas dengan nilai default
        # Private attributes (Enkapsulasi)
        self.__id_studio = id_studio # Atribut privat id_studio
        self.__nama_studio = nama # Atribut privat nama_studio
        self.__kapasitas_kursi = kapasitas # Atribut privat kapasitas_kursi
        self.__tipe_layar = layar # Atribut privat tipe_layar
        self.__harga_sewa = harga # Atribut privat harga_sewa
        self.__lokasi_lantai = lantai # Atribut privat lokasi_lantai
        self.__sistem_suara = suara # Atribut privat sistem_suara
        self.__proyektor = proyektor # Atribut privat proyektor
        self.__gambar = gambar # Atribut privat gambar

    # --- GETTER ---
    def get_id_studio(self): # Method getter untuk membaca __id_studio
        return self.__id_studio # Mengembalikan nilai __id_studio

    def get_nama_studio(self): # Method getter untuk membaca __nama_studio
        return self.__nama_studio # Mengembalikan nilai __nama_studio

    def get_kapasitas_kursi(self): # Method getter untuk membaca __kapasitas_kursi
        return self.__kapasitas_kursi # Mengembalikan nilai __kapasitas_kursi

    def get_tipe_layar(self): # Method getter untuk membaca __tipe_layar
        return self.__tipe_layar # Mengembalikan nilai __tipe_layar

    def get_harga_sewa(self): # Method getter untuk membaca __harga_sewa
        return self.__harga_sewa # Mengembalikan nilai __harga_sewa

    def get_lokasi_lantai(self): # Method getter untuk membaca __lokasi_lantai
        return self.__lokasi_lantai # Mengembalikan nilai __lokasi_lantai

    def get_sistem_suara(self): # Method getter untuk membaca __sistem_suara
        return self.__sistem_suara # Mengembalikan nilai __sistem_suara

    def get_proyektor(self): # Method getter untuk membaca __proyektor
        return self.__proyektor # Mengembalikan nilai __proyektor

    def get_gambar(self): # Method getter untuk membaca __gambar
        return self.__gambar # Mengembalikan nilai __gambar

    # --- SETTER ---
    def set_id_studio(self, id_studio): # Method setter untuk mengubah __id_studio
        self.__id_studio = id_studio # Mengisi atribut privat __id_studio dengan nilai baru

    def set_nama_studio(self, nama): # Method setter untuk mengubah __nama_studio
        self.__nama_studio = nama # Mengisi atribut privat __nama_studio dengan nilai baru

    def set_kapasitas_kursi(self, kapasitas): # Method setter untuk mengubah __kapasitas_kursi
        self.__kapasitas_kursi = kapasitas # Mengisi atribut privat __kapasitas_kursi dengan nilai baru

    def set_tipe_layar(self, layar): # Method setter untuk mengubah __tipe_layar
        self.__tipe_layar = layar # Mengisi atribut privat __tipe_layar dengan nilai baru

    def set_harga_sewa(self, harga): # Method setter untuk mengubah __harga_sewa
        self.__harga_sewa = harga # Mengisi atribut privat __harga_sewa dengan nilai baru

    def set_lokasi_lantai(self, lantai): # Method setter untuk mengubah __lokasi_lantai
        self.__lokasi_lantai = lantai # Mengisi atribut privat __lokasi_lantai dengan nilai baru

    def set_sistem_suara(self, suara): # Method setter untuk mengubah __sistem_suara
        self.__sistem_suara = suara # Mengisi atribut privat __sistem_suara dengan nilai baru

    def set_proyektor(self, proyektor): # Method setter untuk mengubah __proyektor
        self.__proyektor = proyektor # Mengisi atribut privat __proyektor dengan nilai baru

    def set_gambar(self, gambar): # Method setter untuk mengubah __gambar
        self.__gambar = gambar # Mengisi atribut privat __gambar dengan nilai baru