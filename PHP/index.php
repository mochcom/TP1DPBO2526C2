// Saya Moch Fadillah Pratama dengan NIM 2506968 mengerjakan Tugas Praktikum 1 dalam mata kuliah Desain dan Pemrograman Berbasis Objek untuk keberkahan-Nya maka saya tidak melakukan kecurangan seperti yang telah dispesifikasikan. Aamiin.

<?php
session_start(); // Memulai/melanjutkan session PHP di server

require_once 'Studio.php'; // Mengimpor definisi class Studio

$uploadDir = 'uploads/'; // Path folder penyimpanan gambar upload
if (!is_dir($uploadDir)) {
    mkdir($uploadDir, 0777, true); // Buat folder uploads jika belum ada
}

if (!isset($_SESSION['daftar_studio']) || empty($_SESSION['daftar_studio'])) {
    $_SESSION['daftar_studio'] = [ // Inisialisasi data dummy awal ke dalam session
        serialize(new Studio("STD-01", "Studio 1 Ultra", 150, "IMAX 3D", 5000000, 3, "Dolby Atmos 7.1", "Laser 4K", "assets/images/studio1.jpg")), // Simpan objek 1 ter-serialize
        serialize(new Studio("STD-02", "Studio VIP Premiere", 50, "Dolby Vision", 7500000, 4, "DTS:X Ultra", "4K Xenon Dual", "assets/images/studio2.jpg"))  // Simpan objek 2 ter-serialize
    ];
}

$errorMsg = ""; // Penampung pesan error
$successMsg = ""; // Penampung pesan sukses
$activeTab = $_POST['active_tab'] ?? 'list'; // Menentukan tab aktif (default: 'list')

/**
 * Mengambil dan mengubah string serialize dari session kembali menjadi array Objek Studio
 */
