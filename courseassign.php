<?php session_start();

$conn=new mysqli('localhost', 'root', '', 'evaluation');



if(empty($_SESSION['is_logged']) || $_SESSION['is_logged'] != md5(100) ){

    header("location: login.php");


}

$error="";
if(!empty($_POST)){

    $addcourseid=htmlentities($_POST['course'],ENT_QUOTES);
    $addcoursetitle=htmlentities($_POST['title'],ENT_QUOTES);
    $addcoursecredit=htmlentities($_POST['credit'],ENT_QUOTES);
    $uid=htmlentities($_POST['deptname'],ENT_QUOTES);



    if(empty($addcourseid)){
        $error .= "Requried the coursecode field</br>";



    } if(empty($addcoursetitle)){
        $error .= "Requried the coursetitle field</br>";



    }if(empty($addcoursecredit)){
        $error .= "Requried the coursecode field</br>";



    }




    //var_dump($uid);
    //exit;
    //$mCourse->save_course($addcourseid,$department,$addcoursetitle,$addcoursecredit,null);
     //$query = "INSERT INTO course (courseid,coursetitle,coursecredit,deptcode) values('$addcourseid','$addcoursetitle','$addcoursecredit','$uid')";
    //$link = mysqli_connect('localhost', 'root', '', 'evaluation');
    if(empty($error)) {

       // $query = mysqli_query($conn, $query);
        //var_dump(mysqli_error($conn));
        $link = mysqli_connect('localhost', 'root', '', 'evaluation');
        $query = mysqli_query($link, "INSERT INTO course (courseid,coursetitle,coursecredit,deptcode) values('$addcourseid','$addcoursetitle','$addcoursecredit','$uid')");

        if($query){
            header("location:showcourse.php");
        }
        else{
            echo '<script type="text/javascript">alert("Courseid already exist")</script>';

        }
        //exit;

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
            <a href="showcourse.php"> <button type="submit" class="btn btn-primary" style="margin-right:5%;margin-top: 2%;">Back</button></a>
<?php
if(!empty($error)){
    echo $error;
}
?>

            <form method="post">


<h1>Add Courses</h1>
                <div class="form-group" >
                    <label for="text">Select Deptcode:</label>
                    <select class="form-control"  name="deptname"  >

                        <option>Select Deptcode</option>


                        <?php
                        if($smt=$conn->query("select * from department"))


                        {

                            while($r=$smt->fetch_array(MYSQLI_ASSOC)){

                                ?>
                        <option value="<?php echo $r['deptcode']?>"><?php echo $r['deptcode']?> </option  >



<?php     }} ?>
                    </select>

                </div>
                <div class="form-group">
                    <label >Course ID</label>
                    <input type="text"  class="form-control" name="course"  >
                </div>
                <div class="form-group">
                    <label >Course Title</label>
                    <input type="text" class="form-control" name="title" >
                </div>
                <div class="form-group">
                    <label >Course Credit </label>
                    <input type="number" class="form-control" name="credit" >
                </div>

                <button type="submit" class="btn btn-primary" style="margin-top: 2%;margin-left: 40%;">ADD</button>
            </form>


        </div>
    </div>
</div>
</body>
</html>