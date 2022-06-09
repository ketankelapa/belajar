<?php

//koneksi ke database
$koneksi = mysqli_connect("localhost", "root", "", "data");

function query($query)
{
    global $koneksi;
    $result = mysqli_query($koneksi, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function tambah($data)
{
    global $koneksi;

    //htmlspecialchars supaya yg di masukin bukan scrip html
    $merek = htmlspecialchars($data["merek"]);
    $tipe = htmlspecialchars($data["tipe"]);
    $tahun = htmlspecialchars($data["tahun"]);
    $kondisi = htmlspecialchars($data["kondisi"]);
    $stok = htmlspecialchars($data["stok"]);
    $warna = htmlspecialchars($data["warna"]);

    //upload gambar
    $gambar = upload();
    if (!$gambar) {
        return false;
    }

    //query insert data
    $query = "INSERT INTO hp
			VALUES
			(0, '$merek', '$tipe', '$tahun', '$kondisi', '$stok', '$warna', '$gambar')
			";
    mysqli_query($koneksi, $query);
    return mysqli_affected_rows($koneksi);

}

function upload()
{

    $namaFile = $_FILES['gambar']['name'];
    $ukuranFile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];

    // cek apakah tidak ada gambar yang di upload
    if ($error == 4) {
        echo "<script>
				alert('pilih gambar terlebih dahulu!');
			</script>";
        return false;
    }

    //cek apakah yang diupload adalah gambar
    $ektensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ektensiGambar = explode('.', $namaFile);
    $ektensiGambar = strtolower(end($ektensiGambar));
    if (!in_array($ektensiGambar, $ektensiGambarValid)) {
        echo "<script>
				alert('yang anda upload bukan gambar');
			</script>";
        return false;
    }
    //cek jika ukurannya terlalu besar
    if ($ukuranFile > 1000000) {
        echo "<script>
				alert('ukuran gambar terlalu besar');
			</script>";
        return false;
    }

    //lolos pengecekan, gambar siap di upload
    //generate nama gambar baru
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ektensiGambar;

    move_uploaded_file($tmpName, 'img/' . $namaFileBaru);
    return $namaFileBaru;

}

function hapus($id)
{
    global $koneksi;
    mysqli_query($koneksi, "DELETE FROM hp WHERE id = $id");
    return mysqli_affected_rows($koneksi);
}

function ubah($data)
{
    global $koneksi;

    $id = $data["id"];
    $merek = htmlspecialchars($data["merek"]);
    $tipe = htmlspecialchars($data["tipe"]);
    $tahun = htmlspecialchars($data["tahun"]);
    $kondisi = htmlspecialchars($data["kondisi"]);
    $stok = htmlspecialchars($data["stok"]);
    $warna = htmlspecialchars($data["warna"]);
    $gambarlama = htmlspecialchars($data["gambarlama"]);

    //cek apakah use pilih gambar baru atau tidak
    if ($_FILES['gambar']['error'] == 4) {
        $gambar = $gambarlama;
    } else {
        $gambar = upload();
    }

    //query insert data
    $query = "UPDATE hp SET
			merek ='$merek',
			tipe = '$tipe',
			tahun = '$tahun',
			kondisi = '$kondisi',
			stok = '$stok',
			warna = '$warna',
			gambar = '$gambar'
			WHERE id = $id
			";
    mysqli_query($koneksi, $query);
    return mysqli_affected_rows($koneksi);

}

function cari($keyword, $awaldata = null, $Jumlahdataperhalaman = null)
{
    $query = "SELECT * FROM hp
				WHERE
				merek LIKE '%$keyword%' OR
				tipe LIKE '%$keyword%' OR
				tahun LIKE '%$keyword%' OR
				kondisi LIKE '%$keyword%' OR
				stok LIKE '%$keyword%' OR
				warna LIKE '%$keyword%'

	";
    //disini abg buat dia cek ada kebutuhan pakai halaman apa engga
    if (isset($awaldata)) {

        $query = $query . " LIMIT $awaldata, $Jumlahdataperhalaman";
    }
    return query($query);
}

function registerasi($data)
{
    global $koneksi;

    $username = strtolower(stripcslashes($data["username"]));
    $password = mysqli_real_escape_string($koneksi, $data["password"]);
    $password2 = mysqli_real_escape_string($koneksi, $data["password2"]);

    //cek username sudah ada atau belum
    $result = mysqli_query($koneksi, "SELECT username FROM user WHERE username = '$username'");
    if (mysqli_fetch_assoc($result)) {
        echo "<script>
				alert('Username Sudah Tersedia')
			</script>";
        return false;
    }

    //cek konfirmasi password
    if ($password !== $password2) {
        echo "<script>
				alert('konfirmasi password Salah!')
			</script>";
        return false;
    }

    //enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    //tambahkan userbaru ke database
    mysqli_query($koneksi, "INSERT INTO user VALUES(0, '$username', '$password')");

    return mysqli_affected_rows($koneksi);

}
