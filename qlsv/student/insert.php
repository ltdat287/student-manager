<?php
require '../common/header.php';
require '../helpers/connect.php';

$fullname = $email = $address = $phone = $gender = '';

if (isset($_POST['ok'])) {
    //fullname
    if ($_POST['fullname'] == "") {
        $errorFullname = "Vui long nhap";
    } else {
        $fullname = $_POST['fullname'];
    }
    //email
    if ($_POST['email'] == "") {
        $errorEmail = "Vui long nhap email";
    } else {
        $email = $_POST['email'];
    }
    //address
    if ($_POST['address'] == "") {
        $errorAddress = "Vui long nhap dia chi";
    } else {
        $address = $_POST['address'];
    }
    //phone
    if ($_POST['phone'] == "") {
        $errorphone = "Vui long nhap so dien thoai";
    } else {
        $phone = $_POST['phone'];
    }
    //gioi tinh
    if (!isset($_POST['gender'])) {
        $errorgender = "Vui long chon gioi tinh";
    } else {
        $gender = $_POST['gender'];
    }
    //insert database
    if ($fullname && $email && $address && $phone && $gender) {

        $connect = new connect();
        $connect->connect_db();
        $sql = "INSERT INTO sinhvien(fullname,email,address,phone,gender) VALUES('" . $fullname . "','" . $email . "','" . $address . "','" . $phone . "','" . $gender . "')";
        mysql_query($sql);
        echo "<h2>Them thanh cong</h2>";
    } else {
        echo "<h2>Khong thanh cong</h2>";
    }
}
?>
<form action="insert.php" method="post">
    <label>Ho va Ten</label>
    <input type="text" name="fullname" value=""/>
    <span class="error">
    <?php echo isset($errorFullname) ? $errorFullname : ""; ?>
    </span>
    <br/>
    <label>Email</label>
    <input type="text" name="email" value=""/>
    <span class="error">
    <?php echo isset($errorEmail) ? $errorEmail : ""; ?>
    </span>
    <br/>
    <label>Que Quan</label>
    <input type="text" name="address" value=""/>
    <span class="error">
    <?php echo isset($errorAddress) ? $errorAddress : ""; ?>
    </span>
    <br/>
    <label>Dien Thoai</label>
    <input type="text" name="phone" value=""/>
    <span class="error">
    <?php echo isset($errorphone) ? $errorphone : ""; ?>
    </span>
    <br/>
    <label>Gioi tinh</label>
    Nam<input type="radio" name="gender" value="1"/>
    Nu<input type="radio" name="gender" value="2"/>
    <span class="error">
    <?php echo isset($errorgender) ? $errorgender : ""; ?>
    </span>
    <br/>
    <label>&nbsp</label>
    <input type="submit" name="ok" value="Them moi"/>
</form>
<?php require('../common/footer.php');
?>
