<?php 
// memanggil init untuk menjalankan autoload
require_once __DIR__ . '/init.php';

// instance sebuah class
$cat = new Cat();
echo $cat->run(); // Output: kucing itu Berlari