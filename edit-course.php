<?php session_start();


if (empty($_SESSION['is_logged']) || $_SESSION['is_logged'] != md5(100)) {

    header("location: login.php");


}
$id = htmlentities($_GET['courseid'], ENT_QUOTES);


if (!empty($_POST)) {

    $addcourseid = htmlentities($_POST['course'], ENT_QUOTES);
    $addcoursetitle = htmlentities($_POST['title'], ENT_QUOTES);
    $addcoursecredit = htmlentities($_POST['credit'], ENT_QUOTES);
    $adddept = htmlentities($_POST['dept'], ENT_QUOTES);



    $query = "update course set courseid = '$addcourseid',coursetitle = '$addcoursetitle',coursecredit ='$addcoursecredit',  deptcode = '$adddept' where courseid='$id'";

    $link = mysqli_connect('localhost', 'root', '', 'evaluation');
    //$data = mysqli_query($link, "INSERT INTO courseteacher (teacherid,courseid,year,semester) values('$addteacher','$addcourse','$addyear','$addsemester')");
    $data = mysqli_query($link, $query);

    header("location:showcourse.php");
}
$sql = "select * from course where courseid='$id'";
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
    <title>Doccument</title>
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
            <a href="showcourse.php"> <button type="submit" class="btn btn-primary" style="margin-right:5%;margin-top: 2%;">Back</button></a>


            <form method="post">
                <div class="form-group">
                    <label>Deptcode</label>
                    <input type="text" class="form-control" name="dept" value="<?= $data['deptcode'] ?>">
                </div>
                <div class="form-group">
                    <label>Course ID</label>
                    <input type="text" class="form-control" name="course" value="<?= $data['courseid'] ?>">
                </div>

                <div class="form-group">
                    <label>Coursetitle</label>
                    <input type="text" class="form-control" name="title" value="<?= $data['coursetitle'] ?>">
                </div>
                <div class="form-group">
                    <label>Coursecredit </label>
                    <input type="number" class="form-control" name="credit" value="<?= $data['coursecredit'] ?>">
                </div>



                <button type="submit" class="btn btn-primary" style="margin-top: 2%;margin-left: 40%;">SAVE</button>
            </form>


        </div>
    </div>
</div>
</body>
</html>