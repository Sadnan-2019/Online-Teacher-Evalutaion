


<?php session_start();


unset( $_SESSION['is_logged']);

if(!empty ($_POST)) {


    $studentid = htmlentities($_POST['id'], ENT_QUOTES);
    $pass = htmlentities($_POST['pass'], ENT_QUOTES);


    $link = mysqli_connect('localhost', 'root', '', 'evaluation');
    $query = mysqli_query($link, "select * from student where studentid = '$studentid'");
    $data = mysqli_fetch_assoc($query);

    if (empty($data)) {
        $error = "no such user";

    } elseif ($pass == $data['password']) {
        $_SESSION['is_logged'] = md5(100);
        $_SESSION['auth_user']= $data;
        header("location:select.php");

    }else{

        $error = "invalid user" ;

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

    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>


<div class="container" style=" color: aqua;background-color: #282828";>
<img src="logo1.png"/>

    <div class="row">
        <div class="col-md-12">

            <h1>Online Teacher Evaluation </h1>
            <hr>
            <hr>

            <div class="nav">

                <ul class="nav justify-content-end">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="login.php"> User Login </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="admin.php">Admin Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="http://www.sub.edu.bd/">About us</a>
                    </li>
                </ul>
            </div>

            <h1 style="margin-top: 10%; color:white;  background-color:#3cada0;  border-style: solid; border-color:white;  ">
                 User Log in </h1>


            <form method="post" style="width:50%; margin-top: 5%;margin-left:25%; ">
                <div class="form-group">
                    <label for="exampleInputEmail1">Student ID</label>
                    <input type="text" class="form-control"  name="id"  placeholder="Enter Your ID" style="border-radius:50px;">

                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" name="pass" placeholder=" Enter Your Password"
                           style="border-radius:50px;">
                </div>

                <button type="submit" class="btn btn-primary" style="margin-left:45%; margin-top: 5%;">Login</button>
            </form>


            <div class="footer" style="background-color: black;">

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
</div>
</body>
</html>