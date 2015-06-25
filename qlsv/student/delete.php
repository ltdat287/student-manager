<?php
require('../common/header.php');
require('../helpers/connect.php');
?>

    <h1>Trang xoa sinh vien</h1>
<?php
/**
 * Created by PhpStorm.
 * User: hp
 * Date: 24/6/2015
 * Time: 5:36 PM
 */
$id = $_GET['id'];
echo $id;
$connect = new Connect();
$connect->connect_db();
$sql = "DELETE FROM sinhvien WHERE id=$id";
mysql_query($sql);

header("location:list.php");
require('../common/footer.php');