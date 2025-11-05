<?php

//definisikan class Rumah
  class Rumah {
    // -bagian property-
    public $warna = "putih";
    public $jumlahKamar = 4;

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

  // membuat Object pertama dari class rumah
  $rumahSaya = new Rumah();

  //2. mengakses property
  echo "Warna awal rumah saya: " . $rumahSaya->warna; //output: putih
  echo "<br>";

  //3. menjalankan method (melakukan aksi)
  $rumahSaya->gantiWarna("biru");

  //4. melihat data lahi setelah diubah
  echo "Warna baru rumah saya: " . $rumahSaya->warna; //output: biru
  echo "<br>";

  //5. menjalankan method kunciPintu
  echo $rumahSaya->kunciPintu(); //output: Pintu sudah dikunci

  echo "<hr>";

  // membuat Object kedua dari class rumah
  // kita sebut ini "rumahTetangga"
  $rumahTetangga = new Rumah();
  echo "Warna rumah tetangga: " . $rumahTetangga->warna; //output: putih
  // warna rumah tetangga tetap putih karena object berbeda
?>