<?php 
require_once 'core/process-index.php';
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />

    <title>Berita Terkini</title>
    <meta content="" name="description" />
    <meta content="" name="keywords" />

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon" />
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon" />

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=EB+Garamond:wght@400;500&family=Inter:wght@400;500&family=Playfair+Display:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet" />

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet" />
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet" />
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet" />
    <link href="assets/vendor/aos/aos.css" rel="stylesheet" />

    <!-- Template Main CSS Files -->
    <link href="assets/css/variables.css" rel="stylesheet" />
    <link href="assets/css/main.css" rel="stylesheet" />

    <!-- =======================================================
  * Template Name: ZenBlog
  * Updated: Sep 18 2023 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/zenblog-bootstrap-blog-template/
  * Author: BootstrapMade.com
  * License: https:///bootstrapmade.com/license/
  ======================================================== -->
  </head>

  <body>
  <?php 
  // $data=mysqli_fetch_array($QueryGetDataBerita);
//   // ambil data di URL
       $id = $_GET["id"];


       $result=  mysqli_query($mysqli, "SELECT * FROM tbl_berita_terkini WHERE id_berita = $id");
       $data = mysqli_fetch_assoc($result);


      ?>
    <main id="main">
      <section class="single-post-content">
        <div class="container" type="hidden" name="id" value="<?= $data["id_berita"]; ?>">
          <div class="row">
            <div class="col-md-9 post-content" data-aos="fade-up">
              <!-- ======= Single Post Content ======= -->
       
              <div class="single-post">
                <div class="post-meta"><span class="date">Business</span> <span class="mx-1">&bullet;</span> <span>Jul 5th '22</span></div>
                <h1 class="mb-5"><?php echo $data["judul_berita"]; ?></h1>
                <figure class="my-4">
                  <img src="assets/img/<?php echo $data["image"]; ?>" alt="" class="img-fluid" />
                  <figcaption>Image berita</figcaption>
                </figure> 
                <p>
                <?php echo $data["isi_berita"]; ?>
                </p>
              </div>
              <!-- End Single Post Content -->
            </div>
        </div>
      </section>
    </main>
    <!-- End #main -->

    <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>
  </body>
</html>
