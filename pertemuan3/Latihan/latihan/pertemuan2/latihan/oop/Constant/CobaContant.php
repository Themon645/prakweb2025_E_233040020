<?php
class CobaContant{
  // define('COBA', 'BEBAS'); // ERROR
  const JURUSAN = 'TEKNIK INFORMATIKA'; 
}

// cara mengakses constant sama seperti static
echo CobaContant::JURUSAN;
?>