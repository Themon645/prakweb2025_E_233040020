<?php

// bisa menggunakan requirement
// require_once 'Produk/Animal.php';
// require_once 'Produk/Cat.php';

// method khusus autoload
spl_autoload_register(function($class) {
  // ubah namespace menjadi path
  $class = str_replace('App\\Produk\\', '', $class);
  require_once __DIR__ . '/' . $class . '.php';
});