<meta charset="utf-8">
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
$connect = mysql_connect("localhost", "root", "") or die("server disconnect");
mysql_select_db("qlsv", $connect);
$sql = "DELETE FROM sinhvien WHERE id='" . $id . "'";
mysql_query($sql);

header("location:list.php");