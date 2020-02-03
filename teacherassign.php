<?php
session_start();


include_once __DIR__ . '/Classes/PHPExcel.php';
include_once __DIR__ . '/Classes/PHPExcel/IOFactory.php';


if(empty($_SESSION['is_logged']) || $_SESSION['is_logged'] != md5(100) ){

    header("location: login.php");
}

$conn = mysqli_connect('localhost', 'root', '', 'evaluation');
$error="";
if(!empty($_POST)){

    $addteacher=htmlentities($_POST['teacher'],ENT_QUOTES);
    $addname=htmlentities($_POST['name'],ENT_QUOTES);
    $addemail=htmlentities($_POST['email'],ENT_QUOTES);
    $adddept=htmlentities($_POST['deptcode'],ENT_QUOTES);

    if(empty($addteacher)){

        $error.="Requried the teacherid filed</br>";
    }if(empty($addname)){

        $error.="Requried the teachername filed</br>";
    }
    if((!filter_var($addemail,FILTER_VALIDATE_EMAIL))){


        $error.="Email filed is not valid</br>";
    }





    if(empty($error)){
    $sql = "INSERT INTO teacher (teacherid,teachername,email,deptcode) values('$addteacher','$addname','$addemail','$adddept')";
    $data=mysqli_query($conn,$sql);

    header("location:showteacher.php");
    }
}


if(isset($_POST['SubmitButton'])){
    try {       //attached file formate

        $new_id = 1;
        $up_filename=$_FILES["filepath"]["name"];
        $file_basename = substr($up_filename, 0, strripos($up_filename, '.')); // strip extention
        $file_ext = substr($up_filename, strripos($up_filename, '.')); // strip name
        $f2 = $file_basename . $file_ext;

        $needle = "xlsx";
        if( strpos( $f2, $needle ) !== false) {
            move_uploaded_file($_FILES["filepath"]["tmp_name"], $f2);

            $inputFileName = $f2;

            try {
                $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
                $objReader = PHPExcel_IOFactory::createReader($inputFileType);
                $objPHPExcel = $objReader->load($inputFileName);
            } catch (Exception $e) {
                die('Error loading file"' . pathinfo($inputFileName, PATHINFO_BASENAME) . '": ' . $e->getMessage());
            }
//  Get worksheet dimensions
            $sheet = $objPHPExcel->getSheet(0);
            $highestRow = $sheet->getHighestRow();
            $highestColumn = $sheet->getHighestColumn();
            $rowData = array();
            for ($row = 2; $row <= $highestRow; $row++) {
                //  Read a row of data into an array
                $rowData[] = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row,
                    NULL,
                    TRUE,
                    FALSE);
            }

//print_r($rowData);
//echo $rowData[0][0][1];

            foreach ($rowData as $datum) {
                foreach ($datum as $item) {

                    $teacherid = $item[0];
                    $password = $item[1];
                    $teachername = $item[2];
                    $email = $item[3];
                    $teacherstatus = $item[4];
                    $dept_id = $item[5];

                    //$mTeacher->save_teacher($full_name, $email, $user_id, $password, $mobile, $dept_id, $created_by, $created_date, $modified_by, $modified_date, $remarks, $is_active);
                    $sql = "INSERT INTO teacher (teacherid,password,teachername,email,teacherstatus,deptcode) values('$teacherid','$password','$teachername','$email','$teacherstatus','$dept_id')";
                    $data=mysqli_query($conn,$sql);
                }
            }

            echo '<script language="javascript">';
            echo 'alert("Successfully saved!")';
            echo '</script>';
            header("location:showteacher.php");
        }else{
            echo '<script language="javascript">';
            echo 'alert("Please select a valid xlsx file then try again. ")';
            echo '</script>';
        }
    }
    catch(Exception $e) {
        $error_message = $e->getMessage();
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
            <a href="showteacher.php"> <button type="submit" class="btn btn-primary" style="margin-right:5%;margin-top: 2%;">Back</button></a>

<?php
if(!empty(($error))){
    echo "$error";


}
?>






            <form method="post">
                <h1>Add Teacher</h1>

                <div class="form-group" >
                    <label>Select Deptcode:</label>
                    <select  class="form-control" id="deptcode" name="deptcode">
                        <option>Select Deptcode</option>
                        <?php
                        $res=mysqli_query($conn,"select * from department");
                        while($row=mysqli_fetch_array($res)){
                            ?>
                            <option value="<?php echo $row['deptcode'];?>"><?php echo $row['deptcode'];?> </option  >
                        <?php     }  ?>
                    </select>
                </div>

                <div class="form-group">
                    <label >Teacher ID</label>
                    <input type="text"  class="form-control" name="teacher"  >
                </div>
                <div class="form-group">
                    <label >Teacher Name</label>
                    <input type="text" class="form-control" name="name" >
                </div>
                <div class="form-group">
                    <label >Email </label>
                    <input type="email" class="form-control" name="email" >
                </div>



                <button type="submit" class="btn btn-primary" style="margin-top: 2%;margin-left: 40%;">ADD</button>
            </form>

            <form action="" method="post" enctype="multipart/form-data">
                <input type="file"  name="filepath" id="filepath"/></td><td>
                    <input type="submit" name="SubmitButton" value="submit"/>
            </form>


        </div>
    </div>
</div>
</body>
</html>