<?php include('./part/header.php') ?>

<div class="main-content">
    <div class="wrapper">

        <h1>Change Password</h1>
        <?php
        if(isset($_GET['id'])){

            $id=$_GET['id'];
        }
        ?>

        <form action="" method="POST">
            <div class="mb-3 row">
                <label for="inputPassword" class="col-sm-2 col-form-label">Current Password</label>
                <div>

                    <input type="text" class="form-control" id="inputPassword" width="50%" name="current">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="inputPassword1" class="col-sm-2 col-form-label">New Password</label>
                <div>
                    <input type="text" class="form-control" id="inputPassword1" width="50%" name='newpass'>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="inputPassword1" class="col-sm-2 col-form-label">Confirm Password</label>
                <div>
                    <input type="text" class="form-control" id="inputPassword1" width="50%" name='newpasscon'>
                </div>
            </div>

            <br>
            <input type="submit" name="submit">
            <input type="hidden" name="id" value="<?php echo $id ?>">
            <!-- <input type="hidden" name="id" value="<?php echo $id ?>"> -->

            

        </form>







    </div>
</div>

<?php include('./part/footer.php') ?>
<?php
if (isset($_POST['submit']))
{
    // echo "clicked";
    //get data from form
   $id=$_POST['id'];
   $curp=md5($_POST['current']);
    $newp=md5($_POST['newpass']);
    $conp=md5($_POST['newpasscon']);

    //pasword exidt or not

    // echo $id;
    $sql="SELECT * FROM tbl_admin WHERE id='$id' AND password='$curp'";
    $res=mysqli_query($conn,$sql);
    if($res==true){
        $count=mysqli_num_rows($res);
        if($count==1){
            // echo "user found";
            if($newp==$conp){
                $sql2="UPDATE tbl_admin SET password='$conp' WHERE id=$id";
                mysqli_query($conn,$sql2);
                // echo "match";
                if(mysqli_query($conn,$sql2)){
                    $_SESSION["success"]="change password sucessfully";
            header("location:"."http://localhost/foodorder/admin/admin_manage.php");
                }
                else{
                    $_SESSION["error"]="change password faield";
            header("location:"."http://localhost/foodorder/admin/admin_manage.php");
                }
            }
            else{
                $_SESSION["not match"]="not match password";
            header("location:"."http://localhost/foodorder/admin/admin_manage.php");
            }
        }
        else{ 
            $_SESSION["not"]="not Found";
            header("location:"."http://localhost/foodorder/admin/admin_manage.php");
        }
    }

}


?>