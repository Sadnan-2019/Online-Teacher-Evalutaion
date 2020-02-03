<?php session_start();

/*if(empty($_SESSION['is_logged']) || $_SESSION['is_logged'] != md5(100) ){

    header("location: login.php");


}*/

if(!empty ($_POST)) {


    $answer1= htmlentities($_POST['answerOne'],ENT_QUOTES);

    $answer2= htmlentities($_POST['answerTwo'],ENT_QUOTES);
    $answer3= htmlentities($_POST['answerThree'],ENT_QUOTES);
    $answer4= htmlentities($_POST['answerFour'],ENT_QUOTES);
    $answer5=htmlentities( $_POST['answerFive'],ENT_QUOTES);
    $answer6=htmlentities( $_POST['answerSix'],ENT_QUOTES);
    $answer7= htmlentities($_POST['answerSeven'],ENT_QUOTES);
    $answer8= htmlentities($_POST['answerEight'],ENT_QUOTES);
    $answer9=htmlentities( $_POST['answerNine'],ENT_QUOTES);
    $answer10=htmlentities( $_POST['answerTen'],ENT_QUOTES);






}




?>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
    <style type="text/css">
        .container {
            width:950px;
            height:auto;
            padding: 13px;
            margin-right:auto;
            margin-left:auto;
            background-color:#fff;
        }
    </style>
</head>
<body bgcolor="#e1e1e1">

