<?php session_start();
$conn=new mysqli('localhost', 'root', '', 'evaluation');



if(empty($_SESSION['is_logged']) || $_SESSION['is_logged'] != md5(100) ){

    header("location: login.php");


}
$error="";
if(!empty($_POST)){
    $addcourse=htmlentities($_POST['course'],ENT_QUOTES);
    $addstudentid=htmlentities($_POST['student'],ENT_QUOTES);
    $adddept=htmlentities($_POST['deptname'],ENT_QUOTES);
    $addquestionset=htmlentities($_POST['set'],ENT_QUOTES);

if (empty($error)){

      $sql = "INSERT INTO coursereg (stdid,cid,deptcode,qSetId) values('$addstudentid','$addcourse','$adddept','$addquestionset')";
    //$link = mysqli_connect('localhost', 'root', '', 'evaluation');
    $data = mysqli_query($conn, $sql);

    header("location:showcoursereg.php");
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
            <a href="showcoursereg.php"> <button type="submit" class="btn btn-primary" style="margin-right:5%;margin-top: 2%;">Back</button></a>

<?php if(!empty($error)){
    echo $error;
}?>
            <form method="post">

                <h1>Add Course-regestration</h1>



                <div class="form-group" >
                    <label for="text">Select Deptcode:</label>
                    <select class="form-control" id="deptname" name="deptname" text="type" onchange="change_course(); change_student();">

                        <option>Select Deptcode</option>


                        <?php
                        if($smt=$conn->query("select * from department")){

                            while($r=$smt->fetch_array(MYSQLI_ASSOC)){

                                ?>
                                <option value="<?php echo $r['deptcode']?>"><?php echo $r['deptcode']?> </option  >



                            <?php     }} ?>
                    </select>

                </div>
                <div class="form-group">


                    <label for="text">Select Course ID:</label>
                    <select class="form-control" id="course" type="text" name="course">

                        <option>Select Course ID</option>



                    </select>
                </div>
                <div class="form-group">
                    <label >Student ID </label>


                    <select class="form-control" id="student" type="text" name="student">

                        <option>Select Student ID</option>


                    </select>

                </div>






                <div class="form-group" >
                    <label for="text">Select Questionset:</label>
                    <select class="form-control"  name="set" >

                        <option>Select Questionset</option>


                        <?php
                        if($smt=$conn->query("select * from questionset")){

                            while($r=$smt->fetch_array(MYSQLI_ASSOC)){

                                ?>
                                <option value="<?php echo $r['quesSetId']?>"><?php echo $r['quesSetId']?> </option  >



                            <?php     }} ?>
                    </select>

                </div>

                <button type="submit" class="btn btn-primary" style="margin-top: 2%;margin-left: 40%;">ADD</button>
            </form>


        </div>
    </div>
</div>



<script>

    function change_course() {
        $("#loaderIcon").show();
        jQuery.ajax({
            url: "getteachercourse.php",
            data: 'dept=' + $("#deptname").val(),
            type: "POST",
            success: function (data) {
                $("#course")
                    .html(data)
                ;
                $("#loaderIcon").hide();
            },
            error: function () {
            }
        });
    }

        function change_student() {
            $("#loaderIcon").show();
            jQuery.ajax({
                url: "getstudent.php",
                data:'dept='+$("#deptname").val(),
                type: "POST",
                success:function(data){
                    $("#student")
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