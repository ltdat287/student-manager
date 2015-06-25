<?php
require('../common/header.php');
require('../helpers/connect.php');
?>
    <h2 class="page-header"> Trang sua thong tin sinh vien</h2>
<?php
$id = $_GET['id'];
$connect = new Connect();
$connect->connect_db();
$sql = "SELECT * FROM sinhvien WHERE id=$id";
$query = mysql_query($sql);
$data = mysql_fetch_assoc($query);

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
    //update database
    if ($fullname && $email && $address && $phone && $gender) {

        $update = "UPDATE sinhvien SET fullname='" . $fullname . "',
                                          email='" . $email . "',
                                          address='" . $address . "',
                                          phone='" . $phone . "',
                                          gender='" . $gender . "' WHERE id='" . $id . "'";
        mysql_query($update);
        echo "<h2>Sua thanh cong</h2>";
        header('location:list.php');
    } else {
        echo "<h2>Sua khong thanh cong</h2>";
    }
}
?>

    <form action="" method="post" role="form" class="form-horizontal">
        <div class="form-group">
            <label class="control-label col-sm-2">Ho va Ten</label>

            <div class="col-sm-10">
                <input class="form-control" type="text" name="fullname" value="<?php echo $data['fullname']; ?>"/>
                <span class="error">
                <?php echo isset($errorFullname) ? $errorFullname : ""; ?>
                </span>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2">Email</label>

            <div class="col-sm-10">
                <input class="form-control" type="text" name="email" value="<?php echo $data['email']; ?>"/>
                <span class="error">
                <?php echo isset($errorEmail) ? $errorEmail : ""; ?>
                </span>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2">Que quan</label>

            <div class="col-sm-10">
                <input class="form-control" type="text" name="address" value="<?php echo $data['address']; ?>"/>
                <span class="error">
                <?php echo isset($errorAddress) ? $errorAddress : ""; ?>
                </span>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2">So dien thoai</label>

            <div class="col-sm-10">
                <input class="form-control" type="text" name="phone" value="<?php echo $data['phone']; ?>"/>
                <span class="error">
                <?php echo isset($errorphone) ? $errorphone : ""; ?>
                </span>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2">Gioi tinh</label>

            <label class="radio-inline">
                <input type="radio" name="gender" value="1" <?php if ($data['gender'] == 1) {
                    echo 'checked';
                } ?>/>Nam
            </label>

            <label class="radio-inline">
                <input type="radio" name="gender" value="2" <?php if ($data['gender'] == 2) {
                    echo 'checked';
                } ?>/>Nu
            </label>
    <span class="error">
    <?php echo isset($errorgender) ? $errorgender : ""; ?>
    </span>
        </div>
        <label class="control-label col-sm-2">&nbsp</label>
        <input type="submit" name="ok" value="Sua" class="btn"/>
    </form>
<?php
require('../common/footer.php');
?>