<?php 
session_start();
if ( !isset($_SESSION['login'])) {
	header("Location: login.php");
	exit;

}

require "functions.php";
//cek apakah tombol submit sudah di tekan
if( isset($_POST["submit"])) {


	
	//cek apakah data berhasil di tambah
	if( tambah($_POST) > 0) {
		echo "
			<script>
			alert ('data berhasil ditambahkan!');
			document.location.href = 'index.php';
			</script>
		";
	} else {
		echo "
			<script>
			alert ('data gagal ditambahkan');
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
	<title>Tambah Data Heandphone</title>
</head>
<body>
		<h1>Tambah Data HP</h1>

		<form action="" method="post" enctype="multipart/form-data">
			<ul>
				<?php// required supaya kolom tersebut wajib di ini ?>
				<li>
					<label for="merek">Merek :</label>
					<input type="text" name="merek" id="merek" required>
				</li>
				<li>
					<label for="tipe">Tipe :</label>
					<input type="text" name="tipe" id="tipe">
				</li>
				<li>
					<label for="tahun">Tahun :</label>
					<input type="text" name="tahun" id="tahun" required>

				</li>
				<li>
					<label for="kondisi">Kondisi :</label>
					<input type="text" name="kondisi" id="kondisi" required>
				</li>
				<li>
				<label for="stok">Stok :</label>
				<input type="text" name="stok" id="stok" required>
				</li>
				<li>
					<label for="warna">Warna :</label>
					<input type="text" name="warna" id="warna">
				</li>
				<li>
					<label for="gambar">Gambar :</label >
					<input type="file" name="gambar" id="gambar">
				</li>
				<li>
					<button type="submit" name="submit">Tambah</button>
				</li>
			</ul>
</form>
</body>
</html>