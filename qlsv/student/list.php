<?php
require '../helpers/connect.php';
require '../common/header.php';

$connect = new Connect();
$connect->connect_db();
$data = $connect->query('SELECT * FROM sinhvien');
?>

<a href="/student/qlsv/student/add.php">Add</a>

<table border="1" width="600">
    <tr>
        <td>Name</td>
        <td>Email</td>
        <td>Address</td>
        <td>Phone</td>
        <td>Gender</td>
        <td>Edit</td>
        <td>Delete</td>
    </tr>

    <?php
    foreach ($data as $item)
    {
        ?>
        <tr>
            <td><?php (isset($item['fullname'])) ? $item['fullname'] : '' ?></td>
            <td><?php (isset($item['email'])) ? $item['email'] : '' ?></td>
            <td><?php (isset($item['address'])) ? $item['address'] : '' ?></td>
            <td><?php (isset($item['phone'])) ? $item['phone'] : '' ?></td>
            <td><?php (isset($item['gender']) && $item['gender'] == 1) ? 'Male' : 'Fmale' ?></td>
            <td>
                <a href="/student/qlsv/student/edit.php?id=<?php $item['id'] ?>">Edit</a>
            </td>
            <td>
                <a href="/student/qlsv/student/delete.php?id=<?php $item['id'] ?>">Delete</a>
            </td>
        </tr>
        <?php
    }
    ?>

</table>

<?php require '../common/footer.php' ?>