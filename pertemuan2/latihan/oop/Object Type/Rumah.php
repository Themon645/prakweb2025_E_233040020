<?php

// DEFINISI CLASS (DENAH)
class Rumah {

    // Properti
    public $warna;
    public $alamat;

    // Constructor (Otomatis jalan saat 'new')
    public function __construct($warna, $alamat) {
        $this->warna = $warna;
        $this->alamat = $alamat;
    }
}

// --- INTI MATERI: OBJECT TYPE ---

// Kita membuat fungsi terpisah.
// Perhatikan 'Rumah $dataRumah' pada parameter.
// Ini adalah 'Type hinting' atau 'Object Type'.
// Fungsi ini SEKARANG HANYA MAU menerima parameter
// yang merupakan object dari class 'Rumah'.

function pasangListrik( Rumah $dataRumah ) {
    return "Listrik sedang dipasang di rumah " . $dataRumah->warna .
           " yang beralamat di " . $dataRumah->alamat;
}

// --- BAGIAN OBJECT (CARA PAKAI) ---

// 1. Buat object Rumah (Ini valid)
$rumahSaya = new Rumah("Merah", "Jln. Merdeka 10");

// 2. Panggil fungsi dengan object yang BENAR
echo pasangListrik($rumahSaya);
echo "<br>";

// --- CONTOH ERROR ---
// 3. Coba panggil fungsi dengan data string (SALAH)
$teksBiasa = "Ini cuma string";

// Baris di bawah ini jika dijalankan akan ERROR:
// echo pasangListrik($teksBiasa);
// PHP akan error karena $teksBiasa BUKAN object 'Rumah'

?>
