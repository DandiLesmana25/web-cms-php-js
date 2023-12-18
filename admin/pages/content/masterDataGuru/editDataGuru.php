
<?php 
$ds = DIRECTORY_SEPARATOR;
$base_dir = realpath(dirname(__FILE__) . $ds . '../../../') . $ds;
require_once("{$base_dir}pages{$ds}core{$ds}header.php");
require_once("{$base_dir}pages{$ds}content{$ds}masterDataGuru{$ds}processDataGuru.php");


// ambil data di URL
$id = $_GET["id"];

// query data mahasiswa berdasarkan id
$result=  mysqli_query($mysqli, "SELECT * FROM tbl_data_guru WHERE id = $id");
$guru = mysqli_fetch_assoc($result);


// cek apakah tombol submit sudah ditekan atau belum
if( isset($_POST["submit"]) ) {

	var_dump($_POST); 

	
	// cek apakah data berhasil diubah atau tidak
	if( edit($_POST) > 0 ) {
		echo "
			<script>
				alert('data berhasil diubah!');
				document.location.href = 'masterDataGuru.php';
			</script>
		";
	} else {
		echo "
			<script>
				alert('data gagal diubah!');
				document.location.href = 'index.php';
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
              <form action="" method="POST" class="row g-3 needs-validation" novalidate>
      			  <input type="hidden" name="id" value="<?= $guru["id"]; ?>">
                <div class="col-md-4">
                  <label for="validationCustom01" class="form-label">Nama</label>
                  <input type="text" name="nama" class="form-control" id="validationCustom01" value="<?= $guru["nama"]; ?>" required>
                  <div class="valid-feedback">
                    Looks good!
                  </div>
                </div>
                <div class="col-md-4">
                  <label for="validationCustom02" class="form-label">Tanggal Masuk</label>
                  <input type="date"  id="tanggalmasuk" name="tanggalmasuk"  class="form-control" id="validationCustom02" value="<?= $guru["tanggal_masuk"]; ?>" required>
                  <!-- <label for="tanggal_lahir">Tanggal Lahir:</label>
                   <input type="date" id="tanggal_lahir" name="tanggal_lahir" required><br> -->
                  <div class="valid-feedback">
                    Looks good!
                  </div>
                </div>
    
                <div class="col-md-6">
                  <label for="validationCustom03" class="form-label">Mapel</label>
                  <input type="text" name="mapel"  class="form-control" id="validationCustom03" value="<?= $guru["mapel"]; ?>" required>
                  <div class="invalid-feedback">
                    Please provide a valid city.
                  </div>
                </div>
                <div class="col-md-3">
                  <label for="validationCustom05" class="form-label">Jabatan</label>
                  <input type="text" name="jabatan"  class="form-control" id="validationCustom05" value="<?= $guru["jabatan"]; ?>" required>
                  <div class="invalid-feedback">
                    Please provide a valid zip.
                  </div>
                </div>
                <div class="col-12">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                    <label class="form-check-label" for="invalidCheck">
                      Agree to terms and conditions
                    </label>
                    <div class="invalid-feedback">
                      You must agree before submitting.
                    </div>
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