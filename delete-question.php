<?php session_start();


if (empty($_SESSION['is_logged']) || $_SESSION['is_logged'] != md5(100)) {

    header("location: login.php");


}
$id = htmlentities($_GET['QuestionId'], ENT_QUOTES);
$link = mysqli_connect('localhost', 'root', '', 'evaluation');
$query=mysqli_query($link,"delete from questions where QuestionId='$id'");
header("location:showquestion.php");






?>