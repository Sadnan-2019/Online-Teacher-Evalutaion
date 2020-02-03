<?php
$link=new mysqli('localhost', 'root', '', 'evaluation');

if(!empty($_POST["dept"])) {
    $deptname=$_POST["dept"];
    $query = "select   qSetId,crid,courseid,stdid,evaluationstatus,coursereg.deptcode as dept FROM coursereg,courseteacher WHERE coursereg.cid=courseteacher.cid and coursereg.deptcode = '$deptname' ";

    if ($result = mysqli_query($link, $query)){
        ?>
        <tr>
            <th>#</th>
            <th>Courseid</th>
            <th>Studentid </th>
            <th>Deptcode</th>
            <th>Questionset</th>
            <th>Options</th>
           <th> </th>
            <th>Evaluationstatus</th>
            <th></th>
        </tr>

        <?php
        while ($row = mysqli_fetch_assoc($result)){
            $query = mysqli_query($link,  $query);
            $data=mysqli_fetch_all($query,MYSQLI_ASSOC);

            $i = 1;
            foreach ($data as $row) {


                $enablestatus = $row['evaluationstatus'];
                ?>

                <tr>
                    <th scope="row"> <?php echo $i++ ?> </th>

                    <td><?= $row['courseid'] ?></td>
                    <td><?= $row['stdid'] ?></td>
                    <td><?= $row['dept'] ?></td>
                    <td><?= $row['qSetId'] ?></td>


                    <td>
                        <a href="edit-coursereg.php?crid=<?=$row['crid']?>"><button>Edit</button></a>
                    </td>
                    <td>
                        <a href="delete-coursereg.php?crid=<?=$row['crid']?>"><button>Delete</button></a>

                    </td>

                    <td>
                        <?php
                        if ($enablestatus == 1){
                            ?>
                            Yes

                            <?php
                        }
                        else{
                            ?>
                            No
                        <?php }
                        ?>
                    </td>


                </tr>


            <?php }
        }
    }
}

?>