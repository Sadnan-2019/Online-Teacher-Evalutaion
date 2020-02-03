<?php session_start();


if (empty($_SESSION['is_logged']) || $_SESSION['is_logged'] != md5(100)) {

    header("location: login.php");


}
$id = htmlentities($_GET['crid'], ENT_QUOTES);
$status = htmlentities($_GET['status'], ENT_QUOTES);
//echo $status; exit;

$link = mysqli_connect('localhost', 'root', '', 'evaluation');

 $query = "UPDATE `coursereg` SET `evaluationstatus` = '$status' WHERE crid='$id'";
$data = mysqli_query($link, $query);

header("location:showcoursereg.php");

?>