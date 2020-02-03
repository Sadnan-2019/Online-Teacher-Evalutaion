<?php

session_start();

if (empty($_SESSION['is_logged']) || $_SESSION['is_logged'] != md5(100)) {

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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
          integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
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

            <h1>Student</h1>
            <a href="studentassign.php">
                <button type="button" class="btn btn-secondary" style="background-color: #3cada0;">Add Student </button>
            </a>
            <div class="form-group" >
                <label>Select Deptcode:</label>
                <select  class="form-control" id="deptname" name="deptname" onchange="student()">
                    <option>Select Deptcode</option>
                    <?php
                    $res=mysqli_query($link,"select * from department");
                    while($row=mysqli_fetch_array($res)){
                        ?>
                        <option value="<?php echo $row['deptcode'];?>"><?php echo $row['deptcode'];?> </option  >
                    <?php     }  ?>
                </select>
            </div>


            <table class="table" style="background-color: #3cada0;margin-top: 5%;" id="studentdetails">
                <tr>
                    <th>Serial Number</th>

                    <th>Student ID</th>

                    <th>Student Name</th>
                    <th>Email</th>
                    <th>Dept Code</th>
                    <th>Program Code</th>
                    <th>Options</th>

                </tr>

                <?php
                $query = mysqli_query($link, "SELECT studentid,studentname,email,programcode,deptcode FROM student ");
                $data=mysqli_fetch_all($query,MYSQLI_ASSOC);


                /*$link = mysqli_connect('localhost', 'root', '', 'evaluation');
                $query = mysqli_query($link, "SELECT studentid,courseid FROM coursestudent; ");
                $data = mysqli_fetch_all( $query, MYSQLI_ASSOC);*/



                $i = 1;
                foreach ($data as $row) {
                    ?>

                    <tr>
                        <th scope="row"> <?php echo $i++ ?> </th>
                        <td><?= $row['studentid'] ?></td>

                        <td><?= $row['studentname'] ?></td>
                        <td><?= $row['email'] ?></td>
                        <td><?= $row['deptcode'] ?></td>
                        <td><?= $row['programcode'] ?></td>
<th>
    <a href="edit-student.php?studentid=<?=$row['studentid']?>"><button>Edit</button></a>
    </th>
                        <th>
    <a href="delete-student.php?studentid=<?=$row['studentid']?>"><button>Delete</button></a>

</th>

                    </tr>


                <?php } ?>


            </table>


        </div>
    </div>
</div>

<script>
    function student() {
        $("#loaderIcon").show();
        jQuery.ajax({
            url: "FindStudents.php",
            data:'dept='+$("#deptname").val(),
            type: "POST",
            success:function(data){
                $("#studentdetails")
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
