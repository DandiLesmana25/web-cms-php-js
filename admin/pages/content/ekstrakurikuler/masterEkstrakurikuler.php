
<?php 
$ds = DIRECTORY_SEPARATOR;
$base_dir = realpath(dirname(__FILE__) . $ds . '../../../') . $ds;
require_once("{$base_dir}pages{$ds}core{$ds}header.php");
require_once("{$base_dir}pages{$ds}content{$ds}ekstrakurikuler{$ds}processEkstrakurikuler.php");


// $berita = mysqli_query($mysqli, "SELECT * FROM tbl_berita_terkini");
// if(!$berita){
// 	$message = 'Kesalahan Terjadi Pada Proses Pengambilan Data User';
// 	echo "<body>".$message."</body>";
// 	}


?>
  


	
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
			<a href="addEkstrakurikuler.php" class="btn btn-primary"><i class="bi bi-person-fill-add"></i>Add Berita</a>
			</p>

			<!-- Table with stripped rows -->
			<table class="table datatable">
			  <thead>
				<tr>
				  <th scope="col">NO</th>
				  <th scope="col">Nama Ekstrakulikuler</th>
				  <th scope="col">deskripsi</th>
				  <th scope="col">Gambar</th>
				  <th scope="col">Aksi</th>
				</tr>
			  </thead>
			  <tbody>

			  <?php $no = 0?>
	        <?php foreach( $DataEskul as $row ) : ?>
			 <?php 

			 $no++;

			 echo "<tr>";
			 echo "<th scope='row'>".$no."</th>";
			 echo "<td>".$row["nama_ekstrakurikuler"]."</td>";
			 echo "<td>".$row["deskripsi"]."</td>";
			echo "<td><img src='../../../../assets/img/eskul/" . $row["gambar"] . "' width='50'></td>";
			 
			echo "<td><a href='editEkstrakurikuler.php?id={$row['id_ekstrakurikuler']}'>Edit</a> | 
           <a href='hapusEkstrakurikuler.php?id={$row['id_ekstrakurikuler']}' onclick=\"return confirm('Yakin?');\">Hapus</a>
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