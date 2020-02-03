<?php session_start();


if (empty($_SESSION['is_logged']) || $_SESSION['is_logged'] != md5(100)) {

    header("location: login.php");


}
$id = htmlentities($_GET['teacherid'], ENT_QUOTES);

$link = mysqli_connect('localhost', 'root', '', 'evaluation');

if (!empty($_POST)) {

    $addteacher = htmlentities($_POST['teacher'], ENT_QUOTES);
    $addname = htmlentities($_POST['name'], ENT_QUOTES);
    $addemail = htmlentities($_POST['email'], ENT_QUOTES);
    $adddept = htmlentities($_POST['dept'], ENT_QUOTES);


    //$data = mysqli_query($link, "INSERT INTO courseteacher (teacherid,courseid,year,semester) values('$addteacher','$addcourse','$addyear','$addsemester')");
    $data = mysqli_query($link, "update teacher set teacherid = '$addteacher',teachername = '$addname',email ='$addemail',  deptcode = '$adddept' where teacherid='$id'");

    header("location:showteacher.php");
}
$sql = "select * from teacher where teacherid='$id'";
$link = mysqli_connect('localhost', 'root', '', 'evaluation');
$result = mysqli_query($link, $sql);
$data = mysqli_fetch_assoc($result);

?>


<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
          integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">


    <style>


        .admin {

            border: 2px solid #23148b;
            margin: 120px auto;

        }

    </style>
</head>
<body>
<div class="container">


    <div class="row">


        <div class="col-md-4 admin ">
            <a href="showteacher.php"> <button type="submit" class="btn btn-primary" style="margin-right:5%;margin-top: 2%;">Back</button></a>


            <form method="post">

                <div class="form-group" >
                    <label>Deptcode</label>
                    <input type="text" class="form-control" name="dept" value="<?= $data['deptcode'] ?>">
                <div class="form-group">
                    <label>Teacher ID</label>
                    <input type="text" class="form-control" name="teacher" value="<?= $data['teacherid'] ?>">
                </div>
                <div class="form-group">
                    <label>Teacher Name</label>
                    <input type="text" class="form-control" name="name" value="<?= $data['teachername'] ?>">
                </div>
                <div class="form-group">
                    <label>Email </label>
                    <input type="email" class="form-control" name="email" value="<?= $data['email'] ?>">
                </div>


                <button type="submit" class="btn btn-primary" style="margin-top: 2%;margin-left: 40%;">SAVE</button>
            </form>


        </div>
    </div>
</div>
</body>
</html>