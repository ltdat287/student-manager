<?php
require('../common/header.php');
require('../helpers/connect.php');
?>
    <h2 class="page-header"> Trang sua thong tin lop</h2>
<?php
$id = $_GET['id'];
$connect = new Connect();
$connect->connect_db();
$sql = "SELECT * FROM class WHERE id=$id";
$query = mysql_query($sql);
$data = mysql_fetch_assoc($query);

if (isset($_POST['them'])) {
    $class = $soluong = "";
    if ($_POST['class'] == "") {
        $errorclass = 'Hay dien ten lop';
    } else {
        $class = $_POST['class'];
    }
    if ($_POST['soluong'] == "" OR !is_numeric($_POST['soluong']) OR $_POST['soluong'] < 0) {
        $errorsoluong = 'Hay dien so luong hoc sinh';
    } else {
        $soluong = $_POST['soluong'];
    }
    if ($class AND $soluong){

        $update = "UPDATE class SET classname='".$class."',soluong='".$soluong."' WHERE id='".$id."'";
        mysql_query($update);
        header('location:list.php');

    } else{
        echo '<h2>Sua lop khong thanh cong</h2>';
    }
}

?>

    <form action="" method="post" role="form">
        <div class="form-group">
        <label>Ten lop:</label>
        <input class="form-control" type="text" name="class" value="<?php echo $data['classname'] ?>"/>
        <span class="error"><?php echo isset($errorclass) ? $errorclass : "" ?></span>
        </div>
        <div class="form-group">
        <label>So hoc sinh:</label>
        <input class="form-control" type="number" name="soluong" value="<?php echo $data['soluong'] ?>"/>
        <span class="error"><?php echo isset($errorsoluong) ? $errorsoluong : "" ?></span>
        </div>
        <input type="submit" name="them" value="Sua" class="btn"/>
    </form>
<?php
require('../common/footer.php');
?>