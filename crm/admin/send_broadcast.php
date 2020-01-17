<?php


session_start();
include("dbconnection.php");
include("checklogin.php");
check_login();


$sql_last_id = 'SELECT id_broadcast FROM broadcast ORDER BY id_broadcast DESC';
$last_id_query = mysqli_query($con, $sql_last_id);
$last_id_object = mysqli_fetch_assoc($last_id_query);
$last_id = $last_id_object['id_broadcast'] + 1;


$idAdmin = $_SESSION['id'];
$pesan = addslashes($_POST["editordata"]);
$subject = $_POST["subject"];
$tgl_start = date('Y-m-d', strtotime($_POST['tanggal_start']));
$tanggal_start = $tgl_start;

$sql = "INSERT into broadcast values('$last_id', '$idAdmin', '$subject','$subject','$tanggal_start');";






if (mysqli_query($con, $sql)) {
    foreach($_POST['name'] as $id_user){
        mysqli_query($con, "INSERT INTO det_broadcast VALUES( $id_user, $last_id)");
    }
    header ('Location: make_broadcast.php');
    } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($con);
    }

?>
