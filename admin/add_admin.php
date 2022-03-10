<?php include('./part/header.php') ?>
 <div class="main-content">
        <div class="wrapper">
          <?php
          if(isset($_SESSION['add'])){
            echo $_SESSION['add'];
            unset($_SESSION['add']);
          }
          ?>
        <h1>add admin</h1>
        
      <form action="" method="POST">
      <div class="mb-3 row">
    <label for="inputPassword" class="col-sm-2 col-form-label">Fullname</label>
    <div >
      <input type="text" class="form-control" id="inputPassword" width="50%" name="fullname">
    </div>
          <div class="mb-3 row">
    <label for="inputPassword1" class="col-sm-2 col-form-label">Username</label>
    <div >
      <input type="text" class="form-control" id="inputPassword1" width="50%" name='username'>
    </div>
          <div >
    <label for="inputPassword2" class="col-sm-2 col-form-label">Password</label>
    <div >
      <input type="password" class="form-control" id="inputPassword1" name="pass">
    </div>
    <br>
    <input type="submit" name="submit">
      </form>
</div>
</div>

<?php include('./part/footer.php') ?>

     <?php
     if(isset($_POST["submit"]))
     {
      //  echo "clicked";
       $fullname=$_POST['fullname'];
      $username=$_POST['username'];
       $pass=md5($_POST['pass']);

      //sql for save database   
      $sql = "INSERT INTO tbl_admin (fullname	,username,password)
	   VALUES ('$fullname','$username','$pass')";

      // echo $sql;
      // execute query
      // $conn=mysqli_connect('localhost','root','')or die(mysqli_error());
      // $db_select=mysqli_select_db($conn,'food_orderr')  or die(mysqli_error());

      // $servername='localhost';
      // $username='root';
      // $password='';
      // $dbname = "food_order";
      // $conn=mysqli_connect($servername,$username,$password,"$dbname");
      // if(!$conn){
      //    die('Could not Connect My Sql:' .mysqli_error());
      // }
      $res=mysqli_query($conn,$sql) or die("ERROR: Could not connect. " . mysqli_connect_error());
      if($res==true)
      {
        // echo "inserted";
        $_SESSION["add"]="admin added "; 
        header("location:"."http://localhost/foodorder/admin/admin_manage.php");
         
      }
      else{
        // echo "not inserted";
        $_SESSION["add"]="faield added "; 
        header("location:"."http://localhost/foodorder/admin/add_admin.php");
      }

     }
    //  else{
    //    echo 'not clicked';
    //  }

    
    ?>
