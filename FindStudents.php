<?php
$link=new mysqli('localhost', 'root', '', 'evaluation');

if(!empty($_POST["dept"])) {
    $deptname=$_POST["dept"];
    $query = "SELECT studentid,studentname,email,programcode,deptcode FROM student  where deptcode = '$deptname' ";

    if ($result = mysqli_query($link, $query)) {
        ?>
        <tr>
            <th>#</th>

            <th>Student ID</th>
            <th>Student Name</th>
            <th>Email</th>
            <th>Dept Code</th>
            <th>Program Code</th>
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
                <td><?= $row['studentid'] ?></td>

                <td><?= $row['studentname'] ?></td>
                <td><?= $row['email'] ?></td>
                <td><?= $row['deptcode'] ?></td>
                <td><?= $row['programcode'] ?></td>
                <th>
                    <a href="edit-student.php?studentid=<?= $row['studentid'] ?>">
                        <button>Edit</button>
                    </a></th>
                <th>
                    <a href="delete-student.php?studentid=<?= $row['studentid'] ?>">
                        <button>Delete</button>
                    </a>

                </th>

            </tr>


        <?php }

    }
    }

?>