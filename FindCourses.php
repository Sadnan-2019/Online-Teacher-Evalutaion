<?php
$link=new mysqli('localhost', 'root', '', 'evaluation');

if(!empty($_POST["dept"])) {
    $deptname=$_POST["dept"];
    $query = "SELECT courseid,coursecredit,coursetitle,department.deptcode as dept_id 
FROM `department`,course WHERE course.deptcode=department.deptcode and course.deptcode = '$deptname' ";

    if ($result = mysqli_query($link, $query)){
        ?>
        <tr>
            <th>#</th>
            <th>CourseID</th>
            <th>Coursetitle</th>
            <th>Coursecredit</th>
            <th>Deptcode</th>

            <th>Options</th>

        </tr>
        <?php
        while ($row = mysqli_fetch_assoc($result)){
            $query = mysqli_query($link,  $query);
            $data=mysqli_fetch_all($query,MYSQLI_ASSOC);

            $i = 1;
            foreach ($data as $row) {
                ?>

                <tr>
                    <th scope="row"> <?php echo $i++ ?> </th>
                    <td><?= $row['courseid'] ?></td>
                    <td><?= $row['coursetitle'] ?></td>
                    <td><?= $row['coursecredit'] ?></td>
                    <td><?= $row['dept_id'] ?></td>
                    <th>
                        <a href="edit-course.php?courseid=<?=$row['courseid']?>"><button>Edit</button></a></th>
                    <th>
                        <a href="delete-course.php?courseid=<?=$row['courseid']?>"><button>Delete</button></a>
                    </th>
                </tr>
        <?php }
        }
    }
}

?>