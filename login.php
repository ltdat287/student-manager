<?php
session_start();
require("libraries/connect.php");
?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Trang dang nhap</title>
    <style>
        label {
            float: left;
            width: 120px;
        }

        input {
            margin-bottom: 5px;
            margin-top: 5px;
        }
    </style>
</head>
<body>
<?php
/**
 * Created by PhpStorm.
 * User: hp
 * Date: 24/6/2015
 * Time: 10:59 AM
 */

if (isset($_POST['ok'])) {
    $name = "";
    $pass = "";
    if ($_POST['txtname'] == "") {
        echo "Hay dien ten dang nhap";
        die();
    } else {
        $name = $_POST['txtname'];
    }
    if ($_POST['txtpass'] == "") {
        echo "Hay dien pass";
        die();
    } else {
        $pass = md5($_POST['txtpass']);
    }
    $sql = "SELECT * FROM members WHERE username = '" . $name . "' AND password = '" . $pass . "'";
    $result = mysql_query($sql);
    $row = mysql_fetch_row($result);

    if ($row > 0) {
        $data = mysql_fetch_assoc($result);
        $_SESSION['ses_id'] = $data['id'];
        $_SESSION['ses_name'] = $data['username'];
        header("location:index.php");
        exit();
    } else {
        echo "nhap sai thong tin";
        die();
    }
}
?>
<form action="login.php" method="post">
    <label>Ten dang nhap:</label><input type="text" name="txtname" sixe="20"/><br/>
    <label>Mat khau:</label><input type="password" name="txtpass" size="20"/><br/>
    <label>&nbsp</label><input type="submit" name="ok" value="Dang nhap"/>
</form>
</body>
</html>