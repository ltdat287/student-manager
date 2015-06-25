<?php
require('../common/header.php');
require('../helpers/connect.php');
?>
    <h2 class="page-header">Trang chon lop hoc sho sinh vien</h2>
<?php
$id = $_GET['id'];
$connect = new Connect();
$connect->connect_db();
$sql = "SELECT * FROM sinhvien WHERE id=$id";
$query = mysql_query($sql);
$student = mysql_fetch_assoc($query);
//chon lop
$listclass = "SELECT * FROM class";
$data = $connect->query($listclass);


if (isset($_POST['choose'])) {
    $option = isset($_POST['chonlop']) ? $_POST['chonlop'] : false;
    if ($option) {
        $timlop = "SELECT * FROM class WHERE id=$option";
        $lenh = mysql_query($timlop);
        $mang = mysql_fetch_assoc($lenh);
        $updateclass = 'UPDATE sinhvien SET class="' . $mang['classname'] . '" WHERE id="' . $student['id'] . '"';
        mysql_query($updateclass);
        echo 'Chon lop thanh cong';
        header('location:list.php');
    } else {
        echo 'Chua chon lop';
    }
}
?>
    <form action="" method="post" role="form" class="form-horizontal">
        <div class="form-group">
            <label class="control-label">Ten sinh vien:<?php echo $student['fullname'] ?></label>
            <label class="control-label">Que quan:<?php echo $student['address'] ?></label>
            <label class="control-label">Gioi tinh:<?php echo ($student['gender'] == 1) ? 'Nam' : 'Nu' ?></label>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="sel1">Ten lop:</label>

            <div class="col-sm-10">
                <select name="chonlop" class="form-control" id="sel1">
                    <?php foreach ($data as $item) {
                        echo '<option value="' . $item['id'] . '">Lop: ' . $item['classname'] . ' | so luong :' . $item['soluong'] . '</option>';
                    } ?>
                </select>
            </div>
        </div>
        <input type="submit" name="choose" value="Chon lop" class="btn"/>
    </form>
<?php
require('../common/footer.php');
?>