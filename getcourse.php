<?php
$conn=new mysqli('localhost', 'root', '', 'evaluation');

if(!empty($_POST["dept"])) {
    $deptname=$_POST["dept"];


    $sql ="SELECT courseid FROM `course` WHERE deptcode = '$deptname'";
    if ($result = mysqli_query($conn, $sql)){
        while ($row = mysqli_fetch_assoc($result)){
            ?>
            <option value="<?php echo $row['courseid'];?>"><?php echo $row['courseid'];?></option>
            <?php
        }
    }
    else{ ?>

        <option class="others"> Invalid</option>
        <?php
    }
}

?>