function getDaftarStudio() {
    $list = []; // Array penampung hasil unserialize
    if (isset($_SESSION['daftar_studio'])) {
        foreach ($_SESSION['daftar_studio'] as $item) {
            $list[] = unserialize($item); // Re-instansiasi string menjadi objek Studio
        }
    }
    return $list; // Kembalikan array berisi daftar objek
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? ''; // Tangkap tipe aksi form POST

    if ($action === 'tambah' || $action === 'update') {
        $id = trim($_POST['id_studio'] ?? ''); // Ambil input ID Studio
        $nama = trim($_POST['nama_studio'] ?? ''); // Ambil input Nama Studio
        $kapasitas = (int)($_POST['kapasitas_kursi'] ?? 0); // Cast input Kapasitas ke integer
        $layar = trim($_POST['tipe_layar'] ?? ''); // Ambil input Tipe Layar
        $harga = (float)($_POST['harga_sewa'] ?? 0); // Cast input Harga ke float
        $lantai = (int)($_POST['lokasi_lantai'] ?? 0); // Cast input Lantai ke integer
        $suara = trim($_POST['sistem_suara'] ?? ''); // Ambil input Sistem Suara
        $proyektor = trim($_POST['proyektor'] ?? ''); // Ambil input Proyektor
        
        $gambarPath = trim($_POST['gambar_asset'] ?? 'assets/images/default.jpg'); // Ambill path aset gambar
        if (empty($gambarPath)) {
            $gambarPath = 'assets/images/default.jpg'; // Path fallback jika kosong
        }

        if (isset($_FILES['gambar_file']) && $_FILES['gambar_file']['error'] === UPLOAD_ERR_OK) { // Cek jika ada file gambar diunggah
            $fileTmpPath = $_FILES['gambar_file']['tmp_name']; // Path temporary file
            $fileName = $_FILES['gambar_file']['name']; // Nama asli file
            $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION)); // Ambil ekstensi file
            
            $allowedExtensions = ['jpg', 'jpeg', 'png', 'webp']; // Ekstensi gambar yang diizinkan
            if (in_array($fileExtension, $allowedExtensions)) {
                $newFileName = md5(time() . $fileName) . '.' . $fileExtension; // Buat nama file unik (MD5)
                $destPath = $uploadDir . $newFileName; // Path tujuan file baru
                if (move_uploaded_file($fileTmpPath, $destPath)) {
                    $gambarPath = $destPath; // Gunakan path file baru hasil upload
                }
            } else {
                $errorMsg = "Format gambar harus JPG, JPEG, PNG, atau WEBP!"; // Pesan error validasi ekstensi
            }
        }

        if (empty($errorMsg)) {
            if (empty($id) || empty($nama) || empty($layar) || empty($suara) || empty($proyektor)) {
                $errorMsg = "Semua field wajib diisi!"; // Validasi kelengkapan teks
            } elseif ($kapasitas <= 0 || $harga <= 0 || $lantai < 0) {
                $errorMsg = "Kapasitas, harga, dan lantai tidak boleh negatif atau nol!"; // Validasi batas nilai angka
            } else {
                $list = getDaftarStudio(); // Ambil list data studio
                $existsIndex = -1; // Indeks penanda ketersediaan ID

                foreach ($list as $idx => $st) {
                    if (strtolower($st->getIdStudio()) === strtolower($id)) {
                        $existsIndex = $idx; // Simpan indeks jika ID studio ditemukan
                        break;
                    }
                }

                if ($action === 'tambah') {
                    if ($existsIndex !== -1) {
                        $errorMsg = "ID Studio '$id' sudah digunakan!"; // Error jika ID duplikat
                        $activeTab = 'form';
                    } else {
                        $studioBaru = new Studio($id, $nama, $kapasitas, $layar, $harga, $lantai, $suara, $proyektor, $gambarPath); // Buat objek baru
                        $_SESSION['daftar_studio'][] = serialize($studioBaru); // Simpan objek ter-serialize ke session
                        $successMsg = "Studio berhasil ditambahkan!";
                        $activeTab = 'list'; // Beralih ke tab daftar
                    }
                } elseif ($action === 'update') {
                    if ($existsIndex === -1) {
                        $errorMsg = "Data Studio dengan ID '$id' tidak ditemukan!"; // Error jika ID tak ada
                        $activeTab = 'form';
                    } else {
                        $st = $list[$existsIndex]; // Ambil objek studio dari indeks
                        $st->setNamaStudio($nama); // Update nama studio
                        $st->setKapasitasKursi($kapasitas); // Update kapasitas
                        $st->setTipeLayar($layar); // Update tipe layar
                        $st->setHargaSewa($harga); // Update harga sewa
                        $st->setLokasiLantai($lantai); // Update lokasi lantai
                        $st->setSistemSuara($suara); // Update sistem suara
                        $st->setProyektor($proyektor); // Update tipe proyektor
                        $st->setGambar($gambarPath); // Update path gambar

                        $_SESSION['daftar_studio'][$existsIndex] = serialize($st); // Timpa data di session
                        $successMsg = "Data Studio berhasil diperbarui!";
                        $activeTab = 'list'; // Beralih ke tab daftar
                    }
                }
            }
        }
    } elseif ($action === 'hapus') {
        $id = trim($_POST['id_studio'] ?? ''); // Tangkap ID studio yang dihapus
        $list = getDaftarStudio();
        $found = false;

        foreach ($list as $idx => $st) {
            if (strtolower($st->getIdStudio()) === strtolower($id)) {
                array_splice($_SESSION['daftar_studio'], $idx, 1); // Hapus elemen dari array session
                $successMsg = "Studio dengan ID '$id' berhasil dihapus!";
                $found = true;
                break;
            }
        }
        if (!$found) $errorMsg = "Data Studio tidak ditemukan!";
        $activeTab = 'list';
    }
}

