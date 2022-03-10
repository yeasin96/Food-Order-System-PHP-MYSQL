<?php include('./part/header.php') ?>
<?php
if(isset($_GET['id'])&& isset($_GET['image'])){
    $id=$_GET['id'];
    $image=$_GET['image'];
    echo $id.$image;

    if ($image != '') {
        $path = './img/food/' . $image;
        // echo $path;
        $remove = unlink($path);
        if ($remove == false) {
            $_SESSION['remove'] = "img no deleted";
            header('location:' . "http://localhost/foodorder/admin/food.php");
            die();
        }
    }
    $sql = "delete from tbl_food where id=$id";
    $res = mysqli_query($conn, $sql);

    if ($res == true) {
        // echo "admin deleted";

        $_SESSION['deleted'] = "deleted successfully";
        header("location:" . "http://localhost/foodorder/admin/food.php");
    }

}
else {

    header('location:' . "http://localhost/foodorder/admin/food.php");
}

?>
<?php include('./part/footer.php') ?>