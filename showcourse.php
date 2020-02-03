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
        <div class="col-md-12">
            <h1>Course</h1>
            <a href="courseassign.php">
                <button type="button" class="btn btn-secondary" style="background-color: #3cada0;">Add Course </button>
            </a>



            <div class="form-group" >
                <label>Select Deptcode:</label>
                <select  class="form-control" id="deptname" name="deptname" onchange="course()">
                    <option>Select Deptcode</option>
                    <?php
                    $res=mysqli_query($link,"select * from department");
                    while($row=mysqli_fetch_array($res)){
                        ?>
                        <option value="<?php echo $row['deptcode'];?>"><?php echo $row['deptcode'];?> </option  >
                    <?php     }  ?>
                </select>
            </div>


            <table class="table" style="background-color: #3cada0;margin-top: 5%;" id="courseDetails">
                <tr>
                    <th>Serial Number</th>
                    <th>CourseID</th>
                    <th>Coursetitle</th>
                    <th>Coursecredit</th>
                    <th>Deptcode</th>
                    <th>Options</th>
                </tr>

                <?php
                $link = mysqli_connect('localhost', 'root', '', 'evaluation');
                $query = mysqli_query($link, "SELECT courseid,coursecredit,coursetitle,coursetitle,department.deptcode as dept_id FROM `department`,course WHERE course.deptcode=department.deptcode  ");
                $data=mysqli_fetch_all($query,MYSQLI_ASSOC);
                //var_dump($data);

                $i = 1;
                foreach ($data as $row) {
                    ?>

                    <tr>
                        <th scope="row"> <?php echo $i++ ?> </th>
                        <td><?= $row['courseid'] ?></td>
                        <td><?= $row['coursetitle'] ?></td>
                        <td><?= $row['coursecredit'] ?></td>
                        <td><?= $row['dept_id'] ?></td>
                        <td>
                            <a href="edit-course.php?courseid=<?=$row['courseid']?>"><button>Edit</button></a></td>
                        <td>
                            <a onclick="return confirm('Are you sure delete this contact name ')" href="delete-course.php?courseid=<?=$row['courseid']?>"><button>Delete</button></a>
                        </td>

                    </tr>
                <?php } ?>
            </table>


        </div>
    </div>
</div>


<script>
    function course() {
        $("#loaderIcon").show();
        jQuery.ajax({
            url: "FindCourses.php",
            data:'dept='+$("#deptname").val(),
            type: "POST",
            success:function(data){
                $("#courseDetails")
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
