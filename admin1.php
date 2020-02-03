
<?php session_start();






if(empty($_SESSION['is_logged']) || $_SESSION['is_logged'] != md5(100) ){

    header("location: login.php");


}





?>



<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <style>


        .admin{


            border: 2px solid #23148b;
            margin: 120px auto;

        }

    </style>
</head>
<body>
<div class="container">

    <div class="row">

        <div class="col-md-6 admin">
            <form>
                <a href="adminchangepassword.php">

                <button type="button" class="btn btn-secondary" style="margin-top: 2%;">Change password</button>
                </a><br> <br>
                <a href="showdepartment.php">
                    <button type="button" class="btn btn-secondary">Department</button>
                </a>
                <a href="showcourse.php">
                    <button type="button" class="btn btn-secondary">Course</button>
                </a><br> <br>
                <a href="showstudent.php">
                    <button type="button" class="btn btn-secondary">Student</button>
                </a>
                <a href="showteacher.php">
                <button type="button" class="btn btn-secondary">Teacher</button>
                    </a>

                <a href="showteachercourses.php">
                <button type="button" class="btn btn-secondary">  Course Teacher </button>
                </a>




            </form>





        </div>
    </div>
</div>
</body>
</html>