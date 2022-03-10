<?php

include('./const.php');

if (isset($_GET['id']) && isset($_GET['image'])) {

    $id = $_GET['id'];
    $image = $_GET['image'];
    echo $id;
    echo $image;

    if ($image != '') {
        $path = './img/' . $image;
        // echo $path;
        $remove = unlink($path);
        if ($remove == false) {
            $_SESSION['remove'] = "img no deleted";
            header('location:' . "http://localhost/foodorder/admin/cat.php");
            die();
        }
    }

    $sql = "delete from tbl_catagori where id=$id";
    $res = mysqli_query($conn, $sql);

    if ($res == true) {
        // echo "admin deleted";

        $_SESSION['deleted'] = "deleted successfully";
        header("location:" . "http://localhost/foodorder/admin/cat.php");
    }
} else {

    header('location:' . "http://localhost/foodorder/admin/cat.php");
}
