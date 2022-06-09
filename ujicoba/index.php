<?php

session_start();
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;

}
// koneksi ke database
require "functions.php";

// jika ada keyword
// ini di ganti get supaya bisa kebaca bersamaan dengan halaman mad
// terus abg ganti kondisi cek nya cek keyword jadi ga harus berdasarkan tombol cari
if (isset($_GET["keyword"])) {
    $data = cari($_GET["keyword"]);
} else {
    $data = query("SELECT * FROM hp ");
}

//konfigurasi
$Jumlahdataperhalaman = 3;
$jumlahdata = count($data);
$jumlahhalaman = ceil($jumlahdata / $Jumlahdataperhalaman);

if (isset($_GET["halaman"])) {
    $halamanaktif = $_GET["halaman"];
} else {
    $halamanaktif = 1;
}

$awaldata = ($Jumlahdataperhalaman * $halamanaktif) - $Jumlahdataperhalaman;
//pagination
// jika ada keyword

if (isset($_GET["keyword"])) {
    $data = cari($_GET["keyword"], $awaldata, $Jumlahdataperhalaman);
} else {
    $data = query("SELECT * FROM hp LIMIT $awaldata, $Jumlahdataperhalaman");

}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Halaman Utama</title>
</head>

<body>
    <a href="logout.php">Logout</a>
    <h1>Daftar Heandphone</h1>
    <a href="tambah.php">Tambah Data</a>
    <br> <br>
    <!-- btw ini di ganti get supaya bisa muncul di link sama dengan halaman. kalau post dia ga muncul -->
    <form action="" method="get">
        <input type="text" name="keyword" value="<?=isset($_GET["keyword"]) ? $_GET["keyword"] : "";?>" size="30" autofocus placeholder="Mencari" autocomplete="off">
        <button type="submit" name="cari">cari</button>
    </form>
    <br><br>
    <!-- navigasi untuk page -->
    <?php if ($halamanaktif > 1): ?>
    <a href="?halaman=<?=$halamanaktif - 1;?><?=isset($_GET["keyword"]) ? "&keyword=" . $_GET["keyword"] : "";?>">&laquo;</a>
    <?php endif;?>
    <?php for ($i = 1; $i <= $jumlahhalaman; $i++): ?>
    <?php if ($i == $halamanaktif): ?>
    <a href="?halaman=<?=$i;?><?=isset($_GET["keyword"]) ? "&keyword=" . $_GET["keyword"] : "";?>" style="font-weight: bold; color:darkblue;">
        <?=$i;?></a>
    <?php else: ?>
    <a href="?halaman=<?=$i;?><?=isset($_GET["keyword"]) ? "&keyword=" . $_GET["keyword"] : "";?>">
        <?=$i;?></a>
    <?php endif;?>
    <?php endfor;?>
    <?php if ($halamanaktif < $jumlahhalaman): ?>
    <a href="?halaman=<?=$halamanaktif + 1;?><?php echo isset($_GET["keyword"]) ? "&keyword=" . $_GET["keyword"] : ""; ?>">&raquo;</a>
    <?php endif;?>
    <br> <br>
    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>No.</th>
            <th>Aksi</th>
            <th>Gambar</th>
            <th>Merek</th>
            <th>Tipe</th>
            <th>Tahun</th>
            <th>Kondisi</th>
            <th>Stok</th>
            <th>Warna</th>
        </tr>
        <?php $i = 1;?>
        <?php foreach ($data as $row): ?>
        <tr>
            <td>
                <?=$i;?>
            </td>
            <td>
                <a href="ubah.php?id=<?=$row["id"];?>" >Ubah</a>
                <a href="hapus.php?id=<?=$row["id"];?>" onclick="return confirm ('anda yakin hapus file ini ?');">Hapus</a>
            </td>
            <td><img src="img/<?=$row["gambar"];?>"></td>
            <td>
                <?=$row["merek"];?>
            </td>
            <td>
                <?=$row["tipe"];?>
            </td>
            <td>
                <?=$row["tahun"];?>
            </td>
            <td>
                <?=$row["kondisi"];?>
            </td>
            <td>
                <?=$row["stok"];?>
            </td>
            <td>
                <?=$row["warna"];?>
            </td>
        </tr>
        <?php $i++;?>
        <?php endforeach;?>
    </table>
</body>

</html>