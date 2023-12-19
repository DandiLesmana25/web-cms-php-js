<?php 
$ds = DIRECTORY_SEPARATOR;
$base_dir = realpath(dirname(__FILE__) . $ds . '../../../') . $ds;
require_once("{$base_dir}pages{$ds}content{$ds}ekstrakurikuler{$ds}processEkstrakurikuler.php");
// require_once '../../../../core/process-index.php';


$id = $_GET["id"];

if( hapus($id) > 0 ) {
	echo "
		<script>
			alert('data berhasil dihapus!');
			document.location.href = 'masterEkstrakurikuler.php';
		</script>
	";
} else {
	echo "
		<script>
			alert('data gagal dihapus!');
			document.location.href = 'masterBerita.php';
		</script>
	";
}

?>