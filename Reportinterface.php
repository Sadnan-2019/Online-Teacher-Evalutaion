<?php session_start();
if(empty($_SESSION['is_logged']) || $_SESSION['is_logged'] != md5(100) ){

    header("location: login.php");
}

$conn = mysqli_connect('localhost', 'root', '', 'evaluation');



?>


<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
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
        <div class="col-md-4 admin">


            <a href="showcoursereg.php"> <button type="submit" class="btn btn-primary" style="margin-right:5%;margin-top: 2%;">Back</button></a>

            <form method="post" action="ShowResult.php">
                <h1>Report</h1>
                <div class="form-group">
                    <label for="exampleInputEmail1">Select Department</label>
                    <select  class="form-control" id="deptcode" name="deptcode"    type="text" onchange="submit_course();">
                        <option>Select Deptcode</option>
                        <?php
                        $res=mysqli_query($conn,"select * from department");
                        while($row=mysqli_fetch_array($res)){
                            ?>
                            <option value="<?php echo $row['deptcode'];?>"><?php echo $row['deptcode'];?> </option  >
                        <?php     }  ?>
                    </select>
                </div>
                <div class="form-group" >
                    <label for="exampleInputPassword1">Select Course</label>
                    <select type="text" class="form-control"   type="text" id="course" name="course" >
                        <option>Select course</option>
                    </select>
                </div>

                    <button type="submit" class="btn btn-secondary" style="background-color: #3cada0;">Result </button>

            </form>




        </div>
    </div>
</div>




<script>

    function submit_course() {
        //alert($('#deptcode').val());
        $("#loaderIcon").show();
        jQuery.ajax({
            url: "Getevaluatedcourse.php",
            data: 'dept=' + $("#deptcode").val(),

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



</script>
</body>
</html>