<?php
//-parent class-
// class ini berisi semua properti/method umum
// yang dimiliki oleh semua produk

class produk {
  //properti umum
  public  $judul,
          $penulis,
          $penerbit,
          $harga;

  //constructor milik parent class
  public function __construct( $judul = "judul", $penulis = "penulis", $penerbit = "penerbit", $harga = 0 ) {
    $this->judul = $judul;
    $this->penulis = $penulis;
    $this->penerbit = $penerbit;
    $this->harga = $harga;
  }

  //method milik parent class
  public function getLabel() {
    return "$this->penulis, $this->penerbit";
  }

  //-method umum untuk menampilkan info produk(yang akan di override)-
  // in adalah method 'getInfoProduk' versi parent class
  public function getInfoProduk() {
    return "{$this->judul} | {$this->getLabel()} (Rp. {$this->harga})";
  }
}
  // child class 
  // kita buat class komik yang mewarisi semua
  // properti dan method dari class produk


  class komik extends produk {
    //properti khusus
    public $jmlHalaman;

    //constructor milik child class
    public function __construct( $judul, $penulis, $penerbit, $harga, $jmlHalaman )
    {
      //panggil constructor parent class
      // construktor milik parent class (produk)
      // agar properti umum terisi
      parent::__construct( $judul, $penulis, $penerbit, $harga );

      //set properti khusus
      $this->jmlHalaman = $jmlHalaman;
    }

    //-inti materi overriding-
    // method ini 'menimpa' method GetInfoProduk() milik parent class
    public function getInfoProduk() {

      //1. kita tetap panggil method milik parent class
      // menggunakn parent::
      $infoParent = parent::getInfoProduk();

      //2. kita tambahkan informasi khusus milik class komik
      return "komik : {$infoParent} - {$this->jmlHalaman} Halaman.";
    }
}


  // child class
  // kita buat class game yang mewarisi semua
  // properti dan method dari class produk
  class game extends produk {
    //properti khusus milik class game
    public $waktuMain;

    public function __construct( $judul, $penulis, $penerbit, $harga, $waktuMain ) {
      //panggil constructor parent class
      // construktor milik parent class (produk)
      // agar properti umum terisi
      parent::__construct( $judul, $penulis, $penerbit, $harga );

      //set properti khusus
      $this->waktuMain = $waktuMain;
    }

    //-inti materi overriding-
    // method ini 'menimpa' method GetInfoProduk() milik parent class
    public function getInfoProduk() {

      //1. kita tetap panggil method milik parent class
      // menggunakn parent::
      $infoParent = parent::getInfoProduk();

      //2. kita tambahkan informasi khusus milik class game
      return "Game : {$infoParent} ~ {$this->waktuMain} Jam.";
    }
  }

  //-bagian object (cara pakai)-
  //kita buat objek dari child class, bukan parent class
  $produk1 = new komik("Naruto", "Masashi Kishimoto", "Shonen Jump", 30000, 100);
  $produk2 = new game("Uncharted", "Neil Druckmann", "Sony Computer", 250000, 50);

  //menjalankan method khusus dari masing-masing object
  echo $produk1->getInfoProduk();
  echo "<br>";
  echo $produk2->getInfoProduk();

  //hasilnya:
  // Komik: Naruto Masashi Kishimoto, Shonen Jump | Rp. 30000 - 100 Halaman.
  // Game: Neil Druckmann, Sony Computer | Rp. 250000 ~ 50 Jam.

?>
