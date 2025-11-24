<?php

//definisikan class Rumah
  class Rumah {
    // -bagian property-
    public $warna;
    public $jumlahKamar;
    public $alamat;

    //- bagian contructor-
    //method ini akan otomatis berjalan
    // setiap kali 'new Rumah()' dipanggil
    public function __construct($warnaAwal, $kamarAwal, $alamatAwal) {

      // '$this' artinya 'objek ini'
      // sesuai data '$warnaAwal' yang dikirim

      $this->warna = $warnaAwal;
      $this->jumlahKamar = $kamarAwal;
      $this->alamat = $alamatAwal;
    }

    // method lain (masih tetap ada)
    public function kunciPintu() {
      return "Pintu di $this->alamat sudah dikunci.";
    }
  }

  //-bagian object (cara pakai baru)-
  //2. sekarang, saat membuat object, kita
  // wajib menyertakan nilai di dalam kurung.
  // nilai ini akan 'dikirim' ke method __construct
  $rumahSaya = new Rumah("biru", 5, "Jl. Merdeka No. 10");
  $rumahTetangga = new Rumah("merah", 2, "Jl. Sudirman No. 20");

  //-bukti-
  // properti sudah terisi otomatis saat object dibuat
  // tanpa perlu set properti satu per satu
  echo "Warna rumah saya: " . $rumahSaya->warna;//output: biru
  echo "<br>";
  echo "Jumlah kamar: " . $rumahSaya->jumlahKamar;//output: 5
  echo "<br>";
  echo "Alamat: " . $rumahSaya->alamat;//output: Jl. Merdeka No. 10
  echo "<br>";
  echo $rumahTetangga->kunciPintu();//output: Pintu di Jl. Sudirman No. 20 sudah dikunci.
  ?>