<?php
include('/xampp/htdocs/foodorder/admin/const.php');
//get the id of admin that deleted
echo $id=$_GET['id'];
// ??create sql Quary
$sql="delete from tbl_admin where id=$id";
$res=mysqli_query($conn,$sql);

if($res==true){
    // echo "admin deleted";

    $_SESSION['deleted']="deleted successfully";
    header("location:"."http://localhost/foodorder/admin/admin_manage.php");

}
else{
    echo "failed";
}

// redirecd to mange admin page
?>