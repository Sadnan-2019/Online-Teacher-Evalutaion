<?php session_start();


if (empty($_SESSION['is_logged']) || $_SESSION['is_logged'] != md5(100)) {

    header("location: login.php");


}
$id = htmlentities($_GET['cid'], ENT_QUOTES);
$status = htmlentities($_GET['status'], ENT_QUOTES);
//echo $status; exit;

    $link = mysqli_connect('localhost', 'root', '', 'evaluation');

    $query = "UPDATE `courseteacher` SET `enablestatus` = '$status' WHERE cid='$id'";
    $data = mysqli_query($link, $query);

    header("location:showteachercourses.php");

?>