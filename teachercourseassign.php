<?php session_start();

$conn=new mysqli('localhost', 'root', '', 'evaluation');



if(empty($_SESSION['is_logged']) || $_SESSION['is_logged'] != md5(100) ){

    header("location: login.php");


}
$error="";
if(!empty($_POST)){

    $add=htmlentities($_POST['deptname'],ENT_QUOTES);
    $addteacher=htmlentities($_POST['teacher'],ENT_QUOTES);
    $addcourse=htmlentities($_POST['course'],ENT_QUOTES);
    $addyear=htmlentities($_POST['year'],ENT_QUOTES);
    $addsemester=htmlentities($_POST['semester'],ENT_QUOTES);
    //$addtid= $_SESSION['id'];



    if(empty($addyear)){
        $error.="Requred the year field</br>";

    }
    if(empty($addsemester)){
        $error.="Requred the semester field</br>";

    }
if(empty($error)) {

    $sql = "INSERT INTO courseteacher (year,semester,deptcode,teacherid,courseid) values('$addyear','$addsemester','$add','$addteacher','$addcourse')";
    $data = mysqli_query($conn, $sql);
    header("location:showteachercourses.php");
}

}


?>

<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <link href="files/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />


    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

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
            <a href="showteachercourses.php"> <button type="submit" class="btn btn-primary" style="margin-right:5%;margin-top: 2%;">Back</button></a>

<?php
if(!empty($error)){
    echo $error;
}
?>
            <form method="post">
                <h1>Add  Teacher-Courses</h1>


                <div class="form-group" >
                    <label>Select Deptcode:</label>
                    <select  class="form-control" id="deptname" name="deptname" onclick="change_teacher()" onchange="change_course()">

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
                    <label >Teacher ID</label>
                    <select class="form-control"  name="teacher" id="teacher" type="text">

                    </select>
                </div>
                <div class="form-group">
                    <label >Course ID</label>
                    <select class="form-control"  name="course" id="course" type="text">


                    </select>
                </div>
                <div class="form-group">
                    <label >Year </label>
                    <select class="form-control" name="year" >
                        <option>Select Year</option>
                        <option>2019</option>
                        <option>2020</option>
                        <option>2021</option>
                        <option>2022</option>
                        <option>2023</option>
                        <option>2024</option>
                        <option>2025</option>
                        <option>2026</option>
                        <option>2027</option>
                        <option>2028</option>
                    </select>
                </div>
                <div class="form-group">
                    <label >Semester</label>
                    <select  class="form-control" name="semester" >
                        <option>Select Semester</option>
                        <option>Summer</option>
                        <option>Fall</option>
                        <option>Spring</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary" style="margin-top: 2%;margin-left: 40%;">ADD</button>
            </form>


        </div>
    </div>
</div>


<script>
function change_teacher() {
    $("#loaderIcon").show();
    jQuery.ajax({
        url: "getteacher.php",
        data:'dept='+$("#deptname").val(),
        type: "POST",
        success:function(data){
            $("#teacher")
                .html(data)
            ;
            $("#loaderIcon").hide();
        },
        error:function (){}
    });
}


function change_course() {
    $("#loaderIcon").show();
    jQuery.ajax({
        url: "getcourse.php",
        data:'dept='+$("#deptname").val(),
        type: "POST",
        success:function(data){
            $("#course")
                .html(data)
            ;
            $("#loaderIcon").hide();
        },
        error:function (){}
    });
}


</script>

</body>


</html>