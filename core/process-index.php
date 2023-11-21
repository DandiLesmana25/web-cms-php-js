<?php 
include "connection.php";

//>>>>>>>>>>>>>>>>>>>SECTION Berita Terkini<<<<<<<<<<<<<<<<<<<

$QueryGetDataBerita = mysqli_query($mysqli, "SELECT id_berita, judul_berita, isi_berita, image, tanggal_terbit, penulis FROM tbl_berita_terkini");

//Notifikasi Jika Gagal Mengambil Data
if(!$QueryGetDataBerita){
    $message = 'Kesalahan Terjadi Pada Proses Pengambilan Data User';
    echo "<body>".$message."</body>";
    }
    
?>