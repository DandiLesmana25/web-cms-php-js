
<?php 
$ds = DIRECTORY_SEPARATOR;
$base_dir = realpath(dirname(__FILE__) . $ds . '../../../') . $ds;
require_once("{$base_dir}pages{$ds}core{$ds}header.php");
require_once("{$base_dir}pages{$ds}content{$ds}beritaTerkini{$ds}processBerita.php");


if( isset($_POST["savedata"]) ) {


  
	
	// cek apakah data berhasil di tambahkan atau tidak
	if( tambah($_POST) > 0 ) {
		echo "
			<script>
				alert('data berhasil ditambahkan!');
        document.location= 'masterBerita.php'
			</script>
		";
	} else {
		echo "
			<script>
				alert('data gagal ditambahkan!');
			</script>
		";
	}


}
?>
?>
  

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Add berita</h1>
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
              <form action="" method="POST" class="row g-3 needs-validation" enctype="multipart/form-data"novalidate>
                <div class="col-md-4">
                  <label for="validationCustom01" class="form-label">judulberita</label>
                  <input type="text" name="judulberita" class="form-control" id="validationCustom01" required>
                  <div class="valid-feedback">
                    Looks good!
                  </div>
                </div>
                <div class="col-md-4">
                  <label for="validationCustom02" class="form-label">Isi Berita</label>
                  <input type="text"  id="isiberita" name="isiberita"  class="form-control" id="validationCustom02" value="Doe" required>
                  <!-- <label for="tanggal_lahir">Tanggal Lahir:</label>
                   <input type="date" id="tanggal_lahir" name="tanggal_lahir" required><br> -->
                  <div class="valid-feedback">
                    Looks good!
                  </div>
                </div>
    
                <div class="col-md-6">
                  <label for="image" class="form-label">image</label>
                  <input type="file" name="image" id="image"  class="form-control">
                  <div class="invalid-feedback">
                    Please provide a valid image.
                  </div>
                </div>
                <div class="col-md-3">
                  <label for="tanggalterbit" class="form-label">tanggal_terbit</label>
                  <input type="date" name="tanggalterbit"  class="form-control" id="tanggalterbit" required>
                  <div class="invalid-feedback">
                    Please provide a valid zip.
                  </div>
                </div>
                <div class="col-md-3">
                  <label for="validationCustom05" class="form-label">penulis</label>
                  <input type="text" name="penulis"  class="form-control" id="validationCustom05" required>
                  <div class="invalid-feedback">
                    Please provide a valid zip.
                  </div>
                </div>
        
                <div class="col-12">
                  <button class="btn btn-primary" type="submit" name="savedata" >Submit form</button>
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