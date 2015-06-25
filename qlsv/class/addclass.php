<?php
require('../common/header.php');
require('../helpers/connect.php');
?>
    <h1>Trang them moi lop hoc</h1>
<?php
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
        $connect = new Connect();
        $connect->connect_db();
        $sql = 'INSERT INTO class(classname,soluong) VALUES("'.$class.'","'.$soluong.'")';
        $query = mysql_query($sql);
        echo '<h2>Them lop thanh cong</h2><br/>';

        echo'<a href="/student/qlsv/class/list.php">Quay ve trang danh sach lop</a>';
    } else{

        echo '<h2>Them lop khong thanh cong</h2>';
    }
}
?>
    <form action="addclass.php" method="post">
        <label>Ten lop</label>
        <input type="text" name="class" value=""/>
        <span class="error"><?php echo isset($errorclass) ? $errorclass : "" ?></span>
        <br/>
        <label>So hoc sinh</label>
        <input type="number" name="soluong" value=""/>
        <span class="error"><?php echo isset($errorsoluong) ? $errorsoluong : "" ?></span>
        <br/>
        <input type="submit" name="them" value="Them lop"/>
    </form>
<?php
require('../common/footer.php');
?>