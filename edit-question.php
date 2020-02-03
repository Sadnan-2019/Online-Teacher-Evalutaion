<?php session_start();


if (empty($_SESSION['is_logged']) || $_SESSION['is_logged'] != md5(100)) {

    header("location: login.php");


}
$id = htmlentities($_GET['QuestionId'], ENT_QUOTES);


if (!empty($_POST)) {
    $addqid=htmlentities($_POST['id'],ENT_QUOTES);
    $addqdescription=htmlentities($_POST['description'],ENT_QUOTES);
    $addqset=htmlentities($_POST['set'],ENT_QUOTES);
    $addqanswerone=htmlentities($_POST['answerone'],ENT_QUOTES);
    $addqanswertwo=htmlentities($_POST['answertwo'],ENT_QUOTES);
    $addqanswerthree=htmlentities($_POST['answerthree'],ENT_QUOTES);
    $addqanswerfour=htmlentities($_POST['answerfour'],ENT_QUOTES);
    $addqanswerfive=htmlentities($_POST['answerfive'],ENT_QUOTES);






    //$data = mysqli_query($link, "INSERT INTO courseteacher (teacherid,courseid,year,semester) values('$addteacher','$addcourse','$addyear','$addsemester')");
    $query = "update questions set QuestionId = '$addqid', questionDescription = '$addqdescription',qset ='$addqset',option1 ='$addqanswerone', 
       option2 = '$addqanswertwo', option3 = '$addqanswerthree',option4 ='$addqanswerfour',option5 ='$addqanswerfive' where QuestionId= '$id'";
    $link = mysqli_connect('localhost', 'root', '', 'evaluation');
    $data = mysqli_query($link,$query);

    header("location:showquestion.php");
}

$sql = "select * from questions where QuestionId='$id'";
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
            <a href="showquestion.php"> <button type="submit" class="btn btn-primary" style="margin-right:5%;margin-top: 2%;">Back</button></a>


            <form method="post">
                <div class="form-group">
                    <label>Question ID</label>
                    <input type="text" class="form-control" name="id" value="<?= $data['QuestionId'] ?>">

                </div>

                <div class="form-group">
                    <label>Question Description</label>
                    <input type="text" class="form-control" name="description" value="<?= $data['questionDescription'] ?>">
                </div>
                <div class="form-group">
                    <label>Question Set</label>
                    <input type="text" class="form-control" name="set" value="<?= $data['qSet'] ?>">
                </div>
                <div class="form-group">
                    <label>Question Answer Option1</label>
                    <input type="text" class="form-control" name="answerone" value="<?= $data['option1'] ?>">
                </div>
                <div class="form-group">
                    <label>Question Answer Option2</label>
                    <input type="text" class="form-control" name="answertwo" value="<?= $data['option2'] ?>">
                </div>
                <div class="form-group">
                    <label>Question Answer Option3</label>
                    <input type="text" class="form-control" name="answerthree" value="<?= $data['option3'] ?>">
                </div>
                <div class="form-group">
                    <label>Question Answer Option3</label>
                    <input type="text" class="form-control" name="answerfour" value="<?= $data['option4'] ?>">
                </div>
                <div class="form-group">
                    <label>Question Answer Option3</label>
                    <input type="text" class="form-control" name="answerfive" value="<?= $data['option5'] ?>">
                </div>

                <button type="submit" class="btn btn-primary" style="margin-top: 2%;margin-left: 40%;">SAVE</button>
            </form>


        </div>
    </div>
</div>
</body>
</html>