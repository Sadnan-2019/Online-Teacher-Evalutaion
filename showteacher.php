<?php

session_start();

if(empty($_SESSION['is_logged']) || $_SESSION['is_logged'] != md5(100) ){

    header("location: login.php");


}


include('admindesign.php');

$link = mysqli_connect('localhost', 'root', '', 'evaluation');


?>

<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <link href="files/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>





</head>
<body>


<div class="container">

    <div class="row">
        <div class="col-md-12">


            <h1>Teacher </h1>
            <a href="teacherassign.php">
                <button type="button" class="btn btn-secondary" style="background-color: #3cada0;">Add Teacher </button>
            </a>
            <div class="form-group" >
            <label>Select Deptcode:</label>
            <select  class="form-control" id="deptname" name="deptname" onchange="teacher()">
                <option>Select Deptcode</option>
                <?php
                $res=mysqli_query($link,"select * from department");
                while($row=mysqli_fetch_array($res)){
                    ?>
                    <option value="<?php echo $row['deptcode'];?>"><?php echo $row['deptcode'];?> </option  >
                <?php     }  ?>
            </select>
        </div>


        <table class="table" style="background-color: #3cada0;margin-top: 5%;" id="teacherdetails">
                <tr>
                    <th>Serial Number</th>

                    <th>Teacher ID</th>
                    <th>Teacher Name</th>
                    <th>Email</th>
                    <th>Deptcode</th>
                    <th>Options</th>

                </tr>
                <?php
                $query = mysqli_query($link, "SELECT teacherid,teachername,email,deptcode FROM teacher ");
                $data=mysqli_fetch_all($query,MYSQLI_ASSOC);
                $i=1;
                foreach ($data as $row){
                    ?>

                    <tr>
                        <th scope="row"> <?php echo $i++ ?> </th>
                        <td><?=$row['teacherid']?></td>
                        <td><?=$row['teachername']?></td>
                        <td><?=$row['email']?></td>
                        <td><?=$row['deptcode']?></td>
                        <td>
                            <a href="edit-teacher.php?teacherid=<?=$row['teacherid']?>"><button>Edit</button></a>
                        </td>
                        <td>
                            <a href="delete-teacher.php?teacherid=<?=$row['teacherid']?>"><button>Delete</button></a>
                        </td>

                    </tr>

                <?php   }?>






            </table>








        </div>
    </div>
</div>


<script>
    function teacher(){
        $("#loaderIcon").show();
        jQuery.ajax({
            url: "FindTeachers.php",
            data:'dept='+$("#deptname").val(),
            type: "POST",
            success:function(data){
                $("#teacherdetails")
                    .html(data)
                ;
                $("#loaderIcon").hide();
            },
            error:function (){}
        });
    }

</script

</body>
</html>
