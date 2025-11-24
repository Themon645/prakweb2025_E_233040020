<?php
//1. difinisi interface (kontrak)
// gunakan keyword interface
interface BisaDimakan {
  // - aturan wajib -
  // 2. method di interface selalu 'public' dan TIDAK PUNYA ISI (abstrak).
  // ini adalah 'KONTRAK' wajib: setiap class yang mengimplementasi ini harus mengisi mothod isi.
  public function makan();
}

//3. Class pertama: menerapkan kontrak interface
// apel 'implements' (mengimplementasi) kontrak BisaDimakan
class Apel implements BisaDimakan {
  // 4. Implementasi Wajib
  // jika method makan() tidak diisi, akan error
  // Apel mengisi kontrak 'makan()' dengan logikanya sendiri.
  public function makan() {
    return "Apel dimakan: Langsung Kunyah";
  }
}

//5. class kedua: menerapkan kontrak interface yang sama
// jeruk jugas 'implements' kontrak yang sama
class Jeruk implements BisaDimakan {
  // 6. Implementasi Wajib
  // Jeruk mengisi kontrak 'makan()' dengan logikanya sendiri.
  public function makan() {
    return "Jeruk dimakan: Dikupas dulu, baru dikunyah";
  }
}

//7. cara penggunaan
$apel = new Apel();
$jeruk = new Jeruk();

echo $apel->makan(); // Output: Apel dimakan: Langsung Kunyah
echo "<br>";
echo $jeruk->makan(); // Output: Jeruk dimakan: Dikupas dulu, baru dikunyah
?>