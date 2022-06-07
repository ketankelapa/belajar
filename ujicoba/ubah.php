<?php 
session_start();
if ( !isset($_SESSION['login'])) {
	header("Location: login.php");
	exit;

}

require "functions.php";

// cara ambil data di url
$id = $_GET["id"];
// query data verdasarkan id
$h = query("SELECT * FROM hp WHERE id = $id")[0];




//cek apakah tombol submit sudah di tekan
if( isset($_POST["submit"])) {
	
	//cek apakah data berhasil di ubah
	if( ubah($_POST) > 0) {
		echo "
			<script>
			alert ('data berhasil diubah!');
			document.location.href = 'index.php';
			</script>
		";
	} else {
		echo "
			<script>
			alert ('data gagal diubah!');
			document.location.href = 'index.php';
			</script>
			";
	} 
	
	
}

?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Ubah Data Heandphone</title>
</head>
<body>
		<h1>Ubah Data HP</h1>

		<form action="" method="post" enctype="multipart/form-data">
			<input type="hidden" name="id" value="<?= $h["id"];  ?>">
			<input type="hidden" name="gambarlama" value="<?= $h["gambar"];  ?>">
			<ul>
				<?php// required supaya kolom tersebut wajib di ini ?>
				<li>
					<label for="merek">Merek :</label>
					<input type="text" name="merek" id="merek" required
					value="<?= $h["merek"];  ?>">
				</li>
				<li>
					<label for="tipe">Tipe :</label>
					<input type="text" name="tipe" id="tipe" required value="<?= $h["tipe"];  ?>">
				</li>
				<li>
					<label for="tahun">Tahun :</label>
					<input type="text" name="tahun" id="tahun" required value="<?= $h["tahun"];  ?>">

				</li>
				<li>
					<label for="kondisi">Kondisi :</label>
					<input type="text" name="kondisi" id="kondisi" required value="<?= $h["kondisi"];  ?>">
				</li>
				<li>
				<label for="stok">Stok :</label>
				<input type="text" name="stok" id="stok" required value="<?= $h["stok"];  ?>">
				</li>
				<li>
					<label for="warna">Warna :</label>
					<input type="text" name="warna" id="warna" required value="<?= $h["warna"];  ?>">
				</li>
				<li>
					<label for="gambar">Gambar :</label > <br>
					<img src="img/<?= $h['gambar'];  ?>" width="70"> <br>
					<input type="file" name="gambar" id="gambar">
				</li>
				<li>
					<button type="submit" name="submit" onclick="return confirm ('anda yakin ubah file ini ?');">Ubah</button>
				</li>
			</ul>
</form>
</body>
</html>