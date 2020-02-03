<?php session_start();


if(empty($_SESSION['is_logged']) || $_SESSION['is_logged'] != md5(100) ){

    header("location: login.php");


}
$error="";
if(!empty($_POST)){

    $addqset=htmlentities($_POST['set'],ENT_QUOTES);
    $addqid=htmlentities($_POST['id'],ENT_QUOTES);
    $addqdescription=htmlentities($_POST['description'],ENT_QUOTES);
    $addQanswer1=htmlentities($_POST['optionOne'],ENT_QUOTES);
    $addQanswer2=htmlentities($_POST['optionTwo'],ENT_QUOTES);
    $addQanswer3=htmlentities($_POST['optionThree'],ENT_QUOTES);
    $addQanswer4=htmlentities($_POST['optionFour'],ENT_QUOTES);
    $addQanswer5=htmlentities($_POST['optionFive'],ENT_QUOTES);

    if(empty($addqset)){
        $error .= "Requried the questionset field</br>";



    }
    if(empty($addqid)){
        $error .= "Requried the questionid field</br>";



    }
    if(empty($addqdescription)){
        $error .= "Requried the questiondescription field</br>";



    }


    if(empty($error)){

        $link = mysqli_connect('localhost', 'root', '', 'evaluation');
        $sql = "INSERT INTO questions (QuestionId,questionDescription,qSet,option1,option2,option3,option4,option5) values
              ('$addqid','$addqdescription','$addqset','$addQanswer1','$addQanswer2','$addQanswer3','$addQanswer4','$addQanswer5')";
        $data=mysqli_query($link,$sql);
        header("location:showquestion.php");



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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">




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
            <a href="showquestion.php"> <button type="submit" class="btn btn-primary" style="margin-right:5%;margin-top: 2%;">Back</button></a>
            <?php
            if(!empty($error)){
                echo $error;
            }
            ?>
            <form method="post">
                <h1>Add Question</h1>





                <div class="form-group">

                    <label >Question Set</label>
                    <input type="text"  class="form-control" name="set"  >
                </div>

                <div class="form-group">
                    <label >Question ID</label>
                    <input type="text" class="form-control" name="id" >
                </div>
                <div class="form-group">
                    <label >Question Description</label>
                    <input type="text" class="form-control" name="description" >
                </div>
                <div class="form-group">
                    <label >Question Answer Option1</label>
                    <input type="text" class="form-control" name="optionOne" >
                </div>
                <div class="form-group">
                    <label >Question Answer Option2</label>
                    <input type="text" class="form-control" name="optionTwo" >
                </div>
                <div class="form-group">
                    <label >Question Answer Option3</label>
                    <input type="text" class="form-control" name="optionThree" >
                </div>
                <div class="form-group">
                    <label >Question Answer Option4</label>
                    <input type="text" class="form-control" name="optionFour" >
                </div>
                <div class="form-group">
                    <label >Question Answer Option5</label>
                    <input type="text" class="form-control" name="optionFive" >
                </div>


                <button type="submit" class="btn btn-primary" style="margin-top: 2%;margin-left: 40%;">ADD</button>
            </form>


        </div>
    </div>
</div>
</body>
</html>