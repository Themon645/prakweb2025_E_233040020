<?php
class ContohStatic {
  public static $angka = 1;

  public static function hallo() {
    // akses property static menggunakan self::
    // return 'hallo' . $this->angka; // tidak bisa menggunakan $this 
    return 'Hallo ' . self::$angka;
  }
}

echo ContohStatic::$angka; // output: 1
echo ContohStatic::hallo(); 
?>