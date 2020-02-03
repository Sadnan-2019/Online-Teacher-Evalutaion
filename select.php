<?php session_start();


$link = mysqli_connect('localhost', 'root', '', 'evaluation');



if(empty($_SESSION['is_logged']) || $_SESSION['is_logged'] != md5(100) ){

    header("location: login.php");


}


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

    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>


<div class="container" style=" color: aqua;background-color:#282828" ;>
    <img src="logo1.png"/>

    <div class="row">
        <div class="col-md-12">

            <h1>Online Teacher Evaluation </h1>
            <hr>
            <hr>


            <h1 style="margin-top: 10%; color:white;  background-color:#3cada0;  border-style: solid; border-color:white;  ">
                select cources </h1>


            <div class="row" style="background-color:#282828 ;  border-style:outset; border-color:black;height:60%; width:50%;margin-left:25%; ">



                <div class="col-md-12">
<div class="row">
    <div class="col-md-6">

    </div>

                    <table class="table" style="background-color: #3cada0;margin-top: 5%;">
                        <tr>
                            <th>#</th>
                            <th>My cources</th>
                            <th>Year</th>
                            <th>Semester</th>
                            <th>Evaluated Status</th>
                        </tr>



<?php


$userdata=$_SESSION['auth_user']['studentid'];
$sql1 = "select crid, coursereg.status,courseteacher.courseid as CID,courseteacher.year,courseteacher.semester from coursereg,courseteacher where courseteacher.cid=coursereg.cid and 
coursereg.stdid='$userdata' and courseteacher.enablestatus = 1";
$query=mysqli_query($link,$sql1);
$data=mysqli_fetch_all($query,MYSQLI_ASSOC);


$i = 1;
foreach ($data as $row) {
    $enablestatus = $row['status'];

    ?>

    <tr>
        <th scope="row"> <?php echo $i++ ?> </th>


        <td><?= $row['CID'] ?></td>
        <td><?= $row['year'] ?></td>
        <td><?= $row['semester'] ?></td>

<td>
    <?php
    if ($enablestatus == 0){
        ?>
        <a href="StudentQuestionShow.php?crid=<?= $row['crid'] ?>&course=<?= $row['CID'] ?>"><button>Evaluate</button></a>

        <?php
    }

    else
    {
        ?>
        <span>Evaluation completed</span>
<?php
    }
?>

</td>



    </tr>


<?php } ?>





                    </table>




                </div>




                    <div class="col-md-4">
                        <a href="logout.php"><button type="button" class="btn btn-3CADA0" style="margin-left: 125%" >Logout</button></a>


                    </div>










            </div>
        </div>


        <div class="footer" style="background-color: black; ">

            <div class="row">


                <div class="col-md-6">
                    <h3 style="border-bottom: 2px solid white;"> ABOUT </h3>

                    <div class="row">
                        <div class="col-md-2" style="margin-top: 10%;">
                            <img src="mini-logo.png">
                        </div>


                        <div class="col-md-10" style="margin-top:5%; ">
                            <p style="color: white;"> State University of Bangladesh <br>(SUB) is a private university
                                in <br>Dhanmondi, Dhaka, Bangladesh. It<br> was established in 2002 under the <br>Private
                                University Act 1992 </p><br><br>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <h3 style="border-bottom: 2px solid white;"> FIND US ONLINE </h3>

                            <div class="row">
                                <div class="col-md-2">
                                    <a href="https://www.facebook.com/subedubd" target="_blank">
                                        <img src="Logo_fb.png" alt="Girl in a jacket" style="height: 46px;">
                                    </a>
                                </div>

                                <div class="col-md-2">
                                    <a href="https://twitter.com/subedubd" target="_blank">
                                        <img src="Icon-twitter.png" alt="Girl in a jacket" style="height: 46px;">
                                    </a>
                                </div>

                                <div class="col-md-2">
                                    <a href="https://www.youtube.com/watch?v=7_vbO3vo2do&feature=youtu.be"
                                       target="_blank">
                                        <img src="834723.png" alt="Girl in a jacket" style="height: 46px;">
                                    </a>
                                </div>

                                <div class="col-md-2">
                                    <a href="https://plus.google.com/+SubEduBd" target="_blank">
                                        <img src="google_plus1600.png" alt="Girl in a jacket" style="height: 46px;">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <h3 style="border-bottom: 2px solid white;"> ADDRESS </h3>
                    <hr>
                    <p style="color: white;"> OWN CAMPUS :<br>

                        77, Satmasjid Road Dhanmondi, Dhaka<br> 1205,Bangladesh<br> <br>

                        BIJOY CAMPUS : <br>

                        138, Kalabagan, Mirpur Road, Dhaka <br> 1205,Bangladesh <br> <br>

                        Landphone : +880-2-58151781-5, 9128329,<br> 9140960, 09613782338<br>

                        Hotline : 01766661555, 01766663557<br>

                        Email : info@sub.edu.bd </p> <br>
                </div>

            </div>

        </div>

    </div>
</div>

</div
</div>
</body>
</html>