<?php
session_start();
$link = mysqli_connect('localhost', 'root', '', 'evaluation');



if (empty($_SESSION['is_logged']) || $_SESSION['is_logged'] != md5(100)) {

    header("location: login.php");


}
include('admindesign.php');



?>

<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
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


<div class="container">

    <div class="row">
        <div class="col-md-12">
            <h1>Course Registration</h1>
            <a href="courseregassign.php">
                <button type="button" class="btn btn-secondary" style="background-color: #3cada0;">Add Course registration </button>
            </a>
           <!-- <a href="StudentparticepentIF.php">
                <button type="button" class="btn btn-secondary" style="background-color: #3cada0;">Studentparticepent </button>
            </a>-->

            <div class="form-group" >
                <label>Select Deptcode:</label>
                <select  class="form-control" id="deptname" name="deptname" onchange="studentregcourses()">
                    <option>Select Deptcode</option>
                    <?php
                    $res=mysqli_query($link,"select * from department");
                    while($row=mysqli_fetch_array($res)){
                        ?>
                        <option value="<?php echo $row['deptcode'];?>"><?php echo $row['deptcode'];?> </option  >
                    <?php     }  ?>
                </select>
            </div>

            <table class="table" style="background:  url(Permanet-Campus-01.jpg); margin-top: 5%;" id="StudentRegCourses" >
                <thead class="thead-dark">
                <tr>
                    <th>Serial Number</th>
                    <th>Courseid</th>
                    <th>Studentid </th>
                    <th>Deptcode</th>
                    <th>Questionset</th>
                    <th>Options</th>
                    <th></th>
                    <th>Evaluationstatus</th>

                </tr>
                </thead>
                <?php
                $link = mysqli_connect('localhost', 'root', '', 'evaluation');
                $query = mysqli_query($link, "select   qSetId,crid,courseid,stdid,evaluationstatus,coursereg.deptcode as dept FROM coursereg,courseteacher WHERE coursereg.cid=courseteacher.cid ");
                $data=mysqli_fetch_all($query,MYSQLI_ASSOC);


                /*$link = mysqli_connect('localhost', 'root', '', 'evaluation');
                $query = mysqli_query($link, "SELECT studentid,courseid FROM coursestudent; ");
                $data = mysqli_fetch_all( $query, MYSQLI_ASSOC);*/



                $i = 1;
                foreach ($data as $row) {

                    $enablestatus = $row['evaluationstatus'];
                    ?>

                    <tr>
                        <th scope="row"> <?php echo $i++ ?> </th>

                        <td style="color: #1b04ff"><?= $row['courseid'] ?></td>
                        <td><?= $row['stdid'] ?></td>
                        <td><?= $row['dept'] ?></td>
                        <td><?= $row['qSetId'] ?></td>


                        <th>
                            <a href="edit-coursereg.php?crid=<?=$row['crid']?>"><button>Edit</button></a></th>
                        <th>
                            <a href="delete-coursereg.php?crid=<?=$row['crid']?>"><button>Delete</button></a>

                        </th>

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
<script>
    function studentregcourses() {
        $("#loaderIcon").show();
        jQuery.ajax({

            url: "FindStudentRegCourses.php",
            data:'dept='+$("#deptname").val(),
            type: "POST",
            success:function(data){
                $("#StudentRegCourses")
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
