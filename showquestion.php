<?php
session_start();



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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
          integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

</head>
<body>


<div class="container">

    <div class="row">
        <div class="col-md-12">
            <h1>Question</h1>
            <a href="questionassign.php">
                <button type="button" class="btn btn-secondary" style="background-color: #3cada0;">Add Question </button>
            </a>

            <table class="table" style="background-color: #3cada0;margin-top: 5%;">
                <tr>
                    <th>Serial Number</th>
                    <th>Question Set</th>

                    <th>Question ID</th>
                    <th>Question Description</th>
                    <th>A</th>
                    <th> B</th>
                    <th> C</th>
                    <th>D </th>
                    <th>E</th>

                    <th>Options</th>

                </tr>

                <?php
                $link = mysqli_connect('localhost', 'root', '', 'evaluation');
                $query = mysqli_query($link, "SELECT * FROM questions ");
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
                            <input type="radio" name="<?= $row['QuestionId'] ?>"  >
                             <?= $row['option1'] ?>
                        </td>

                        <td>
                            <input type="radio" name="<?= $row['QuestionId'] ?>" >
                            <?= $row['option2'] ?>
                        </td>

                        <td>
                            <input type="radio" name="<?= $row['QuestionId'] ?>"  checked="checked">
                            <?= $row['option3'] ?>
                        </td>
                        <td>
                            <input type="radio" name="<?= $row['QuestionId'] ?>" >
                            <?= $row['option4'] ?>
                        </td>
                        <td>
                            <input type="radio" name="<?= $row['QuestionId'] ?>" >
                            <?= $row['option5'] ?>
                        </td>


                        <th>
                            <a href="edit-question.php?QuestionId=<?=$row['QuestionId']?>"><button>Edit</button></a>
                        </th>
                        <th>
                            <a href="delete-question.php?QuestionId=<?=$row['QuestionId']?>"><button>Delete</button></a>

                        </th>

                    </tr>


                <?php } ?>


            </table>


        </div>
    </div>
</div>


</body>
</html>
