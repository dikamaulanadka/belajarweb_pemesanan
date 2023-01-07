<?php
session_start();
include 'koneksi.php';

if (isset($_SESSION['username'],$_SESSION['userpassword'])) {
    header("location:index.html");
}
if (isset($_POST['proseslog'])) {

    $username =$_POST['txtusername'];
    $userpassword =$_POST['txtpassword'];
    $query = "select * from useraccount where username = '$username' and userpassword='$userpassword'";
    $sql = mysqli_query($conn,$query);
    $cek = mysqli_num_rows($sql);
    
    if ($cek > 0) {
        $_SESSION['username'] = $_POST['txtusername'] || $_SESSION['userpassword'] = $_POST['txtpassword'];
        echo "<meta http-equiv=refresh content=0;url='index2.html'>";
    }
        else if (empty($_POST['username']) && empty($_POST['userpassword']))
		{
			echo "<script >alert('masuukan')</script>";
			echo "<meta http-equiv=refresh content=1;url='registrasi.html'>";
		}
		else if (($_SESSION['username'] <> $_POST['txtusername']) && ($_SESSION['userpassword'] == $_POST['txtpassword']))
		{ 
			echo "<p align=center ><span style='font-size:12px;font-family:Geometr415 Blk BT;color:yellow'>   USERNAME SALAH! </span></p>";
			echo "<meta http-equiv=refresh content=1;url='registrasi.html'>";
		}
		else if (($_SESSION['username'] == $_POST['txtusername']) && ($_SESSION['userpassword'] <> $_POST['txtpassword']))
		{
			echo "<p align=center><span style='font-size:12px;font-family:Geometr415 Blk BT;color:yellow'>  PASSWORD SALAH! </span></p>";
			echo "<meta http-equiv=refresh content=1;url='registrasi.html'>";
		}
		
		else if (($_SESSION['username'] <> $_POST['txtusername']) && ($_SESSION['userpassword'] <> $_POST['txtpassword'])){
			echo "<p align=center> <span style='font-size:12px;font-family:Geometr415 Blk BT;color:yellow'> USERNAME & PASSWORD SALAH! </span></p>";
			echo "<meta http-equiv=refresh content=1;url='registrasi.html'>";
		}
    
}


?>