
<?php 
$ds = DIRECTORY_SEPARATOR;
$base_dir = realpath(dirname(__FILE__) . $ds . '../../../') . $ds;
require_once("{$base_dir}pages{$ds}core{$ds}header.php");
// require_once("{$base_dir}pages{$ds}content{$ds}MasterUser{$ds}processMasterUser.php");
require_once '../../../../core/process-index.php'

?>
  

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
                <a href="addDataGuru.php" class="btn btn-primary"><i class="bi bi-person-fill-add"></i>Add User</a>
                </p>

                <!-- Table with stripped rows -->
                <table class="table datatable">
                  <thead>
                    <tr>
                      <th scope="col">NO</th>
                      <th scope="col">NIK</th>
                      <th scope="col">Name</th>
                      <th scope="col">address</th>
                      <th scope="col">Gender</th>
                      <th scope="col">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                       <?php 

                 $no = 0;
                 while($row=mysqli_fetch_array($GetDataGuru)) {
                 $no++;

                 echo "<tr>";
                 echo "<th scope='row'>".$no."</th>";
                 echo "<td>".$row["nama"]."</td>";
                 echo "<td>".$row["tanggal_masuk"]."</td>";
                 echo "<td>".$row["mapel"]."</td>";
                 echo "<td>".$row["jabatan"]."</td>";
                //  echo "<td>"<a href="masterUserEdit.php?id=<?= $row["id"]; ubah</a>"</td>";
                echo "<td><a href='editDataGuru.php?id=" . $row["id"] . "'>Edit</a> | 
                <a href='hapusDataGuru.php?id=" . $row["id"] . "' onclick='return confirm(\"Yakin?\");'>Hapus</a>
                </td>";

                 }


                ?>  
                  </tbody>
                </table>
                <!-- End Table with stripped rows -->
              </div>
            </div>
          </div>
      </div>
    </section>

  </main><!-- End #main -->


  <?php 
require_once("{$base_dir}pages{$ds}core{$ds}footer.php");
?>