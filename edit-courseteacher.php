<?php session_start();


if (empty($_SESSION['is_logged']) || $_SESSION['is_logged'] != md5(100)) {

    header("location: login.php");


}
$id = htmlentities($_GET['cid'], ENT_QUOTES);


if (!empty($_POST)) {

    $addteacher = htmlentities($_POST['teacher'], ENT_QUOTES);
    $addcourse = htmlentities($_POST['course'], ENT_QUOTES);
    $addyear = htmlentities($_POST['year'], ENT_QUOTES);
    $addsemester = htmlentities($_POST['semester'], ENT_QUOTES);
    $adddept = htmlentities($_POST['dept'], ENT_QUOTES);

    $link = mysqli_connect('localhost', 'root', '', 'evaluation');

    $query = "update courseteacher set teacherID = '$addteacher',courseid = '$addcourse',year ='$addyear',  semester = '$addsemester',deptcode='$adddept' where cid='$id'";
    //$data = mysqli_query($link, "INSERT INTO courseteacher (teacherid,courseid,year,semester) values('$addteacher','$addcourse','$addyear','$addsemester')");
    $data = mysqli_query($link, $query);

header("location:showteachercourses.php");
}

$link = mysqli_connect('localhost', 'root', '', 'evaluation');
$result = mysqli_query($link, "select * from courseteacher where cid=$id");

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
            <a href="showteachercourses.php"> <button type="submit" class="btn btn-primary" style="margin-right:5%;margin-top: 2%;">Back</button></a>


            <form method="post">
                <div class="form-group">
                    <label>Deptcode</label>
                    <input type="text" class="form-control" name="dept" value="<?= $data['deptcode'] ?>">
                </div>
                <div class="form-group">
                    <label>Teacher ID</label>
                    <input type="text" class="form-control" name="teacher" value="<?= $data['teacherID'] ?>">
                </div>

                <div class="form-group">
                    <label>Course ID</label>
                    <input type="text" class="form-control" name="course" value="<?= $data['courseid'] ?>">
                </div>
                <div class="form-group">
                    <label>Year </label>
                    <input type="text" class="form-control" name="year" value="<?= $data['year'] ?>">
                </div>
                <div class="form-group">
                    <label>Semester</label>
                    <input type="text" class="form-control" name="semester" value="<?= $data['semester'] ?>">
                </div>

                <button type="submit" class="btn btn-primary" style="margin-top: 2%;margin-left: 40%;">ADD</button>
            </form>


        </div>
    </div>
</div>
</body>
</html>