<?php session_start();

if(empty($_SESSION['is_logged']) || $_SESSION['is_logged'] != md5(100) ){

    header("location: login.php");


}

$conn = mysqli_connect('localhost', 'root', '', 'evaluation');
$error="";
if(!empty($_POST)){

    $addstudentid=htmlentities($_POST['student'],ENT_QUOTES);
    $addname=htmlentities($_POST['name'],ENT_QUOTES);
    $addemail=htmlentities($_POST['email'],ENT_QUOTES);
    $adddept=htmlentities($_POST['dept'],ENT_QUOTES);
    $addprocode=htmlentities($_POST['program'],ENT_QUOTES);

    if(empty($addstudentid)){

        $error.="Requried the studentid filed</br>";
    }if(empty($addname)){

        $error.="Requried the studentname filed</br>";
    }
     if((!filter_var($addemail,FILTER_VALIDATE_EMAIL))){


        $error.="Email filed is not valid</br>";
    }
    if(empty($addprocode)){


        $error.="Requried the programcodefield</br>";
    }



    if(empty($error)){




    //$conn = mysqli_connect('localhost', 'root', '', 'evaluation');
     $sql="INSERT INTO student (studentid,studentname,email,deptcode,programcode) values('$addstudentid','$addname','$addemail','$adddept','$addprocode')";
    $data=mysqli_query($conn,$sql);
    header("location:showstudent.php");

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
            <a href="showstudent.php"> <button type="submit" class="btn btn-primary" style="margin-right:5%;margin-top: 2%;">Back</button></a>
            <?php
            if(!empty($error)){
                echo $error;
            }
            ?>
            <form method="post">
                <h1>Add Student</h1>

                <div class="form-group" >
                    <label>Select Deptcode:</label>
                    <select  class="form-control" name="dept">

                        <option>Select Deptcode</option>


                        <?php
                        $res=mysqli_query($conn,"select * from department");

                        while($row=mysqli_fetch_array($res)){

                            ?>
                            <option value="<?php echo $row['deptcode'];?>"><?php echo $row['deptcode'];?> </option  >
                        <?php     }  ?>
                    </select>

                </div>

                <div class="form-group">
                    <label >Student ID</label>
                    <input type="text"  class="form-control" name="student"  >
                </div>
                <div class="form-group">
                    <label >Student Name</label>
                    <input type="text" class="form-control" name="name" >
                </div>
                <div class="form-group">
                    <label >Email </label>
                    <input type="text" class="form-control" name="email" >
                </div>
                <div class="form-group">
                    <label >Programcode</label>
                    <input type="text" class="form-control" name="program" >
                </div>
                <button type="submit" class="btn btn-primary" style="margin-top: 2%;margin-left: 40%;">ADD</button>
            </form>


        </div>
    </div>
</div>
</body>
</html>