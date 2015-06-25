<?php
require('../common/header.php');
require('../helpers/connect.php');
?>

    <h1>Trang xoa LOP</h1>
<?php
$id = $_GET['id'];
echo $id;
$connect = new Connect();
$connect->connect_db();
$sql = "DELETE FROM class WHERE id=$id";
mysql_query($sql);

header("location:list.php");
require('../common/footer.php');