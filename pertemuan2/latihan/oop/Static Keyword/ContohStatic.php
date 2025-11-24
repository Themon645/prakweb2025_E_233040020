// buat sebuah class utuk membuat property dan method static
<?php
class ContohStatic {
  // cara penulisan untuk property static
  // visibility + static + nama property
  public static $angka = 1;

  // cara penulisan untuk method static
  // visibility + static + function + nama function
  public static function hallo() {
    return 'Hallo';
  }
}

// mengakses static property
// perhatikan: kita tida perlu 'new contohStatic()' untuk mengakses property static
// kita panggil langsung dengan nama classnya
echo ContohStatic::$angka; // output: 1

// menjalankan static method
echo ContohStatic::hallo(); // output: Hallo
?>