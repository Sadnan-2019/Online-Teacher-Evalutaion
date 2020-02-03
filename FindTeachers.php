<?php
$link=new mysqli('localhost', 'root', '', 'evaluation');

if(!empty($_POST["dept"])) {
    $deptname=$_POST["dept"];
    $query = "SELECT teacherid,teachername,email,deptcode FROM teacher  where deptcode = '$deptname' ";

    if ($result = mysqli_query($link, $query)) {
        ?>
        <tr>
            <th>#</th>

            <th>Teacher ID</th>
            <th>Teacher Name</th>
            <th>Email</th>
            <th>Dept Code</th>
            <th>Options</th>

        </tr>

        <?php
        $query = mysqli_query($link, $query);
        $data = mysqli_fetch_all($query, MYSQLI_ASSOC);


        $i = 1;
        foreach ($data as $row) {
            ?>

            <tr>
                <th scope="row"> <?php echo $i++ ?> </th>
                <td><?= $row['teacherid'] ?></td>

                <td><?= $row['teachername'] ?></td>
                <td><?= $row['email'] ?></td>
                <td><?= $row['deptcode'] ?></td>
                <th>
                    <a href="edit-teacher.php?teacherid=<?= $row['teacherid'] ?>">
                        <button>Edit</button>
                    </a></th>
                <th>
                    <a href="delete-teacher.php?teacherd=<?= $row['teacherid'] ?>">
                        <button>Delete</button>
                    </a>

                </th>

            </tr>


        <?php }

    }
}

?>