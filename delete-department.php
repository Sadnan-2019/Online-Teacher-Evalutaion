<?php session_start();


if (empty($_SESSION['is_logged']) || $_SESSION['is_logged'] != md5(100)) {

    header("location: login.php");


}
$id = htmlentities($_GET['deptcode'], ENT_QUOTES);
//var_dump($id);
$link = mysqli_connect('localhost', 'root', '', 'evaluation');
$query=mysqli_query($link,"delete from department where deptcode='$id'");
header("location:showdepartment.php");






?>