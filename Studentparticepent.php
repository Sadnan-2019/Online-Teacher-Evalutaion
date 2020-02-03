<?php

session_start();

if (empty($_SESSION['is_logged']) || $_SESSION['is_logged'] != md5(100)) {

    header("location: login.php");


}
include('admindesign.php');

$link = mysqli_connect('localhost', 'root', '', 'evaluation');
$course = $_POST["course"];
$deptcode = $_POST["deptcode"];
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

</head>

<body>


<div class="container" style="margin-bottom: ">

    <div class="row">
        <div class="col-md-6">


<h1>Student List</h1>

            <table class="table" style="background-color: #3cada0;margin-top: 5%;" id="">
                <tr>
                    <th>#</th>


                    <th>Deptcode</th>
                    <th>CourseID</th>
                    <th>Student ID</th>
                    <th>Student Status</th>

                </tr>

                <?php
                $link = mysqli_connect('localhost', 'root', '', 'evaluation');
                $query = mysqli_query($link, "select   qSetId,crid,courseid,stdid,evaluationstatus,coursereg.deptcode as dept FROM coursereg,courseteacher WHERE coursereg.cid=courseteacher.cid and coursereg.deptcode = '$deptcode' and courseteacher.courseid = '$course'");
                $data=mysqli_fetch_all($query,MYSQLI_ASSOC);
                //var_dump($data);

                $i = 1;
                foreach ($data as $row) {
                    $enablestatus = $row['evaluationstatus'];

                    ?>

                    <tr>
                        <th scope="row"> <?php echo $i++ ?> </th>
                        <td><?= $row['dept'] ?></td>
                        <td><?= $row['courseid'] ?></td>
                        <td><?= $row['stdid'] ?></td>

                        <td>
                            <?php
                            if ($enablestatus == 1){
                                ?>
                                Yes

                                <?php
                            }
                            else{
                                ?>
                                No
                            <?php }
                            ?>
                        </td>


                    </tr>
                <?php } ?>
            </table>



        </div>
    </div>
</div>



</body>
</html>
