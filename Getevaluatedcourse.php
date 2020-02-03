<?php
$conn=new mysqli('localhost', 'root', '', 'evaluation');

if(!empty($_POST["dept"])) {
    $deptname=$_POST["dept"];


    $sql ="SELECT DISTINCT courseid FROM courseteacher,coursereg WHERE courseteacher.cid=coursereg.cid and evaluationstatus=1 and courseteacher.deptcode  = '$deptname'";
    if ($result = mysqli_query($conn, $sql)){
?>
        <option>Select course</option>
        <?php
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
