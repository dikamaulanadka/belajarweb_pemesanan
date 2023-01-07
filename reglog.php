<?php 

  include 'koneksi.php';
  if (isset($_POST['btnsimpan'])) {
      //ambil nilai form yg dikirim
      $username =$_POST['txtusername'];
      $userpassword =$_POST['txtpassword'];
      $useremail =$_POST['txtemail'];
  
  //eksekusi query
  $query = "INSERT INTO useraccount (username,userpassword,email) VALUES ('$username','$userpassword','$useremail')";
  $sql = mysqli_query($conn,$query);


  //check sql query benar/tidak
  if ($sql) {
      echo 'Input data berhasil';
  } else {
      echo 'input data gagal';
  }

  }
?>