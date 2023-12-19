
<?php 
$ds = DIRECTORY_SEPARATOR;
$base_dir = realpath(dirname(__FILE__) . $ds . '../../../') . $ds;
require_once("{$base_dir}pages{$ds}core{$ds}header.php");
require_once("{$base_dir}pages{$ds}content{$ds}ekstrakurikuler{$ds}processEkstrakurikuler.php");


// ambil data di URL
$id = $_GET["id"];


// query data mahasiswa berdasarkan id
$result=  mysqli_query($mysqli, "SELECT * FROM ekstrakurikuler WHERE id_ekstrakurikuler = $id");
$dataEskul = mysqli_fetch_assoc($result);

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
        document.location.href = 'masterEkstrakurikuler.php';
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
      			  <input type="hidden" name="id" value="<?= $dataEskul["id_ekstrakurikuler"]; ?>">
                <div class="col-md-4">
                  <label for="validationCustom01" class="form-label">Nama Eskul</label>
                  <input type="text" name="namaeskul" class="form-control" id="validationCustom01" value="<?= $dataEskul["nama_ekstrakurikuler"]; ?>" required>
                  <div class="valid-feedback">
                    Looks good!
                  </div>
                </div>
                <div class="col-md-4">
                  <label for="validationCustom02" class="form-label">Deskripsi</label>
                  <input type="text"  id="deskripsi" name="deskripsi"  class="form-control" id="validationCustom02" value="<?= $dataEskul["deskripsi"]; ?>" required>
                  <!-- <label for="tanggal_lahir">Tanggal Lahir:</label>
                   <input type="date" id="tanggal_lahir" name="tanggal_lahir" required><br> -->
                  <div class="valid-feedback">
                    Looks good!
                  </div>
                </div>
    
                <div class="col-md-6">
                  <label for="gambar" class="form-label">image</label>
                  <input type="file" name="gambar"  class="form-control" id="gambar" value="<?= $dataEskul["gambar"]; ?>" required>
                  <div class="invalid-feedback">
                    Please provide a valid image.
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