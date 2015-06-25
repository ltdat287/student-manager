<?php
require '../helpers/connect.php';
require '../common/header.php';

$connect = new Connect();
$connect->connect_db();
$data = $connect->query('SELECT * FROM sinhvien');
?>

<h1 class="page-header">Danh sach sinh vien</h1>
<div class="table-responsive">
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Address</th>
            <th>Phone</th>
            <th>Gender</th>
            <th>Class</th>
            <th>Choose Class</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        </thead>
        <tbody>

        <?php
        foreach ($data as $item) {
            ?>
            <tr>
                <td><?php echo (isset($item['fullname'])) ? $item['fullname'] : '' ?></td>
                <td><?php echo (isset($item['email'])) ? $item['email'] : '' ?></td>
                <td><?php echo (isset($item['address'])) ? $item['address'] : '' ?></td>
                <td><?php echo (isset($item['phone'])) ? $item['phone'] : '' ?></td>
                <td><?php echo (isset($item['gender']) && $item['gender'] == 1) ? 'Male' : 'Fmale' ?></td>
                <td><?php echo (isset($item['class'])) ? $item['class'] : '' ?></td>
                <td>
                    <a class="btn-link" href="../student/chooseclass.php?id=<?php echo $item['id'] ?>">Choose</a>
                </td>
                <td>
                    <a class="btn-link" href="../student/edit.php?id=<?php echo $item['id'] ?>">Edit</a>
                </td>
                <td>
                    <a class="btn-link" href="../student/delete.php?id=<?php echo $item['id'] ?>">Delete</a>
                </td>
            </tr>
        <?php
        }
        ?>

        </tbody>
    </table>
</div>

    <a class="btn-link" href="../student/insert.php">Them sinh vien</a>

<?php require '../common/footer.php' ?>