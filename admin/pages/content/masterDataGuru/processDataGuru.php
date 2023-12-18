<?php 

include "../../../../core/connection.php";
	

if(isset($_POST['save'])) {

    $Nama = mysqli_real_escape_string($mysqli,$_POST['nama']);
    $TanggalMasuk = date('Y-m-d', strtotime($_POST['tanggalmasuk']));
    $Mapel = mysqli_real_escape_string($mysqli,$_POST['mapel']);
    $Jabatan = mysqli_real_escape_string($mysqli,$_POST['jabatan']);


// $QueryaddUser = "INSERT INTO tbl_data_siswa(nama, tanggal_lahir, alamat, jurusan, ) VALUES ('$Nama', '$TanggalLahir', '$Alamat', '$Jurusan')";

$AddData = "INSERT INTO tbl_data_guru(nama, tanggal_masuk, mapel, jabatan) VALUES ('$Nama', '$TanggalMasuk', '$Mapel', '$Jabatan')";

$result = mysqli_query($mysqli, $AddData);

if (!$result) {
    die("Error: " . mysqli_error($mysqli));
}



// jika simpan data berhasil dan gagal
if ($AddData) {
    echo "<script>
          alert('simpan data sukses !');
		  document.location= '../masterDataGuru/masterDataGuru.php'

          </script>";
} else {
    echo "<script>
          alert('simpan data Gagal !!!!');
       

          </script>";

}

};



//<<<<<<<<<<<<<<<<<<<<<<<<<< edit >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>



function edit($data) {
    global $mysqli;

	$id = $data["id"];
	$nama = htmlspecialchars($data["nama"]);
	$tanggalmasuk = htmlspecialchars($data["tanggalmasuk"]);
	$mapel = htmlspecialchars($data["mapel"]);
	$jabatan = htmlspecialchars($data["jabatan"]);

	$query = "UPDATE tbl_data_guru SET
				nama = '$nama',
				tanggal_masuk = '$tanggalmasuk',
				mapel = '$mapel',
				jabatan = '$jabatan'
			  WHERE id = $id
			";

            // var_dump($query); die;
	mysqli_query($mysqli, $query);

	return mysqli_affected_rows($mysqli);
}

function hapus($id) {
	global $mysqli;
	mysqli_query($mysqli, "DELETE FROM tbl_data_guru WHERE id = $id");
	return mysqli_affected_rows($mysqli);
}




?>