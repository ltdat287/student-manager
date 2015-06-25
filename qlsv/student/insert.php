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

<h2 class="page-header">Them moi sinh vien</h2>
<form action="insert.php" method="post" role="form" class="form-horizontal">
    <div class="form-group">
        <label class="control-label col-sm-2">Ho va Ten</label>

        <div class="col-sm-10">
            <input class="form-control" type="text" name="fullname" value=""/>
    <span class="error">
    <?php echo isset($errorFullname) ? $errorFullname : ""; ?>
    </span>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2">Email</label>

        <div class="col-sm-10">
            <input class="form-control" type="text" name="email" value=""/>
    <span class="error">
    <?php echo isset($errorEmail) ? $errorEmail : ""; ?>
    </span>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2">Que Quan</label>

        <div class="col-sm-10">
            <input class="form-control" type="text" name="address" value=""/>
    <span class="error">
    <?php echo isset($errorAddress) ? $errorAddress : ""; ?>
    </span>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2">Dien Thoai</label>

        <div class="col-sm-10">
            <input class="form-control" type="text" name="phone" value=""/>
    <span class="error">
    <?php echo isset($errorphone) ? $errorphone : ""; ?>
    </span>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2">Gioi tinh</label>

        <div class="col-sm-10">
            <label class="radio-inline"><input type="radio" name="gender" value="1"/>Nam</label>
            <label class="radio-inline"><input type="radio" name="gender" value="2"/>Nu</label>
    <span class="error">
    <?php echo isset($errorgender) ? $errorgender : ""; ?>
    </span>
        </div>
    </div>
    <div class="form-group">
        <label>&nbsp</label>
        <input type="submit" name="ok" value="Them moi" class="btn"/>
    </div>
</form>
<?php require('../common/footer.php');
?>
