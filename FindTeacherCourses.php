<?php
$link=new mysqli('localhost', 'root', '', 'evaluation');

if(!empty($_POST["dept"])) {
    $deptname=$_POST["dept"];
    $query = "SELECT cid,deptcode,year,semester,teacherID,courseid,enablestatus FROM courseteacher where deptcode = '$deptname' ";

    if ($result = mysqli_query($link, $query)){
        ?>
        <tr>
            <th>#</th>

            <th>Teacher ID</th>

            <th>Course ID</th>
            <th>Year</th>
            <th>Semester</th>
            <th>Deptcode</th>
            <th>Options</th>
            <th></th>
            <th>Status</th>

        </tr>
        <?php
        while ($row = mysqli_fetch_assoc($result)){
            $query = mysqli_query($link,  $query);
            $data=mysqli_fetch_all($query,MYSQLI_ASSOC);

            $i = 1;
            foreach ($data as $row) {
                $enablestatus = $row['enablestatus'];
                ?>

                <tr>

                    <th scope="row"> <?php echo $i++ ?> </th>
                    <td><?= $row['teacherID'] ?></td>
                    <td><?= $row['courseid'] ?></td>
                    <td><?= $row['year'] ?></td>
                    <td><?= $row['semester'] ?></td>
                    <td><?= $row['deptcode'] ?></td>


                    <td>
                        <a href="edit-courseteacher.php?cid=<?= $row['cid'] ?>">
                            <button>Edit</button>
                        </a></td>
                    <td>
                        <a href="delete-courseteacher.php?cid=<?= $row['cid'] ?>">
                            <button>Delete</button>
                        </a>
                    </td>

                    <td>
                        <?php
                        if ($enablestatus == 1){
                            ?>
                            <a href="changeStatus.php?cid=<?= $row['cid'] ?>&status=0"><button>Yes</button></a>

                            <?php
                        }
                        else{
                            ?>
                            <a href="changeStatus.php?cid=<?=$row['cid']?>&status=1"> <button>No</button> </a>
                        <?php }
                        ?>
                    </td>


                </tr>
            <?php }
        }
    }
}

?>