<div class="container">

    <div class="row">

        <div class="col-md-12">



            <form method="post" >
                <ol>
                    <li>
                        <h3>The Teacher's preparation for classes was :</h3>
                        <div>
                            <input type="radio" name="answerOne" id="answerOne" value="A">
                            <label for="answerOneA">1) Excellent</label>
                        </div>
                        <div>
                            <input type="radio" name="answerOne" id="answerOne" value="B">
                            <label for="answerOneB">2) Good</label>
                        </div>
                        <div>
                            <input type="radio" name="answerOne" id="answerOne" value="C">
                            <label for="answerOneC">3) Very good</label>
                        </div>
                        <div>
                            <input type="radio" name="answerOne" id="answerOne" value="D">
                            <label for="answerOneC">4) Average</label>
                        </div>
                        <div>
                            <input type="radio" name="answerOne" id="answerOne" value="E">
                            <label for="answerOneC">5) Poor</label>
                        </div>
                    </li>
                    <li>
                        <h3>Her/his Classes started and ended on time :</h3>
                        <div>
                            <input type="radio" name="answerTwo" id="answerTwo" value="A">
                            <label for="answerTwoA">1) Always </label>
                        </div>
                        <div>
                            <input type="radio" name="answerTwo" id="answerTwo" value="B">
                            <label for="answerTwoB">2) Mostly</label>
                        </div>
                        <div>
                            <input type="radio" name="answerTwo" id="answerTwo" value="C">
                            <label for="answerTwoC">3) Sometimes</label>
                        </div>
                        <div>
                            <input type="radio" name="answerTwo" id="answerTwo" value="D">
                            <label for="answerTwoC">4) Hardly</label>
                        </div>
                        <div>
                            <input type="radio" name="answerTwo" id="answerTwo" value="E">
                            <label for="answerTwoC">5) Never</label>
                        </div>
                    </li>
                    <li>
                        <h3>Course-outline and materials provided were :</h3>
                        <div>
                            <input type="radio" name="answerThree" id="answerThree" value="A">
                            <label for="answerThreeA">1)Excellent </label>
                        </div>
                        <div>
                            <input type="radio" name="answerThree" id="answerThree" value="B">
                            <label for="answerThreeB">2) Good</label>
                        </div>
                        <div>
                            <input type="radio" name="answerThree" id="answerThree" value="C">
                            <label for="answerThreeC">3) Average standard</label>
                        </div>
                        <div>
                            <input type="radio" name="answerThree" id="answerThree" value="C">
                            <label for="answerThreeC">4) Below standard</label>
                        </div>
                        <div>
                            <input type="radio" name="answerThree" id="answerThree" value="C">
                            <label for="answerThreeC">5) No materials</label>
                        </div>
                    </li>
                    <li>
                        <h3>The teacher useed appropriate examples when and where necessary :</h3>
                        <div>
                            <input type="radio" name="answerFour" id="answerThree" value="A">
                            <label for="answerThreeA">1)Always gave example </label>
                        </div>
                        <div>
                            <input type="radio" name="answerFour" id="answerThree" value="B">
                            <label for="answerThreeB">2) Used enough</label>
                        </div>
                        <div>
                            <input type="radio" name="answerFour" id="answerThree" value="C">
                            <label for="answerThreeC">3) Used few</label>
                        </div>
                        <div>
                            <input type="radio" name="answerFour" id="answerThree" value="C">
                            <label for="answerThreeC">4) Used very few</label>
                        </div>
                        <div>
                            <input type="radio" name="answerFour" id="answerThree" value="C">
                            <label for="answerThreeC">5) No example used</label>
                        </div>
                    </li>
                    <li>
                        <h3>The teacher encouraged the students to ask questions and clarify properly :</h3>
                        <div>
                            <input type="radio" name="answerFive" id="answerThree" value="A">
                            <label for="answerThreeA">1) Always </label>
                        </div>
                        <div>
                            <input type="radio" name="answerFive" id="answerThree" value="B">
                            <label for="answerThreeB">2) Most of the time</label>
                        </div>
                        <div>
                            <input type="radio" name="answerFive" id="answerThree" value="C">
                            <label for="answerThreeC">3) Sometimes</label>
                        </div>
                        <div>
                            <input type="radio" name="answerFive" id="answerThree" value="C">
                            <label for="answerThreeC">4) Very few times</label>
                        </div>
                        <div>
                            <input type="radio" name="answerFive" id="answerThree" value="C">
                            <label for="answerThreeC">5) Never encourage</label>
                        </div>
                    </li>
                    <li>
                        <h3>The teacher covered the course materials according to the course outline :</h3>
                        <div>
                            <input type="radio" name="answerSix" id="answerThree" value="A">
                            <label for="answerThreeA">1) All covered </label>
                        </div>
                        <div>
                            <input type="radio" name="answerSix" id="answerThree" value="B">
                            <label for="answerThreeB">2) Missed very few</label>
                        </div>
                        <div>
                            <input type="radio" name="answerSix" id="answerThree" value="C">
                            <label for="answerThreeC">3) Missed few</label>
                        </div>
                        <div>
                            <input type="radio" name="answerSix" id="answerThree" value="C">
                            <label for="answerThreeC">4)  Missed many</label>
                        </div>
                        <div>
                            <input type="radio" name="answerSix" id="answerThree" value="C">
                            <label for="answerThreeC">5) Irrelevant material</label>
                        </div>
                    </li>
                    <li>
                        <h3>Teaching methods and presentation techniques of the teacher were :</h3>
                        <div>
                            <input type="radio" name="answerSeven" id="answerOne" value="A">
                            <label for="answerOneA">1) Excellent</label>
                        </div>
                        <div>
                            <input type="radio" name="answerSeven" id="answerOne" value="B">
                            <label for="answerOneB">2) Good</label>
                        </div>
                        <div>
                            <input type="radio" name="answeeSeven" id="answerOne" value="C">
                            <label for="answerOneC">3) Very good</label>
                        </div>
                        <div>
                            <input type="radio" name="answerSeven" id="answerOne" value="C">
                            <label for="answerOneC">4) Average</label>
                        </div>
                        <div>
                            <input type="radio" name="answerSeven" id="answerOne" value="C">
                            <label for="answerOneC">5) Poor</label>
                        </div>
                    </li>
                    <li>
                        <h3>The teacher was available for students counseling at assigned times :</h3>
                        <div>
                            <input type="radio" name="answerEight" id="answerOne" value="A">
                            <label for="answerOneA">1) Always</label>
                        </div>
                        <div>
                            <input type="radio" name="answerEight" id="answerOne" value="B">
                            <label for="answerOneB">2) Most of the time</label>
                        </div>
                        <div>
                            <input type="radio" name="answerEight" id="answerOne" value="C">
                            <label for="answerOneC">3) Sometimes</label>
                        </div>
                        <div>
                            <input type="radio" name="answerEight" id="answerOne" value="C">
                            <label for="answerOneC">4) Hardly</label>
                        </div>
                        <div>
                            <input type="radio" name="answerEight" id="answerOne" value="C">
                            <label for="answerOneC">5) Never</label>
                        </div>
                    </li>
                    <li>
                        <h3>The teacher was friendly,responsible and helpful :</h3>
                        <div>
                            <input type="radio" name="answerNine" id="answerOne" value="A">
                            <label for="answerOneA">1) Always</label>
                        </div>
                        <div>
                            <input type="radio" name="answerNine" id="answerOne" value="B">
                            <label for="answerOneB">2) Most of the time</label>
                        </div>
                        <div>
                            <input type="radio" name="answerNine" id="answerOne" value="C">
                            <label for="answerOneC">3) Sometimes</label>
                        </div>
                        <div>
                            <input type="radio" name="answerNine" id="answerOne" value="C">
                            <label for="answerOneC">4) Hardly</label>
                        </div>
                        <div>
                            <input type="radio" name="answerNine" id="answerOne" value="C">
                            <label for="answerOneC">5) Never</label>
                        </div>
                    </li>
                    <li>
                        <h3>Overall communication of the teacher was :</h3>
                        <div>
                            <input type="radio" name="answerTen" id="answerOne" value="A">
                            <label for="answerOneA">1) Excellent</label>
                        </div>
                        <div>
                            <input type="radio" name="answerTen" id="answerOne" value="B">
                            <label for="answerOneB">2) Good</label>
                        </div>
                        <div>
                            <input type="radio" name="answerTen" id="answerOne" value="C">
                            <label for="answerOneC">3) Very good</label>
                        </div>
                        <div>
                            <input type="radio" name="answerTen" id="answerOne" value="C">
                            <label for="answerOneC">4) Average</label>
                        </div>
                        <div>
                            <input type="radio" name="answerTen" id="answerOne" value="C">
                            <label for="answerOneC">5) Poor</label>
                        </div>
                    </li>
                </ol>
                <input type="submit" value="Submit  ">
            </form>
        </div>


    </div>
</div>
</div>

</body>
</html>