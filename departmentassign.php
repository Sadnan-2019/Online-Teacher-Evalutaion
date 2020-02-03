<?php session_start();


if(empty($_SESSION['is_logged']) || $_SESSION['is_logged'] != md5(100) ){

    header("location: login.php");


}
$error="";
if(!empty($_POST)){

    $adddeptname=htmlentities($_POST['name'],ENT_QUOTES);
    $adddept=htmlentities($_POST['dept'],ENT_QUOTES);

    if(empty($adddeptname)){
        $error .= "Requried the deptname field</br>";



    }
    if(empty($adddept)){
        $error .= "Requried the deptcode field</br>";



    }


    if(empty($error)){

    $link = mysqli_connect('localhost', 'root', '', 'evaluation');
        $query = mysqli_query($link, "INSERT INTO department (deptname,deptcode) values('$adddeptname','$adddept')");

        if($query){
        header("location:showdepartment.php");
    }
    else{
        echo '<script type="text/javascript">alert("Deptcode already exist")</script>';

    }

}


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



        <div class="col-md-4 admin ">
            <a href="showdepartment.php"> <button type="submit" class="btn btn-primary" style="margin-right:5%;margin-top: 2%;">Back</button></a>
            <?php
            if(!empty($error)){
                echo $error;
            }
            ?>
            <form method="post">

                <h1>Add Department</h1>



                <div class="form-group">
                    <label >Department Name</label>
                    <input type="text"  class="form-control" name="name"  >
                </div>
                <div class="form-group">
                    <label >Deptcode</label>
                    <input type="text" class="form-control" name="dept" >
                </div>

                <button type="submit" class="btn btn-primary" style="margin-top: 2%;margin-left: 40%;">ADD</button>
            </form>


        </div>
    </div>
</div>
</body>
</html>