$daftarStudio = getDaftarStudio(); // Ambil list studio terbaru untuk render HTML
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cinema Studio Management</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body class="bg-slate-900 text-slate-100 min-h-screen pb-12 font-sans">

    <nav class="bg-slate-800 border-b border-slate-700 sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-16 flex items-center justify-between">
            <div class="flex items-center gap-3">
                <i class="fa-solid fa-film text-indigo-500 text-2xl"></i>
                <span class="text-xl font-bold tracking-wide text-white">CineManager</span>
            </div>
        </div>
    </nav>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-8">

        <?php if (!empty($errorMsg)): ?>
            <div class="bg-red-950/80 border border-red-500 text-red-300 px-4 py-3 rounded-xl mb-6 flex items-center gap-3">
                <i class="fa-solid fa-circle-exclamation"></i>
                <span><?= htmlspecialchars($errorMsg) ?></span> <!-- Alert pesan error -->
            </div>
        <?php endif; ?>

        <?php if (!empty($successMsg)): ?>
            <div class="bg-emerald-950/80 border border-emerald-500 text-emerald-300 px-4 py-3 rounded-xl mb-6 flex items-center gap-3">
                <i class="fa-solid fa-circle-check"></i>
                <span><?= htmlspecialchars($successMsg) ?></span> <!-- Alert pesan sukses -->
            </div>
        <?php endif; ?>

        <!-- Navigasi Tab UI -->
        <div class="flex justify-center border-b border-slate-700 mb-8">
            <button id="tabListBtn" onclick="switchTab('list')" class="px-6 py-3 font-semibold text-sm border-b-2 flex items-center gap-2 transition-colors <?= $activeTab === 'list' ? 'border-indigo-500 text-indigo-400 bg-slate-800/40' : 'border-transparent text-slate-400 hover:text-slate-200' ?>">
                <i class="fa-solid fa-clapperboard"></i> Daftar Studio Bioskop
            </button>
            <button id="tabFormBtn" onclick="switchTab('form')" class="px-6 py-3 font-semibold text-sm border-b-2 flex items-center gap-2 transition-colors <?= $activeTab === 'form' ? 'border-indigo-500 text-indigo-400 bg-slate-800/40' : 'border-transparent text-slate-400 hover:text-slate-200' ?>">
                <i class="fa-solid fa-plus"></i> <span id="tabFormLabel">Tambah Studio Baru</span>
            </button>
        </div>

        <!-- TAB 1: Daftar Studio -->
        <div id="tabList" class="<?= $activeTab === 'list' ? '' : 'hidden' ?>">
            <?php if (empty($daftarStudio)): ?>
                <div class="text-center py-16 bg-slate-800/40 rounded-2xl border border-slate-700">
                    <i class="fa-solid fa-video-slash text-5xl text-slate-600 mb-3"></i>
                    <p class="text-slate-400">Belum ada data studio. Pilih tab 'Tambah Studio Baru' di atas untuk menambah data!</p>
                </div>
            <?php else: ?>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <?php foreach ($daftarStudio as $st): ?>
                        <div class="studio-card rounded-2xl overflow-hidden flex flex-col justify-between bg-slate-800 border border-slate-700/60 shadow-lg">
                            <div>
                                <div class="relative w-full aspect-video max-h-52 bg-slate-950 overflow-hidden border-b border-slate-700/50">
                                    <img src="<?= htmlspecialchars($st->getGambar()) ?>" 
                                         alt="<?= htmlspecialchars($st->getNamaStudio()) ?>" 
                                         class="w-full h-full object-cover object-center transition-transform duration-300 hover:scale-105" 
                                         onerror="this.src='assets/images/default.jpg'"> <!-- Fallback gambar saat link broken -->
                                    
                                    <span class="absolute top-3 left-3 bg-slate-900/90 backdrop-blur-md text-indigo-400 border border-indigo-500/30 font-bold text-xs px-3 py-1 rounded-full shadow-md">
                                        <?= htmlspecialchars($st->getIdStudio()) ?> <!-- ID Studio -->
                                    </span>
                                    <span class="absolute top-3 right-3 bg-indigo-600/90 backdrop-blur-md text-white font-bold text-xs px-3 py-1 rounded-full shadow-md">
                                        Lt. <?= htmlspecialchars($st->getLokasiLantai()) ?> <!-- Lantai -->
                                    </span>
                                </div>

                                <div class="p-5">
                                    <h3 class="text-xl font-bold text-white mb-3"><?= htmlspecialchars($st->getNamaStudio()) ?></h3>
                                    <div class="grid grid-cols-2 gap-2 text-xs text-slate-300 bg-slate-900/80 p-3 rounded-xl border border-slate-700/50 mb-4">
                                        <div><i class="fa-solid fa-chair text-indigo-400 mr-1"></i> <?= $st->getKapasitasKursi() ?> Kursi</div>
                                        <div><i class="fa-solid fa-desktop text-indigo-400 mr-1"></i> <?= htmlspecialchars($st->getTipeLayar()) ?></div>
                                        <div><i class="fa-solid fa-volume-high text-indigo-400 mr-1"></i> <?= htmlspecialchars($st->getSistemSuara()) ?></div>
                                        <div><i class="fa-solid fa-lightbulb text-indigo-400 mr-1"></i> <?= htmlspecialchars($st->getProyektor()) ?></div>
                                    </div>
                                </div>
                            </div>

                            <div class="p-5 pt-0 border-t border-slate-700/50 flex items-center justify-between mt-auto">
                                <div class="mt-3">
                                    <span class="text-xs text-slate-400 block">Harga Sewa</span>
                                    <span class="text-lg font-bold text-emerald-400">Rp <?= number_format($st->getHargaSewa(), 0, ',', '.') ?></span> <!-- Format Rupiah -->
                                </div>
                                <div class="flex items-center gap-2 mt-3">
                                    <button onclick='editStudio(<?= json_encode([ // Mengirimkan payload JSON objek studio ke fungsi JS
                                        "id" => $st->getIdStudio(),
                                        "nama" => $st->getNamaStudio(),
                                        "kapasitas" => $st->getKapasitasKursi(),
                                        "layar" => $st->getTipeLayar(),
                                        "harga" => $st->getHargaSewa(),
                                        "lantai" => $st->getLokasiLantai(),
                                        "suara" => $st->getSistemSuara(),
                                        "proyektor" => $st->getProyektor(),
                                        "gambar" => $st->getGambar()
                                    ]) ?>)' class="bg-amber-500/20 hover:bg-amber-500/30 text-amber-300 px-3 py-1.5 rounded-lg text-sm border border-amber-500/30 transition-colors flex items-center gap-1.5">
                                        <i class="fa-solid fa-pen-to-square"></i> Edit
                                    </button>
                                    
                                    <form method="POST" onsubmit="return confirm('Yakin ingin menghapus studio ini?');" class="inline">
                                        <input type="hidden" name="action" value="hapus"> <!-- Hidden action hapus -->
                                        <input type="hidden" name="id_studio" value="<?= htmlspecialchars($st->getIdStudio()) ?>">
                                        <button type="submit" class="bg-rose-500/20 hover:bg-rose-500/30 text-rose-300 p-2 rounded-lg text-sm border border-rose-500/30 transition-colors">
                                            <i class="fa-solid fa-trash-can"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>

        <!-- TAB 2: Form Input Studio -->
        <div id="tabForm" class="<?= $activeTab === 'form' ? '' : 'hidden' ?>">
            <div class="bg-slate-800 border border-slate-700 rounded-2xl max-w-2xl mx-auto p-6">
                <h3 id="formTitle" class="text-lg font-bold text-white mb-6 pb-3 border-b border-slate-700 flex items-center gap-2">
                    <i class="fa-solid fa-pen-to-square text-indigo-400"></i> Tambah Studio Baru
                </h3>
                <form method="POST" enctype="multipart/form-data" class="space-y-4">
                    <input type="hidden" name="action" id="formAction" value="tambah"> <!-- Dynamic state: tambah/update -->
                    <input type="hidden" name="active_tab" value="form">

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-medium text-slate-300 mb-1">ID Studio</label>
                            <input type="text" name="id_studio" id="field_id" placeholder="STD-01" required class="input-field">
                        </div>
                        <div>
                            <label class="block text-xs font-medium text-slate-300 mb-1">Nama Studio</label>
                            <input type="text" name="nama_studio" id="field_nama" placeholder="Studio 1" required class="input-field">
                        </div>
                        <div>
                            <label class="block text-xs font-medium text-slate-300 mb-1">Kapasitas Kursi</label>
                            <input type="number" min="1" name="kapasitas_kursi" id="field_kapasitas" placeholder="100" required class="input-field">
                        </div>
                        <div>
                            <label class="block text-xs font-medium text-slate-300 mb-1">Tipe Layar</label>
                            <input type="text" name="tipe_layar" id="field_layar" placeholder="IMAX 3D" required class="input-field">
                        </div>
                        <div>
                            <label class="block text-xs font-medium text-slate-300 mb-1">Harga Sewa (Rp)</label>
                            <input type="number" min="1" name="harga_sewa" id="field_harga" placeholder="5000000" required class="input-field">
                        </div>
                        <div>
                            <label class="block text-xs font-medium text-slate-300 mb-1">Lokasi Lantai</label>
                            <input type="number" min="0" name="lokasi_lantai" id="field_lantai" placeholder="2" required class="input-field">
                        </div>
                        <div>
                            <label class="block text-xs font-medium text-slate-300 mb-1">Sistem Suara</label>
                            <input type="text" name="sistem_suara" id="field_suara" placeholder="Dolby Atmos" required class="input-field">
                        </div>
                        <div>
                            <label class="block text-xs font-medium text-slate-300 mb-1">Proyektor</label>
                            <input type="text" name="proyektor" id="field_proyektor" placeholder="Laser 4K" required class="input-field">
                        </div>
                    </div>

                    <div class="border-t border-slate-700/80 pt-4 mt-2">
                        <label class="block text-xs font-medium text-slate-300 mb-1">Path Gambar Aset Lokal</label>
                        <input type="text" name="gambar_asset" id="field_gambar_asset" value="assets/images/default.jpg" class="input-field" placeholder="assets/images/namagambar.jpg">
                        <p class="text-[11px] text-slate-400 mt-1">Masukkan lokasi gambar dalam folder proyek (misal: <code>assets/images/studio1.jpg</code>)</p>

                        <label class="block text-xs font-medium text-slate-300 mt-4 mb-1">Atau Upload Gambar Baru ke Folder Uploads</label>
                        <input type="file" name="gambar_file" accept="image/*" class="file-input">
                    </div>

                    <div class="flex justify-end gap-3 pt-4 border-t border-slate-700">
                        <button type="button" onclick="switchTab('list')" class="px-4 py-2 bg-slate-700 hover:bg-slate-600 rounded-lg text-sm text-slate-200 transition-colors">Batal</button>
                        <button type="submit" class="px-5 py-2 bg-indigo-600 hover:bg-indigo-500 rounded-lg text-sm font-medium text-white transition-colors">Simpan Data</button>
                    </div>
                </form>
            </div>
        </div>

    </div>

    <script>
        function switchTab(tabName) {
            const tabList = document.getElementById('tabList'); // Elemen tab daftar
            const tabForm = document.getElementById('tabForm'); // Elemen tab form
            const tabListBtn = document.getElementById('tabListBtn'); // Tombol tab daftar
            const tabFormBtn = document.getElementById('tabFormBtn'); // Tombol tab form

            if (tabName === 'list') {
                tabList.classList.remove('hidden'); // Tampilkan tab daftar
                tabForm.classList.add('hidden'); // Sembunyikan tab form
                
                tabListBtn.className = 'px-6 py-3 font-semibold text-sm border-b-2 border-indigo-500 text-indigo-400 bg-slate-800/40 flex items-center gap-2'; // Style aktif
                tabFormBtn.className = 'px-6 py-3 font-semibold text-sm border-b-2 border-transparent text-slate-400 hover:text-slate-200 flex items-center gap-2'; // Style non-aktif
                
                document.getElementById('formTitle').innerHTML = '<i class="fa-solid fa-plus text-indigo-400"></i> Tambah Studio Baru'; // Set judul mode tambah
                document.getElementById('tabFormLabel').innerText = 'Tambah Studio Baru'; // Reset label tab
                document.getElementById('formAction').value = 'tambah'; // Reset action ke 'tambah'
                document.getElementById('field_id').readOnly = false; // Buka kunci ID Studio
                
                document.querySelectorAll('#tabForm input:not([type="hidden"]):not([type="file"])').forEach(input => {
                    if (input.id === 'field_gambar_asset') {
                        input.value = 'assets/images/default.jpg'; // Reset path gambar ke default
                    } else {
                        input.value = ''; // Kosongkan input form lainnya
                    }
                });
            } else {
                tabList.classList.add('hidden'); // Sembunyikan tab daftar
                tabForm.classList.remove('hidden'); // Tampilkan tab form

                tabFormBtn.className = 'px-6 py-3 font-semibold text-sm border-b-2 border-indigo-500 text-indigo-400 bg-slate-800/40 flex items-center gap-2'; // Style aktif
                tabListBtn.className = 'px-6 py-3 font-semibold text-sm border-b-2 border-transparent text-slate-400 hover:text-slate-200 flex items-center gap-2'; // Style non-aktif
            }
        }

        function editStudio(data) {
            switchTab('form'); // Buka tab form
            
            document.getElementById('formTitle').innerHTML = '<i class="fa-solid fa-pen-to-square text-amber-400"></i> Edit Studio (' + data.id + ')'; // Set judul mode edit
            document.getElementById('tabFormLabel').innerText = 'Edit Studio (' + data.id + ')'; // Ubah label tab
            document.getElementById('formAction').value = 'update'; // Ubah action ke 'update'
            
            document.getElementById('field_id').value = data.id; // Isi field ID
            document.getElementById('field_id').readOnly = true; // Kunci ID agar tidak bisa diubah
            document.getElementById('field_nama').value = data.nama; // Isi field Nama
            document.getElementById('field_kapasitas').value = data.kapasitas; // Isi field Kapasitas
            document.getElementById('field_layar').value = data.layar; // Isi field Layar
            document.getElementById('field_harga').value = data.harga; // Isi field Harga
            document.getElementById('field_lantai').value = data.lantai; // Isi field Lantai
            document.getElementById('field_suara').value = data.suara; // Isi field Suara
            document.getElementById('field_proyektor').value = data.proyektor; // Isi field Proyektor
            document.getElementById('field_gambar_asset').value = data.gambar; // Isi field Gambar
        }
    </script>
</body>
</html>