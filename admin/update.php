<?php include('./part/header.php') ?>

<div class="main-content">
        <div class="wrapper">

        <?php 
        $id=$_GET['id'];

        $sql="SELECT * FROM tbl_admin WHERE id=$id";
        // $sql="delete from tbl_admin  id=$id";
        $res=mysqli_query($conn,$sql);
        if($res==true){
          $count=mysqli_num_rows($res);
          if($count==1){
            $row=mysqli_fetch_assoc($res);
            $full_name=$row['fullname'];
            $username=$row['username'];
          }
          else{
            header("location:"."http://localhost/foodorder/admin/admin_manage.php");
          }
        }
        
        ?>

        <h1>update</h1>

        <form action="" method="POST">
      <div class="mb-3 row">
    <label for="inputPassword" class="col-sm-2 col-form-label">Fullname</label>
    <div >

      <input type="text" class="form-control" id="inputPassword" width="50%" name="fullname" value="<?PHP  echo $full_name ?>">
    </div>
          <div class="mb-3 row">
    <label for="inputPassword1" class="col-sm-2 col-form-label">Username</label>
    <div >
      <input type="text" class="form-control" id="inputPassword1" width="50%" name='username' value="<?PHP  echo $username?>">
    </div>
          <div >
    
    <br>
    <input type="submit" name="submit">
    <input type="hidden" name="id" value="<?php echo $id ?>">

      </form>
<?php

if(isset($_POST['submit']))
{
  $id=$_POST['id'];
  $fullname=$_POST['fullname'];
  $username=$_POST['username'];
  $sql="UPDATE tbl_admin SET fullname='$fullname',username='$username' WHERE id='$id'";
  $res=mysqli_query($conn,$sql);
  if($res==true)
  {
    $_SESSION['update']='updated';
    header("location:"."http://localhost/foodorder/admin/admin_manage.php");
  }else{
    $_SESSION['update']='updated failed';
    header("location:"."http://localhost/foodorder/admin/admin_manage.php");
  }
  
  
}

?>


<!-- <form action="">
    <input type="text">
    <input type="text">
</form> -->




        </div>
        </div>

<?php include('./part/footer.php') ?>