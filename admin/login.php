<?php include('./const.php')?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style2.css">
    <title>Document</title>
</head>
<body>



<div class="login">
  <div class="login-header">
    <h1>Login</h1>
  </div>
  <?php
   if(isset($_SESSION['login'])){
       echo $_SESSION['login'];
       unset ($_SESSION['login']);
   }
  
  ?>
  <div class="login-form">
      <form action="" method="POST">
    <h3>Username:</h3>
    <input type="text" placeholder="Username" name="username"><br>
    <h3>Password:</h3>
    <input type="password" placeholder="Password" name="pass">
    <br>
    <input type="submit" value="Login" class="login-button" name="log" style="padding: 2%;">
    <br>
    <a class="sign-up">Sign Up!</a>
    <br>
    <h6 class="no-access">Can't access your account?</h6>
    </form>
  </div>
</div>


</body>

</html>
<?php
if(isset($_POST['log'])){
    // echo 'login';
    $username=$_POST['username'];
    $pass=md5($_POST['pass']);
    //
    $sql="SELECT *FROM tbl_admin WHERE username='$username' AND password='$pass'";
    $res=mysqli_query($conn,$sql);
    $count=mysqli_num_rows($res);
    if($count==1){
       // $_SESSION['login']='sucessfully';
       header("location:"."http://localhost/foodorder/admin");
    //    echo 'good';

    }
else{
    $_SESSION['login']='not sucessfully chek usename and pass';
    header('location:'.'http://localhost/foodorder/admin/login.php');

}
}
?>