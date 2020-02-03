<?php session_start();


if (empty($_SESSION['is_logged']) || $_SESSION['is_logged'] != md5(100)) {

    header("location: login.php");


}
$id = htmlentities($_GET['id'], ENT_QUOTES);
$course = htmlentities($_GET['course'], ENT_QUOTES);
//$status = htmlentities($_GET['status'], ENT_QUOTES);
//echo $status; exit;
//$sql = "UPDATE `coursereg` SET `status` = '0' WHERE `coursereg`.`crid` = 14";
$link = mysqli_connect('localhost', 'root', '', 'evaluation');

$query = "UPDATE `coursereg` SET `status` = '1' , `evaluationstatus` = '1' WHERE crid='$id'";
$data = mysqli_query($link, $query);
header("location:userlogout.php");
?>