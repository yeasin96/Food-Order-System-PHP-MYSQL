<?php include('./part/header.php') ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Update Food</h1>
        <?php
        if (isset($_GET['id'])) {
            echo $id = $_GET['id'];
            $sql = "SELECT * FROM tbl_food WHERE id=$id";
            // $sql="delete from tbl_admin  id=$id";
            $res = mysqli_query($conn, $sql);
            if ($res == true) {
                $count = mysqli_num_rows($res);
                if ($count == 1) {
                    $row = mysqli_fetch_assoc($res);
                    $id = $row['id'];
                    $title = $row['tittle'];
                    $image = $row['image_name'];
                    $feat = $row['featured'];
                    $active = $row['active'];
                    $price = $row['price'];
                    $desci = $row['description'];
                    $current_cat = $row['cat_id'];
                } else {
                    $_SESSION['not'] = 'not found';
                    header("location:" . "http://localhost/foodorder/admin/food.php");
                }
            }
        } else {
            header('location:' . "http://localhost/foodorder/admin/food.php");
        }

        ?>
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="mb-3 row">
                <label for="inputPassword" class="col-sm-2 col-form-label">Title</label>
                <div>

                    <input type="text" class="form-control" id="inputPassword" width="50%" name="title" value="<?php echo $title ?>">
                </div>
            </div>
            <div class="form-floating">
                <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px" name='desci'><?php echo $desci ?></textarea>
                <label for="floatingTextarea2">Comments</label>
            </div>
            <div class="mb-3 row">
                <label for="inputPassword1" class="col-sm-2 col-form-label">Price</label>
                <div>
                    <input type="number" class="form-control" id="inputPassword1" width="50%" name='price' value="<?php echo $price ?>">
                </div>
            </div>

            <div class="mb-3">
                <label for="formFileMultiple" class="form-label" > Files Input</label>
                <input class="form-control" type="file" id="formFileMultiple" multiple name='upfile' value="<?php echo $image?>">
            </div>
            <div class="mb-3">
                <label for="formFileMultiple" class="form-label">Featured :</label>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="feat" id="inlineRadio1" value="Yes" <?php if ($feat == 'Yes') {
                                                                                                                echo 'checked';
                                                                                                            } ?>>
                    <label class="form-check-label" for="inlineRadio1">Yes</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="feat" id="inlineRadio1" value="No" <?php if ($feat == 'No') {
                                                                                                                echo 'checked';
                                                                                                            } ?>>
                    <label class="form-check-label" for="inlineRadio1">No</label>
                </div>

            </div>
            <div class="mb-3">
                <label for="formFileMultiple" class="form-label">Active :</label>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="active" id="inlineRadio1" value="Yes" <?php if ($active == 'Yes') {
                                                                                                                    echo 'checked';
                                                                                                                } ?>>
                    <label class="form-check-label" for="inlineRadio1">Yes</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="active" id="inlineRadio1" value="No" <?php if ($active == 'No') {
                                                                                                                echo 'checked';
                                                                                                            } ?>>
                    <label class="form-check-label" for="inlineRadio1">No</label>
                </div>

            </div>

            <div class="mb-3 row">
                <label for="inputPassword1" class="col-sm-2 col-form-label">Catagori</label>
                <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name='cata'>
                    <!-- <option selected>Open this select menu</option> -->

                    <?php
                    $sql2 = "SELECT * From tbl_catagori WHERE active='yes'";
                    $res2 = mysqli_query($conn, $sql2);
                    $count = mysqli_num_rows($res2);
                    if ($count > 0) {
                        while ($row = mysqli_fetch_assoc($res2)) {

                            $id1 = $row['id'];
                            $title1 = $row['tittle'];
                            // echo " <option value='$id'>$title</option>";
                    ?>
                            <option <?php if ($id1 == $current_cat) {
                                        echo 'selected';
                                    } ?> value="<?php echo $id ?>"><?php echo $title1; ?></option>
                    <?php
                        }
                    } else {
                        echo "<option value='0'>No catagori</option>";
                    }
                    ?>

                </select>
            </div>
            <br>
            <input type="submit" name="submit">
        </form>



    </div>
</div>



<?php include('./part/footer.php') ?>

<?php

if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $desi = $_POST['desci'];
    $price = $_POST['price'];
    $cata = $_POST['cata'];
    if (isset($_POST['feat'])) {
        $featt = $_POST['feat'];
    } else {
        $featt = 'no';
    }

    if (isset($_POST['active'])) {
        $activet = $_POST['active'];
    } else {
        $activet = 'no';
    }
    // $feat . $active;

    if ($_FILES['upfile']['name']) {
        //upload image

        $filename = $_FILES["upfile"]["name"];
        
        // if ($image != '') {
        //     $path = './img/food/' . $image;
        //     // echo $path;
        //     $remove = unlink($path);

        if ($image != '') {
            $path = './img/food/' . $image;
            echo $path;
            $remove = unlink($path);
            if ($remove == false) {
                // $_SESSION['remove'] = "img no deleted";
                header('location:' . "http://localhost/foodorder/admin/cat.php");
                die();
            }
        }

        if ($filename != '') {
            $ext1 = explode('.', $filename);
            $ext = end($ext1);
            $filename = 'food_cat' . rand(000, 999) . '.' . $ext;

            $tempname = $_FILES["upfile"]["tmp_name"];
            $folder = './img/food/' . $filename;
            $upload = move_uploaded_file($tempname, $folder);
            if ($upload == false) {
                $_SESSION['upload'] = 'error';
                header("location:" . "http://localhost/foodorder/admin/add_food.php");
                die();
            }
        }
    } else {
        $filename = $image;
    }

    $sql3 = "UPDATE tbl_food SET `tittle`='$title', `image_name`='$filename', `featured`='$featt', `active`='$activet', `cat_id`='$cata', `price`=$price, `description`='$desi' WHERE id=$id;";
    $res3 = mysqli_query($conn, $sql3);
    if ($res3 == true) {
        // echo "inserted";
        // if ($image != '') {
            // $path = './img/food/' . $image;
            // echo $path;
            // $remove = unlink($path);
            // if ($remove == false) {
            //     // $_SESSION['remove'] = "img no deleted";
            //     header('location:' . "http://localhost/foodorder/admin/cat.php");
            //     die();
            // }
        // }
        $_SESSION["add"] = "cat added ";
        // header("location:"."http://localhost/foodorder/admin/add_food.php.php");
        echo "<script>window.location.href='http://localhost/foodorder/admin/food.php'</script>";
    } else {
        // echo "not inserted";
        $_SESSION["add"] = "faield added ";
        echo "<script>window.location.href='http://localhost/foodorder/admin/food.php'</script>";
    }
}
?>