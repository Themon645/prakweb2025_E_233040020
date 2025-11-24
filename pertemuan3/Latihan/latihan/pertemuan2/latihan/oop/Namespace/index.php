<?php

require_once 'App/init.php';

//'Import' class dengan namespace App/Service
// dan beri alias 'serviceUser
use App\Service\User as ServiceUser;

// 'Import' class dengan namespace App/Produk
// dan beri alias 'produkUser'
use App\Produk\User as ProdukUser;

// sekarang kita panggil class menggunakan alias-nya
// PHP tidak akan bingung lagi
new ServiceUser();
echo "<br>";
new ProdukUser();
?>