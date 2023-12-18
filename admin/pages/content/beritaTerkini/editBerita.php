
<?php 
$ds = DIRECTORY_SEPARATOR;
$base_dir = realpath(dirname(__FILE__) . $ds . '../../../') . $ds;
require_once("{$base_dir}pages{$ds}core{$ds}header.php");
require_once("{$base_dir}pages{$ds}content{$ds}beritaTerkini{$ds}processBerita.php");


// ambil data di URL
$id = $_GET["id"];


// query data mahasiswa berdasarkan id
$result=  mysqli_query($mysqli, "SELECT * FROM tbl_berita_terkini WHERE id_berita = $id");
$beritaData = mysqli_fetch_assoc($result);

var_dump($id);
echo '$id';


// $query = "SELECT * FROM tbl_berita_terkini WHERE id = $id";
// $result = mysqli_query($mysqli, $query);



// cek apakah tombol submit sudah ditekan atau belum
if( isset($_POST["submit"]) ) {

	var_dump($_POST); 

	
	// cek apakah data berhasil diubah atau tidak
	if( edit($_POST) > 0 ) {
		echo "
			<script>
				alert('data berhasil diubah!');
        document.location.href = 'masterBerita.php';
			</script>
		";
	} else {
		echo "
			<script>
				alert('data gagal diubah!');
			</script>
		";
	}


}


?>
  
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Add User</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="../dashboard/dashboard.php">Home</a></li>
          <li class="breadcrumb-item active"><a href="masterUserAdd.php">Master User</a></li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">
      <div class="col-lg-12">
        
      <div class="card">
            <div class="card-body">
              <h5 class="card-title">Custom Styled Validation</h5>
              <p>For custom Bootstrap form validation messages, you’ll need to add the <code>novalidate</code> boolean attribute to your <code>&lt;form&gt;</code>. This disables the browser default feedback tooltips, but still provides access to the form validation APIs in JavaScript. </p>

              <!-- Custom Styled Validation -->
              <form action="" method="POST" enctype="multipart/form-data" class="row g-3 needs-validation" novalidate>
      			  <input type="hidden" name="id" value="<?= $beritaData["id_berita"]; ?>">
                <div class="col-md-4">
                  <label for="validationCustom01" class="form-label">Judul Berita</label>
                  <input type="text" name="judulberita" class="form-control" id="validationCustom01" value="<?= $beritaData["judul_berita"]; ?>" required>
                  <div class="valid-feedback">
                    Looks good!
                  </div>
                </div>
                <div class="col-md-4">
                  <label for="validationCustom02" class="form-label">Isi Berita</label>
                  <input type="text"  id="isiberita" name="isiberita"  class="form-control" id="validationCustom02" value="<?= $beritaData["isi_berita"]; ?>" required>
                  <!-- <label for="tanggal_lahir">Tanggal Lahir:</label>
                   <input type="date" id="tanggal_lahir" name="tanggal_lahir" required><br> -->
                  <div class="valid-feedback">
                    Looks good!
                  </div>
                </div>
    
                <div class="col-md-6">
                  <label for="image" class="form-label">image</label>
                  <input type="file" name="image"  class="form-control" id="image" value="<?= $beritaData["image"]; ?>" required>
                  <div class="invalid-feedback">
                    Please provide a valid city.
                  </div>
                </div>
                <div class="col-md-3">
                  <label for="validationCustom05" class="form-label">Tanggal Terbit </label>
                  <input type="date" name="tanggalterbit"  class="form-control" id="validationCustom05" value="<?= $beritaData["tanggal_terbit"]; ?>" required>
                  <div class="invalid-feedback">
                    Please provide a valid zip.
                  </div>
                </div>
                <div class="col-md-3">
                  <label for="validationCustom05" class="form-label">Penulis</label>
                  <input type="text" name="penulis"  class="form-control" id="validationCustom05" value="<?= $beritaData["penulis"]; ?>" required>
                  <div class="invalid-feedback">
                    Please provide a valid zip.
                  </div>
                </div>
                <div class="col-12">
                  <button class="btn btn-primary" type="submit" name="submit" >Submit form</button>
                </div>
              </form><!-- End Custom Styled Validation -->

            </div>
          </div>
          </div>
      </div>
    </section>

  </main><!-- End #main -->




  <?php 
require_once("{$base_dir}pages{$ds}core{$ds}footer.php");
?>