<?php 
include "connection.php";



//>>>>>>>>>>>>>>>>>>>GET DATA Siswa<<<<<<<<<<<<<<<<<<<

$QueryGetListSiswa = mysqli_query($mysqli, "SELECT id, nama, tanggal_lahir, alamat, jurusan FROM tbl_data_siswa;");

//Notifikasi Jika Gagal Mengambil Data
if(!$QueryGetListSiswa){
$message = 'Kesalahan Terjadi Pada Proses Pengambilan Data User';
echo "<body>".$message."</body>";
}


//>>>>>>>>>>>>>>>>>>>GET DATA Guru<<<<<<<<<<<<<<<<<<<

$GetDataGuru = mysqli_query($mysqli, "SELECT id, nama, tanggal_masuk, mapel, jabatan FROM tbl_data_guru;");

//Notifikasi Jika Gagal Mengambil Data
if(!$GetDataGuru){
$message = 'Kesalahan Terjadi Pada Proses Pengambilan Data User';
echo "<body>".$message."</body>";
}







//>>>>>>>>>>>>>>>>>>>SECTIOn GEt Berita Terkini<<<<<<<<<<<<<<<<<<<

$QueryGetDataBerita = mysqli_query($mysqli, "SELECT id_berita, judul_berita, isi_berita, image, tanggal_terbit, penulis FROM tbl_berita_terkini");

//Notifikasi Jika Gagal Mengambil Data
if(!$QueryGetDataBerita){
    $message = 'Kesalahan Terjadi Pada Proses Pengambilan Data User';
    echo "<body>".$message."</body>";
    }
          
//>>>>>>>>>>>>>>>>>>> DATA JUMLAH SISWA dan guru  <<<<<<<<<<<<<<<<<<<

$JumlahSiswa = mysqli_query($mysqli, "SELECT COUNT(*) AS jumlah_siswa FROM tbl_data_siswa;");
// as == nama kolom seementara

    $JumlahGuru = mysqli_query($mysqli, "SELECT COUNT(*) AS jumlah_guru FROM tbl_data_guru;");
    // as == nama kolom seementara
    
    
    
//>>>>>>>>>>>>>>>>>>> GET DATA ESKUL  <<<<<<<<<<<<<<<<<<<
$DataEskul = mysqli_query($mysqli, "SELECT id_ekstrakurikuler, nama_ekstrakurikuler, deskripsi, gambar FROM ekstrakurikuler;");

?>