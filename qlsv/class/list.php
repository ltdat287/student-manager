<?php
require '../helpers/connect.php';
require '../common/header.php';

$connect = new Connect();
$connect->connect_db();
$data = $connect->query('SELECT * FROM class');
?>

<a href="/student/qlsv/class/addclass.php">Add class</a>

<table border="1" width="600">
    <tr>
        <td>Name Class</td>
        <td>Hoc sinh</td>
        <td>Sua</td>
        <td>Xoa</td>
    </tr>

    <?php
    foreach ($data as $item) {
        ?>
        <tr>
            <td><?php echo (isset($item['classname'])) ? $item['classname'] : '' ?></td>
            <td><?php echo (isset($item['soluong'])) ? $item['soluong'] : '' ?></td>
            <td>
                <a href="/student/qlsv/class/editclass.php?id=<?php echo $item['id'] ?>">Edit</a>
            </td>
            <td>
                <a href="/student/qlsv/class/delete.php?id=<?php echo $item['id'] ?>">Delete</a>
            </td>
        </tr>
<?php
}
?>

</table>

<?php require '../common/footer.php' ?>