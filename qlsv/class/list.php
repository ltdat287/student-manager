<?php
require '../helpers/connect.php';
require '../common/header.php';

$connect = new Connect();
$connect->connect_db();
$data = $connect->query('SELECT * FROM class');
?>

    <h1 class="page-header">Danh sach lop</h1>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Name Class</th>
                <th>Hoc sinh</th>
                <th>Sua</th>
                <th>Xoa</th>
            </tr>
            </thead>
            <tbody>

            <?php
            foreach ($data as $item) {
                ?>
                <tr>
                    <td><?php echo (isset($item['classname'])) ? $item['classname'] : '' ?></td>
                    <td><?php echo (isset($item['soluong'])) ? $item['soluong'] : '' ?></td>
                    <td>
                        <a class="btn-link" href="/student/qlsv/class/editclass.php?id=<?php echo $item['id'] ?>">Edit</a>
                    </td>
                    <td>
                        <a class="btn-link" href="/student/qlsv/class/delete.php?id=<?php echo $item['id'] ?>">Delete</a>
                    </td>
                </tr>
            <?php
            }
            ?>

            </tbody>
        </table>
    </div>
    <a class="btn-link" href="/student/qlsv/class/addclass.php">Add class</a>
<?php require '../common/footer.php' ?>