<?php

//definisikan class Rumah
  class Rumah {
    // -bagian property-
    public $warna = "putih";
    public $jumlahKamar = 4;
    public $alamat = "Jl. Pasundan No. 1";

    //-bagian method-
    // ini adalah perilaku /aksi
    // 'public' adalah 'visibility
    public function kunciPintu() {
      return "Pintu sudah dikunci";
    }

    public function gantiWarna($warnaBaru) {
      // '$this->warna' artinya 'mengakses property 'warna'
      // milik object ini sendiri
      $this->warna = $warnaBaru;
      return "Warna rumah sudah diganti menjadi " . $this->warna;
    }

  }
 
  // -bagian object-

  // membuat Object pertama dari calss rumah
  $rumahSaya = new Rumah();

  // membuat Object kedua dari class rumah
  // kita sebut ini "rumahTetangga"
  $rumahTetangga = new Rumah();
?>