<?php
$conn=new mysqli('localhost', 'root', '', 'evaluation');

if(!empty($_POST["dept"])) {
    $deptname=$_POST["dept"];


    $sql ="SELECT studentid FROM `student` WHERE deptcode = '$deptname'";
    if ($result = mysqli_query($conn, $sql)){
        while ($row = mysqli_fetch_assoc($result)){
            ?>
            <option value="<?php echo $row['studentid'];?>"><?php echo $row['studentid'];?></option>
            <?php
        }
    }
    else{ ?>

        <option class="others"> Invalid</option>
        <?php
    }
}

?>