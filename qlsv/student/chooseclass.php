<?php
require('../common/header.php');
require('../helpers/connect.php');
?>
    <h1>Trang chon lop hoc sho sinh vien</h1>
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
        $updateclass = 'UPDATE sinhvien SET class="' . $mang['classname'] . '" WHERE id="'.$student['id'].'"';
        mysql_query($updateclass);
        echo 'Chon lop thanh cong';
        header('location:list.php');
    } else {
        echo 'Chua chon lop';
    }
}
?>
    <form action="" method="post">
        <label>Ten sinh vien:<?php echo $student['fullname'] ?></label>
        <br/>
        <label>Que quan:<?php echo $student['address'] ?></label>
        <br/>
        <label>Gioi tinh:<?php echo ($student['gender'] == 1) ? 'Nam' : 'Nu' ?></label>
        <br/>
        <label>Ten lop</label>
        <select name="chonlop">
            <?php foreach ($data as $item) {
                echo '<option value="' . $item['id'] . '">Lop: ' . $item['classname'] . ' | so luong :' . $item['soluong'] . '</option>';
            } ?>
        </select>
        <br/>
        <input type="submit" name="choose" value="Chon lop"/>
    </form>
<?php
require('../common/footer.php');
?>