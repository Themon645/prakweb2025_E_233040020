<?php
class produk {
  //properti umum

  //ini materi setter dan getter
  //ubah visibility properti dari public ke private
  private $judul,
          $penulis,
          $penerbit,
          $harga;

  function __construct( $judul = "judul", $penulis = "penulis", $penerbit = "penerbit", $harga = 0 ) {
    $this->judul = $judul;
    $this->penulis = $penulis;
    $this->penerbit = $penerbit;
    $this->harga = $harga;
  }

  // kita sudah menggunakan getter sebelumnya
  // getJudul adalah getter
  public function getJudul() {
    return $this->judul;
  }

  // getHarga adalah getter
  public function getHarga() {
    return $this->harga;
  }

  // getLablel adalah getter
  public function getLabel() {
    return "$this->penulis, $this->penerbit";
  }

  // getInfoProduk adalah getter
  public function getInfoProduk() {
    return "{$this->judul} | {$this->getLabel()} (Rp. {$this->harga})";
  }
}
// child class
class game extends produk {
  //properti khusus
  public $waktuMain;

  //constructor milik child class
  public function __construct( $judul, $penulis, $penerbit, $harga, $waktuMain )
  {
    //panggil constructor parent class
    // construktor milik parent class (produk)
    // agar properti umum terisi
    parent::__construct( $judul, $penulis, $penerbit, $harga );

    //set properti khusus
    $this->waktuMain = $waktuMain;
  }

  // cara mengakses harga dari child class
  public function getHarga() {
    return $this->harga;
  }

  public function getInfoProduk() {

    //1. kita tetap panggil method milik parent class
    // menggunakn parent::
    $infoParent = parent::getInfoProduk();

    //2. kita tambahkan informasi khusus milik class game
    return "game : {$infoParent} ~ {$this->waktuMain} Jam.";
  }
}
  $produk1 = new komik("Naruto", "Masashi Kishimoto", "Shonen Jump", 30000, 100);
  $produk2 = new game("Uncharted", "Neil", "Sony", 250000, 50);
  echo $produk1->getInfoProduk();
  echo "<br>";
  echo $produk2->getInfoProduk();
  echo "<hr>";

  //sudah tdak bisa mengakses properti harga secara langsung karena sudah di protected
  //$produk1->harga = 12000; //error
  //echo $produk1->harga;

  // cara memanggil harga yang benar menggunaka method dari child class
  echo $produk2->getHarga();

?>