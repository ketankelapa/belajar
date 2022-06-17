<?php 
require '../functions.php';
$keyword = $_GET['keyword'];

$query = $query = "SELECT * FROM hp 
				WHERE
				merek LIKE '%$keyword%' OR 
				tipe LIKE '%$keyword%' OR 
				tahun LIKE '%$keyword%' OR 
				kondisi LIKE '%$keyword%' OR 
				stok LIKE '%$keyword%' OR 
				warna LIKE '%$keyword%' 

	";
$hp = query($query);

?>
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

<?php $i = 1;  ?>
<?php foreach ($data as $row) : ?>
		
		<tr>
			<td><?= $i;  ?></td>
			<td>
				<a href="ubah.php?id=<?= $row["id"];  ?>" >Ubah</a>
				<a href="hapus.php?id=<?= $row["id"];  ?>" onclick="return confirm ('anda yakin hapus file ini ?');">Hapus</a>
			</td>
			<td><img src="img/<?= $row["gambar"];  ?>"></td>
			<td><?= $row["merek"];  ?></td>
			<td><?= $row["tipe"];  ?></td>
			<td><?= $row["tahun"];  ?></td>
			<td><?= $row["kondisi"];  ?></td>
			<td><?= $row["stok"];  ?></td>
			<td><?= $row["warna"];  ?></td>
			
		</tr>
		<?php $i++; ?>
<?php endforeach; ?>

	</table>