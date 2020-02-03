<?php
session_start();
$link = mysqli_connect('localhost', 'root', '', 'evaluation');


if (empty($_SESSION['is_logged']) || $_SESSION['is_logged'] != md5(100)) {

    header("location: login.php");
}
//include('admindesign.php');

$course = htmlentities($_GET['course'], ENT_QUOTES);
$cid = htmlentities($_GET['crid'], ENT_QUOTES);
if(!empty($_POST)){
    //SELECT COUNT(*) as value FROM closesurvay WHERE qresponse = 1
if(isset($_POST['result']))
{
    foreach($_POST['optradio'] as $option_num => $option_val)
    {
        //echo $option_num." ".$option_val."<br>";
        $sql = "INSERT INTO `closesurvay`(`crid`, `qid`, `qresponse`) VALUES ('$cid','$option_num','$option_val')";
        $query = mysqli_query($link,$sql);
    }
    header("location: studentevaluatedstatus.php?id=$cid&course=$course");
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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
          integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

</head>
<body>


<div class="container">

    <div class="row">
        <div class="col-md-6">
            <h1>Question</h1>
            <form method="post" action="">


            <table class="table" style="background-color: #3cada0;margin-top: 5%;">
                <tr>
                    <th>#</th>
                    <th>Question Set</th>

                    <th>Question ID</th>
                    <th>Question Description</th>
                    <th>A</th>
                    <th> B</th>
                    <th> C</th>
                    <th>D </th>
                    <th>E</th>


                </tr>

                <?php
                $userdata=$_SESSION['auth_user']['studentid'];

               $sql = "SELECT distinct QuestionId,questionDescription,qSet,option1,option2,option3,option4,option5 FROM `coursereg`, questions WHERE 
                    coursereg.qSetId = questions.qSet and qSet=(select distinct qSetId FROM coursereg where stdid = '$userdata') and cid=
                    (SELECT distinct cid FROM `courseteacher` WHERE courseid='$course')";
                $query = mysqli_query($link,$sql);
                $data=mysqli_fetch_all($query,MYSQLI_ASSOC);


                /*$link = mysqli_connect('localhost', 'root', '', 'evaluation');
                $query = mysqli_query($link, "SELECT studentid,courseid FROM coursestudent; ");
                $data = mysqli_fetch_all( $query, MYSQLI_ASSOC);*/


                $i = 1;
                foreach ($data as $row) {
                    ?>
                    <tr>
                        <th scope="row"> <?php echo $i++ ?> </th>

                        <td><?= $row['qSet'] ?></td>

                        <td><?= $row['QuestionId'] ?></td>
                        <td><?= $row['questionDescription'] ?></td>


                        <td>
                            <input type="radio" name="optradio[<?= $row['QuestionId'] ?>]" value="5"  >
                            <?= $row['option1'] ?>
                        </td>

                        <td>
                            <input type="radio" name="optradio[<?= $row['QuestionId'] ?>]" value="4">
                            <?= $row['option2'] ?>
                        </td>

                        <td>
                            <input type="radio" name="optradio[<?= $row['QuestionId'] ?>]" value="3" checked="checked">
                            <?= $row['option3'] ?>
                        </td>
                        <td>
                            <input type="radio" name="optradio[<?= $row['QuestionId'] ?>]" value="2">
                            <?= $row['option4'] ?>
                        </td>
                        <td>
                            <input type="radio" name="optradio[<?= $row['QuestionId'] ?>]" value="1">
                            <?= $row['option5'] ?>
                        </td>

                    </tr>


                <?php } ?>
            </table>
                <input id="result" name="result" type="submit" value="submit" />
            </form>


        </div>
    </div>
</div>


</body>
</html>
