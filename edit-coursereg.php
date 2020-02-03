<?php session_start();


if (empty($_SESSION['is_logged']) || $_SESSION['is_logged'] != md5(100)) {

    header("location: login.php");


}
$id = htmlentities($_GET['crid'], ENT_QUOTES);

$link = mysqli_connect('localhost', 'root', '', 'evaluation');

if (!empty($_POST)) {

    $adddeptname = htmlentities($_POST['deptname'], ENT_QUOTES);
    $addcourse = htmlentities($_POST['course'], ENT_QUOTES);
    $addstudent = htmlentities($_POST['student'], ENT_QUOTES);


    $sql = "update coursereg set cid = '$addcourse',stdid ='$addstudent',deptcode = '$adddeptname' where crid=$id";
    //$data = mysqli_query($link, "INSERT INTO courseteacher (teacherid,courseid,year,semester) values('$addteacher','$addcourse','$addyear','$addsemester')");
    $data = mysqli_query($link, $sql);

    header("location:showcoursereg.php");
}

$link = mysqli_connect('localhost', 'root', '', 'evaluation');
$result = mysqli_query($link, "select * from coursereg where crid=$id");
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
            <a href="showcoursereg.php"> <button type="submit" class="btn btn-primary" style="margin-right:5%;margin-top: 2%;">Back</button></a>


            <form method="post">
                <div class="form-group">
                    <label>Deptcode</label>
                    <input type="text" class="form-control" name="deptname" value="<?= $data['deptcode'] ?>">
                </div>

                <div class="form-group">

                <label for="text">Select Courseid:</label>
                <select class="form-control"  name="course" >

                    <option>Select Courseid</option>


                    <?php
                    if($smt=$link->query("select * from courseteacher")){

                        while($r=$smt->fetch_array(MYSQLI_ASSOC)){

                            ?>
                            <option value="<?php echo $r['cid']?>"><?php echo $r['courseid']?> </option  >



                        <?php     }} ?>
                </select>

        </div>
                <div class="form-group">
                    <label>Student ID </label>
                    <input type="text" class="form-control" name="student" value="<?= $data['stdid'] ?>">
                </div>

                <button type="submit" class="btn btn-primary" style="margin-top: 2%;margin-left: 40%;">SAVE</button>
            </form>


        </div>
    </div>
</div>
</body>
</html>