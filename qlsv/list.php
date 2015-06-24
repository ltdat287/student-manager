<meta charset="utf-8"/>
<?php
/**
 * Created by PhpStorm.
 * User: hp
 * Date: 24/6/2015
 * Time: 5:05 PM
 */
$connect = mysql_connect("localhost", "root", "") or die("Khong the ket noi database");
mysql_select_db("qlsv", $connect);
$sql = "SELECT * FROM sinhvien";
$query = mysql_query($sql);
$data = array();

while ($row = mysql_fetch_assoc($query)) {
    $data[] = $row;
}
echo "<table border='1' width='600'>";
echo "<tr>";
echo "<td>Ho va Ten</td>";
echo "<td>Email</td>";
echo "<td>Dia chi</td>";
echo "<td>So dien thoai</td>";
echo "<td>Gioi tinh</td>";
echo "<td>Sua</td>";
echo "<td>Xoa</td>";
echo "</tr>";


foreach ($data as $value) {
    echo "<tr>";
    echo "<td>".$value['fullname']."</td>";
    echo "<td>".$value['email']."</td>";
    echo "<td>".$value['address']."</td>";
    echo "<td>".$value['phone']."</td>";
    if ($value['gender'] == 1){
        echo "<td>Nam</td>";
    } else{
        echo "<td>Nu</td>";
    }
    echo "<td>Sua</td>";
    echo "<td><a href='delete.php?id=".$value['id']."'>Xoa</a></td>";
    echo "</tr>";
}
echo "</table>";