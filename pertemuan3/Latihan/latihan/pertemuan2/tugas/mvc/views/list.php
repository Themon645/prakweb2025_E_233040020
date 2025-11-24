<?php /** @var array $produks */
function val($p, $key) {
    if (is_object($p)) return $p->{$key} ?? '';
    if (is_array($p)) return $p[$key] ?? '';
    return '';
}
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Daftar Produk</title>
    <style>table{border-collapse:collapse}td,th{border:1px solid #ccc;padding:8px}</style>
</head>
<body>
    <h1>Daftar Produk</h1>
    <p><a href="index.php?action=create">Tambah Produk</a></p>
    <table>
        <thead>
            <tr>
                <th>ID</th><th>Judul</th><th>Penulis</th><th>Penerbit</th><th>Harga</th><th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php if (empty($produks)): ?>
                <tr><td colspan="6">Belum ada produk</td></tr>
            <?php else: ?>
                <?php foreach ($produks as $p): ?>
                    <tr>
                        <td><?= htmlspecialchars(val($p,'id')) ?></td>
                        <td><?= htmlspecialchars(val($p,'judul')) ?></td>
                        <td><?= htmlspecialchars(val($p,'penulis')) ?></td>
                        <td><?= htmlspecialchars(val($p,'penerbit')) ?></td>
                        <td><?= htmlspecialchars(val($p,'harga')) ?></td>
                        <td>
                            <a href="index.php?action=edit&id=<?= urlencode(val($p,'id')) ?>">Edit</a> |
                            <a href="index.php?action=delete&id=<?= urlencode(val($p,'id')) ?>" onclick="return confirm('Yakin?')">Hapus</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
</body>
</html>
<?php /** @var array $produks */ ?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Daftar Produk</title>
    <style>table{border-collapse:collapse}td,th{border:1px solid #ccc;padding:8px}</style>
</head>
<body>
    <h1>Daftar Produk</h1>
    <p><a href="index.php?action=create">Tambah Produk</a></p>
    <table>
        <thead>
            <tr>
                <th>ID</th><th>Judul</th><th>Penulis</th><th>Penerbit</th><th>Harga</th><th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php if (empty($produks)): ?>
                <tr><td colspan="6">Belum ada produk</td></tr>
            <?php else: ?>
                <?php foreach ($produks as $p): ?>
                    <tr>
                        <td><?= htmlspecialchars($p['id']) ?></td>
                        <td><?= htmlspecialchars($p['judul']) ?></td>
                        <td><?= htmlspecialchars($p['penulis']) ?></td>
                        <td><?= htmlspecialchars($p['penerbit']) ?></td>
                        <td><?= htmlspecialchars($p['harga']) ?></td>
                        <td>
                            <a href="index.php?action=edit&id=<?= urlencode($p['id']) ?>">Edit</a> |
                            <a href="index.php?action=delete&id=<?= urlencode($p['id']) ?>" onclick="return confirm('Yakin?')">Hapus</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
</body>
</html>
