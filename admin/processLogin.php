<?php 

require_once 'login.php';
include "../core/connection.php";


if(isset($_POST['save'])) {

    $NIK = mysqli_real_escape_string($mysqli,$_POST['nama']);
    $NAME = mysqli_real_escape_string($mysqli,$_POST['password']);

// echo $Username." ".$Password;

$QuerySelectData = mysqli_query($mysqli, "select * from tbl_data_siswa where nama = '".$Username."' and password_tmu = '".$Password."'");
$ResultQuerySelectData = mysqli_fetch_array($QuerySelectData);

if($ResultQuerySelectData){
    header ("Location: /pages/content/dashboard/dashboard.php");
    exit();
}else{
    header ("Location: ../");
    exit();
}
}

?>