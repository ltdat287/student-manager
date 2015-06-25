<?php
require '../helpers/connect.php';
require '../common/header.php';

$connect = new Connect();
$connect->connect_db();
$data = $connect->query('SELECT * FROM sinhvien');
?>

<a href="/student/qlsv/student/insert.php">Add</a>

<table border="1" width="700">
    <tr>
        <td>Name</td>
        <td>Email</td>
        <td>Address</td>
        <td>Phone</td>
        <td>Gender</td>
        <td>Class</td>
        <td>Choose Class</td>
        <td>Edit</td>
        <td>Delete</td>
    </tr>

    <?php
    foreach ($data as $item)
    {
        ?>
        <tr>
            <td><?php echo (isset($item['fullname'])) ? $item['fullname'] : '' ?></td>
            <td><?php echo (isset($item['email'])) ? $item['email'] : '' ?></td>
            <td><?php echo (isset($item['address'])) ? $item['address'] : '' ?></td>
            <td><?php echo (isset($item['phone'])) ? $item['phone'] : '' ?></td>
            <td><?php echo (isset($item['gender']) && $item['gender'] == 1) ? 'Male' : 'Fmale' ?></td>
            <td><?php echo (isset($item['class'])) ? $item['class'] : '' ?></td>
            <td>
                <a href="/student/qlsv/student/chooseclass.php?id=<?php echo $item['id'] ?>">Choose</a>
            </td>
            <td>
                <a href="/student/qlsv/student/edit.php?id=<?php echo $item['id'] ?>">Edit</a>
            </td>
            <td>
                <a href="/student/qlsv/student/delete.php?id=<?php echo $item['id'] ?>">Delete</a>
            </td>
        </tr>
        <?php
    }
    ?>

</table>

<?php require '../common/footer.php' ?>