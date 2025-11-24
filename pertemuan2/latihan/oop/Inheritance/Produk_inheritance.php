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
}
  // child class 
  // kita buat class komik yang mewarisi semua
  // properti dan method dari class produk


  class komik extends produk {
    //properti khusus
    public $jmlHalaman;

    //constructor milik child class
    public function __construct( $judul = "judul", $penulis = "penulis", $penerbit = "penerbit", $harga = 0, $jmlHalaman = 0 ) {

      //panggil constructor parent class
      // construktor milik parent class (produk)
      // agar properti umum terisi
      parent::__construct( $judul, $penulis, $penerbit, $harga );

      //set properti khusus
      $this->jmlHalaman = $jmlHalaman;
    }

    //method khusus
    public function getInfoKomik() {
      //gunakan method dari parent class
      $str = "Komik: " . parent::getLabel() . " | Rp. {$this->harga} - {$this->jmlHalaman} Halaman.";
      return $str;
    }
}

  // child class
  // kita buat class game yang mewarisi semua
  // properti dan method dari class produk
  class game extends produk {
    //properti khusus milik class game
    public $waktuMain;

    public function __construct( $judul = "judul", $penulis = "penulis", $penerbit = "penerbit", $harga = 0, $waktuMain = 0 ) {

      //panggil constructor parent class
      // construktor milik parent class (produk)
      // agar properti umum terisi
      parent::__construct( $judul, $penulis, $penerbit, $harga );

      //set properti khusus
      $this->waktuMain = $waktuMain;
    }

    //method khusus milik class game
    public function getInfoGame() {
      //gunakan method dari parent class
      $str = "Game: " . parent::getLabel() . " | Rp. {$this->harga} ~ {$this->waktuMain} Jam.";
      return $str;
    }
  }

  //-bagian object (cara pakai)-

  //kita buat objek dari child class, bukan parent class
  $produk1 = new komik("Naruto", "Masashi Kishimoto", "Shonen Jump", 30000, 100);
  $produk2 = new game("Uncharted", "Neil Druckmann", "Sony Computer", 250000, 50);

  //menjalankan method khusus dari masing-masing object
  echo $produk1->getInfoKomik();
  echo "<br>";
  echo $produk2->getInfoGame();

  //hasilnya:
  // Komik: Naruto Masashi Kishimoto, Shonen Jump | Rp. 30000 - 100 Halaman.
  // Game: Neil Druckmann, Sony Computer | Rp. 250000 ~ 50 Jam.

?>
