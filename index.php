<?php
	session_start();
	if(!isset($_SESSION['ses_name'])){
		header("location:login.php");
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Welcome to admintrator</title>
<style type="text/css">
a:hover{
	color:#F30
}
ul li{
	margin-bottom:3px;
}
ul li a{
	text-decoration:none;
	color:#000;
	font:12px Tahoma, Geneva, sans-serif;
}
</style>
<script type="text/javascript">
	function check(){
		if(confirm("Bạn thật sự muốn thoát ?")){
			return true;
		}else{
			return false;
		}
	}
</script>
</head>

<body>
<p>Xin chào <span style="color:#F30"><?php echo $_SESSION['ses_name']; ?></span></p>
<ul>
  	<li><a href="index.php">Trang chủ</a></li>
	<li><a href="javascript:void(0)">Quản lý sinh viên</a></li>
    <li><a href="javascript:void(0)">Quản lý lớp</a></li>
	<li><a href="javascript:void(0)">Quản lý điểm</a></li>
    <li><a href="javascript:void(0)">Quản lý tin tức</a></li>
    <li><a href="logout.php" onclick="return check()">Thoát</a></li>
</ul>
</body>
</html>