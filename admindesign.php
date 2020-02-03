
<?php

if (empty($_SESSION['is_logged']) || $_SESSION['is_logged'] != md5(100)) {

    header("location: login.php");


}

?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Title</title>

</head>
<body>






<nav class="navbar navbar-expand-lg navbar-dark bg-dark">

    <div class="container-fluid">
        <a href="" class="navbar-brand">
            <img src="logo1.png" width="143">
        </a>

        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#showitem">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="showitem">
            <ul class="navbar-nav ">

                <li  ><a href="showdepartment.php" class="nav-link " >Department</a></li>
                <li ><a href="showstudent.php" class="nav-link">Student</a></li>
                <li ><a href="showteacher.php" class="nav-link">Teacher</a></li>
                <li ><a href="showcourse.php" class="nav-link">Course</a></li>
                <li ><a href="showteachercourses.php" class="nav-link">Teacher Courses</a></li>
                <li ><a href="showcoursereg.php" class="nav-link">Course Regestration</a></li>
                <li ><a href="showquestion.php" class="nav-link">Question</a></li>
                <li ><a href="StudentparticepentIF.php" class="nav-link">Participent Student</a></li>
            </ul>
            <ul class="navbar-nav ml-auto" >

                <li ><a href="Reportinterface.php" class="nav-link">Report</a></li>
                <li ><a href="adminchangepassword.php" class="nav-link">Changepassword</a></li>
                <li ><a href="logout.php" class="nav-link">Logout</a></li>

            </ul>
        </div>
    </div>
</nav>

<script src="js/jquery-3.4.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>