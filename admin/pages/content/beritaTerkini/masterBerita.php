
<?php 
$ds = DIRECTORY_SEPARATOR;
$base_dir = realpath(dirname(__FILE__) . $ds . '../../../') . $ds;
require_once("{$base_dir}pages{$ds}core{$ds}header.php");
require_once("{$base_dir}pages{$ds}content{$ds}beritaTerkini{$ds}processBerita.php");
require_once '../../../../core/process-index.php';


$berita = mysqli_query($mysqli, "SELECT * FROM tbl_berita_terkini");
if(!$berita){
	$message = 'Kesalahan Terjadi Pada Proses Pengambilan Data User';
	echo "<body>".$message."</body>";
	}


?>
  

<!-- <!DOCTYPE html>
<html>
<head>
	<title>Halaman Admin</title>
</head>
<body>

<h1>Daftar Berita</h1>

<a href="editDataGuru.php">Tambah data mahasiswa</a>
<br><br>

<form action="" method="post">

	<input type="text" name="keyword" size="40" autofocus placeholder="masukkan keyword pencarian.." autocomplete="off">
	<button type="submit" name="cari">Cari!</button>
	
</form>

<br>
<table border="1" cellpadding="10" cellspacing="0">

	<tr>
		<th>No.</th>
		<th>Aksi</th>
		<th>Judul Berita</th>
		<th>Isi Berita</th>
		<th>Tanggal terbit</th>
		<th>Penulis</th>
		<th>Gambar</th>
	</tr>


	
</table> -->

<main id="main" class="main">

<div class="pagetitle">
  <h1>Master User</h1>
  <nav>
	<ol class="breadcrumb">
	  <li class="breadcrumb-item"><a href="index.html">Home</a></li>
	  <li class="breadcrumb-item active">Master Data Guru</li>
	</ol>
  </nav>
</div><!-- End Page Title -->

<section class="section dashboard">
  <div class="row">
  <div class="col-lg-12">
		<div class="card">
		  <div class="card-body">
			<h5 class="card-title">Data User</h5>
			<p>
			<a href="addBerita.php" class="btn btn-primary"><i class="bi bi-person-fill-add"></i>Add Berita</a>
			</p>

			<!-- Table with stripped rows -->
			<table class="table datatable">
			  <thead>
				<tr>
				  <th scope="col">NO</th>
				  <th scope="col">judul_berita</th>
				  <th scope="col">isi_berita</th>
				  <th scope="col">tanggal_terbit</th>
				  <th scope="col">penulis</th>
				  <th scope="col">Gambar</th>
				  <th scope="col">Aksi</th>
				</tr>
			  </thead>
			  <tbody>

			  <?php $no = 0?>
	        <?php foreach( $berita as $row ) : ?>
			 <?php 

			 $no++;

			 echo "<tr>";
			 echo "<th scope='row'>".$no."</th>";
			 echo "<td>".$row["judul_berita"]."</td>";
			 echo "<td>".$row["isi_berita"]."</td>";
			 echo "<td>".$row["tanggal_terbit"]."</td>";
			 echo "<td>".$row["penulis"]."</td>";
			//  echo "<td>".$row["image"]."</td>";
			echo "<td><img src='../../../../assets/img/" . $row["image"] . "' width='50'></td>";
			 
			echo "<td><a href='editBerita.php?id={$row['id_berita']}'>Edit</a> | 
           <a href='hapusBerita.php?id={$row['id_berita']}' onclick=\"return confirm('Yakin?');\">Hapus</a>
           </td>";

			?>  
				<?php endforeach; ?>
			  </tbody>
			</table>
			<!-- End Table with stripped rows -->
		  </div>
		</div>
	  </div>
  </div>
</section>

</main><!-- End #main -->


</body>
</html>

  <?php 
require_once("{$base_dir}pages{$ds}core{$ds}footer.php");
?>