<?php 
include "../../../../core/connection.php";


//>>>>>>>>>>>>>>>>>>> GET DATA ESKUL  <<<<<<<<<<<<<<<<<<<
$DataEskul = mysqli_query($mysqli, "SELECT id_ekstrakurikuler, nama_ekstrakurikuler, deskripsi, gambar FROM ekstrakurikuler;");

//<<<<<<<<<<<<<<<<<<<<<<<<<< edit >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
function tambah($data) {
	global $mysqli;

	$namaeskul = htmlspecialchars($data["namaeskul"]);
	$deskripsi = htmlspecialchars($data["deskripsi"]);
		$gambar = upload();
		if( !$gambar ) {
			return false;
		}
	


	$query = "INSERT INTO ekstrakurikuler(nama_ekstrakurikuler, deskripsi, gambar) 
				VALUES
			  ('$namaeskul', '$deskripsi', '$gambar')
			";
	mysqli_query($mysqli, $query);

	return mysqli_affected_rows($mysqli);
}



function upload() {

	if (!isset($_FILES['gambar'])) {
        echo "<script>
                alert('File gambar tidak ditemukan!');
              </script>";
        return false;
    }
	
	$namaFile = $_FILES['gambar']['name'];
	$ukuranFile = $_FILES['gambar']['size'];
	$error = $_FILES['gambar']['error'];
	$tmpName = $_FILES['gambar']['tmp_name'];

	// cek apakah tidak ada gambar yang diupload
	if( $error === 4 ) {
		echo "<script>
				alert('pilih gambar terlebih dahulu!');
			  </script>";
		return false;
	}

	// cek apakah yang diupload adalah gambar
	$ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
	$ekstensiGambar = explode('.', $namaFile);
	$ekstensiGambar = strtolower(end($ekstensiGambar));
	if( !in_array($ekstensiGambar, $ekstensiGambarValid) ) {
		echo "<script>
				alert('yang anda upload bukan gambar!');
			  </script>";
		return false;
	}

	// cek jika ukurannya terlalu besar
	if( $ukuranFile > 3000000 ) {
		echo "<script>
				alert('ukuran gambar terlalu besar!');
			  </script>";
		return false;
	}

	// lolos pengecekan, gambar siap diupload
	// generate nama gambar baru
	$namaFileBaru = uniqid();
	$namaFileBaru .= '.';
	$namaFileBaru .= $ekstensiGambar;

	move_uploaded_file($tmpName, '../../../../assets/img/eskul/' . $namaFileBaru);

	return $namaFileBaru;
}

//<<<<<<<<<<<<<<<<<<<<<<<<<< edit >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>



function edit($data) {
    global $mysqli;

	
	$id = $data["id"];
	$namaeskul = htmlspecialchars($data["namaeskul"]);
	$deskripsi = htmlspecialchars($data["deskripsi"]);
		$gambar = upload();
		if( !$gambar ) {
			return false;
		}

		$query = "UPDATE ekstrakurikuler SET
		nama_ekstrakurikuler = '$namaeskul',
		deskripsi = '$deskripsi',
		gambar = '$gambar'
	  WHERE id_ekstrakurikuler = $id
	";


            // var_dump($query); die;
	mysqli_query($mysqli, $query);

	return mysqli_affected_rows($mysqli);
}

function hapus($id) {
	global $mysqli;
	mysqli_query($mysqli, "DELETE FROM ekstrakurikuler WHERE id_ekstrakurikuler = $id");
	return mysqli_affected_rows($mysqli);
}


function query($query) {
	global $mysqli;
	$result = mysqli_query($mysqli, $query);
	$rows = [];
	while( $row = mysqli_fetch_assoc($result) ) {
		$rows[] = $row;
	}
	return $rows;
}
function cari($keyword) {
	$query = "SELECT * FROM tbl_berita_terkini
				WHERE
			  judul_berita LIKE '%$keyword%'
			";
	return query($query);
}






?>