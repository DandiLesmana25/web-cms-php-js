<?php 

include "../../../../core/connection.php";
	

if(isset($_POST['save'])) {

    $Nama = mysqli_real_escape_string($mysqli,$_POST['nama']);
    // $TanggalLahir = mysqli_real_escape_string($mysqli,$_POST['tanggallahir']);
    $TanggalLahir = date('Y-m-d', strtotime($_POST['tanggallahir']));
    $Alamat = mysqli_real_escape_string($mysqli,$_POST['alamat']);
    $Jurusan = mysqli_real_escape_string($mysqli,$_POST['jurusan']);


// $QueryaddUser = "INSERT INTO tbl_data_siswa(nama, tanggal_lahir, alamat, jurusan, ) VALUES ('$Nama', '$TanggalLahir', '$Alamat', '$Jurusan')";

$QueryaddUser = "INSERT INTO tbl_data_siswa(nama, tanggal_lahir, alamat, jurusan) VALUES ('$Nama', '$TanggalLahir', '$Alamat', '$Jurusan')";

$result = mysqli_query($mysqli, $QueryaddUser);

if (!$result) {
    die("Error: " . mysqli_error($mysqli));
}



// jika simpan data berhasil dan gagal
if ($QueryaddUser) {
    echo "<script>
          alert('simpan data sukses !');

          </script>";
} else {
    echo "<script>
          alert('simpan data Gagal !!!!');
          document.location= '../masterUser/masterUser.php'

          </script>";

}

};



//<<<<<<<<<<<<<<<<<<<<<<<<<< edit >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>



function edit($data) {
    global $mysqli;

	$id = $data["id"];
	$nama = htmlspecialchars($data["nama"]);
	$tanggallahir = htmlspecialchars($data["tanggallahir"]);
	$jurusan = htmlspecialchars($data["jurusan"]);
	$alamat = htmlspecialchars($data["alamat"]);

	$query = "UPDATE tbl_data_siswa SET
				nama = '$nama',
				tanggal_lahir = '$tanggallahir',
				jurusan = '$jurusan',
				alamat = '$alamat'
			  WHERE id = $id
			";

            // var_dump($query); die;
	mysqli_query($mysqli, $query);

	return mysqli_affected_rows($mysqli);
}

function hapus($id) {
	global $mysqli;
	mysqli_query($mysqli, "DELETE FROM tbl_data_siswa WHERE id = $id");
	return mysqli_affected_rows($mysqli);
}




?>