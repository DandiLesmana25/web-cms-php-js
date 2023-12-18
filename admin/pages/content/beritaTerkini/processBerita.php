<?php 
include "../../../../core/connection.php";

//<<<<<<<<<<<<<<<<<<<<<<<<<< edit >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
function tambah($data) {
	global $mysqli;

	$judulberita = htmlspecialchars($data["judulberita"]);
	$isiberita = htmlspecialchars($data["isiberita"]);
	$tanggalterbit = htmlspecialchars($data["tanggalterbit"]);
	$penulis = htmlspecialchars($data["penulis"]);

	// upload gambar
	$image = upload();
	if( !$image ) {
		return false;
	}

	$query = "INSERT INTO tbl_berita_terkini(judul_berita, isi_berita, tanggal_terbit, penulis, image) 
				VALUES
			  ('$judulberita', '$isiberita', '$tanggalterbit', '$penulis', '$image')
			";
	mysqli_query($mysqli, $query);

	return mysqli_affected_rows($mysqli);
}



//<<<<<<<<<<<<<<<<<<<<<<<<<< edit >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>



function edit($data) {
    global $mysqli;

	// $id = $data["id"];
	// $nama = htmlspecialchars($data["nama"]);
	// $tanggalmasuk = htmlspecialchars($data["tanggalmasuk"]);
	// $mapel = htmlspecialchars($data["mapel"]);
	// $jabatan = htmlspecialchars($data["jabatan"]);

	$id = $data["id"];
	$judulberita = htmlspecialchars($data["judulberita"]);
	$isiberita = htmlspecialchars($data["isiberita"]);
	$tanggalterbit = htmlspecialchars($data["tanggalterbit"]);
	$penulis = htmlspecialchars($data["penulis"]);

		// upload gambar
		$image = upload();
		if( !$image ) {
			return false;
		}

	$query = "UPDATE tbl_berita_terkini SET
				judul_berita = '$judulberita',
				isi_berita = '$isiberita',
				tanggal_terbit = '$tanggalterbit',
				penulis = '$penulis',
				image = '$image'
			  WHERE id_berita = $id
			";

            // var_dump($query); die;
	mysqli_query($mysqli, $query);

	return mysqli_affected_rows($mysqli);
}

function hapus($id) {
	global $mysqli;
	mysqli_query($mysqli, "DELETE FROM tbl_berita_terkini WHERE id_berita = $id");
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


function upload() {

	if (!isset($_FILES['image'])) {
        echo "<script>
                alert('File gambar tidak ditemukan!');
              </script>";
        return false;
    }
	
	$namaFile = $_FILES['image']['name'];
	$ukuranFile = $_FILES['image']['size'];
	$error = $_FILES['image']['error'];
	$tmpName = $_FILES['image']['tmp_name'];

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

	move_uploaded_file($tmpName, '../../../../assets/img/' . $namaFileBaru);

	return $namaFileBaru;
}



?>