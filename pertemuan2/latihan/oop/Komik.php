<?php
require_once 'Produk.php'; // sesuaikan dengan lokasi file Produk.php

// child class Komik
class Komik extends Produk {
    public $jmlHalaman;

    public function __construct( $judul, $penulis, $penerbit, $harga, $jmlHalaman) {
        parent::__construct( $judul, $penulis, $penerbit, $harga);
        $this->jmlHalaman = $jmlHalaman;
    }
    
    public function getInfoProduk() {
        $str = "Komik: " . parent::getLabel() . " | Rp. {$this->harga} - {$this->jmlHalaman} halaman";
        return $str;
}
}

?>