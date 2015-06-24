<?php
/**
 * Created by PhpStorm.
 * User: hp
 * Date: 24/6/2015
 * Time: 9:30 AM
 */
$db_host = 'localhost';
$db_name = 'danhsachsv';
$db_username = 'root';
$db_pass = '';
$conn = mysql_connect($db_host, $db_username, $db_pass) or die('khong the ket noi duoc server');
mysql_select_db($db_name, $conn) or die('khong the chon database');
?>