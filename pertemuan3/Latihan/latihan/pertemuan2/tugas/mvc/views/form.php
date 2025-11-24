<?php /** @var string $action */ /** @var array|object|null $produk */
function val($produk, $key, $default = '') {
    if ($produk === null) return $default;
    if (is_object($produk)) return $produk->{$key} ?? $default;
    if (is_array($produk)) return $produk[$key] ?? $default;
    return $default;
}
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title><?= $action === 'store' ? 'Tambah Produk' : 'Edit Produk' ?></title>
</head>
<body>
    <h1><?= $action === 'store' ? 'Tambah Produk' : 'Edit Produk' ?></h1>
    <form method="post" action="index.php?action=<?= $action ?>">
        <?php if ($action === 'update'): ?>
            <input type="hidden" name="id" value="<?= htmlspecialchars(val($produk,'id')) ?>">
        <?php endif; ?>
        <div>
            <label>Judul<br><input type="text" name="judul" value="<?= htmlspecialchars(val($produk,'judul','')) ?>"></label>
        </div>
        <div>
            <label>Penulis<br><input type="text" name="penulis" value="<?= htmlspecialchars(val($produk,'penulis','')) ?>"></label>
        </div>
        <div>
            <label>Penerbit<br><input type="text" name="penerbit" value="<?= htmlspecialchars(val($produk,'penerbit','')) ?>"></label>
        </div>
        <div>
            <label>Harga<br><input type="number" name="harga" value="<?= htmlspecialchars(val($produk,'harga',0)) ?>"></label>
        </div>
        <div>
            <button type="submit"><?= $action === 'store' ? 'Simpan' : 'Update' ?></button>
            <a href="index.php">Batal</a>
        </div>
    </form>
</body>
</html>
<?php /** @var string $action */ /** @var array|null $produk */ ?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title><?= $action === 'store' ? 'Tambah Produk' : 'Edit Produk' ?></title>
</head>
<body>
    <h1><?= $action === 'store' ? 'Tambah Produk' : 'Edit Produk' ?></h1>
    <form method="post" action="index.php?action=<?= $action ?>">
        <?php if ($action === 'update'): ?>
            <input type="hidden" name="id" value="<?= htmlspecialchars($produk['id']) ?>">
        <?php endif; ?>
        <div>
            <label>Judul<br><input type="text" name="judul" value="<?= $produk['judul'] ?? '' ?>"></label>
        </div>
        <div>
            <label>Penulis<br><input type="text" name="penulis" value="<?= $produk['penulis'] ?? '' ?>"></label>
        </div>
        <div>
            <label>Penerbit<br><input type="text" name="penerbit" value="<?= $produk['penerbit'] ?? '' ?>"></label>
        </div>
        <div>
            <label>Harga<br><input type="number" name="harga" value="<?= $produk['harga'] ?? 0 ?>"></label>
        </div>
        <div>
            <button type="submit"><?= $action === 'store' ? 'Simpan' : 'Update' ?></button>
            <a href="index.php">Batal</a>
        </div>
    </form>
</body>
</html>
