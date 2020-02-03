<?php
$conn=new mysqli('localhost', 'root', '', 'evaluation');

if(!empty($_POST["dept"])) {
    $deptname=$_POST["dept"];


    $sql ="SELECT teacherid FROM `teacher` WHERE deptcode = '$deptname'";
    if ($result = mysqli_query($conn, $sql)){
        while ($row = mysqli_fetch_assoc($result)){
            ?>
            <option value="<?php echo $row['teacherid'];?>"><?php echo $row['teacherid'];?></option>
            <?php
        }
    }
    else{ ?>

        <option class="others"> Invalid</option>
        <?php
    }
}

?>
