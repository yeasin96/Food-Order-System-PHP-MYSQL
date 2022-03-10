<?php include('../admin/part/header.php') ?>
<div class="main-content">
    <div class="wrapper">
        <?php
        if (isset($_SESSION["upload"]))
            echo $_SESSION['upload'];
        unset($_SESSION['upload']);
        ?>
        <h1> Add Food </h1>

        <br>
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="mb-3 row">
                <label for="inputPassword" class="col-sm-2 col-form-label">Title</label>
                <div>

                    <input type="text" class="form-control" id="inputPassword" width="50%" name="title">
                </div>
            </div>
            <div class="form-floating">
                <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px" name='desci'></textarea>
                <label for="floatingTextarea2">Comments</label>
            </div>
            <div class="mb-3 row">
                <label for="inputPassword1" class="col-sm-2 col-form-label">Price</label>
                <div>
                    <input type="number" class="form-control" id="inputPassword1" width="50%" name='price'>
                </div>
            </div>

            <div class="mb-3">
                <label for="formFileMultiple" class="form-label"> Files Input</label>
                <input class="form-control" type="file" id="formFileMultiple" multiple name='upfile'>
            </div>
            <div class="mb-3">
                <label for="formFileMultiple" class="form-label">Featured :</label>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="feat" id="inlineRadio1" value="Yes">
                    <label class="form-check-label" for="inlineRadio1">Yes</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="feat" id="inlineRadio1" value="No">
                    <label class="form-check-label" for="inlineRadio1">No</label>
                </div>

            </div>
            <div class="mb-3">
                <label for="formFileMultiple" class="form-label">Active :</label>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="active" id="inlineRadio1" value="Yes">
                    <label class="form-check-label" for="inlineRadio1">Yes</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="active" id="inlineRadio1" value="No">
                    <label class="form-check-label" for="inlineRadio1">No</label>
                </div>

            </div>

            <div class="mb-3 row">
                <label for="inputPassword1" class="col-sm-2 col-form-label">Catagori</label>
                <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name='cata'>
                    <option selected>Open this select menu</option>

                    <?php
                    $sql = "SELECT * From tbl_catagori WHERE active='yes'";
                    $res = mysqli_query($conn, $sql);
                    $count = mysqli_num_rows($res);
                    if ($count > 0) {
                        while ($row = mysqli_fetch_assoc($res)) {

                            $id = $row['id'];
                            $title = $row['tittle'];
                            echo " <option value='$id'>$title</option>";
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
                //renameing
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
                $filename = '';
            }

            $sql2 = "INSERT INTO `tbl_food` (`tittle`, `image_name`, `featured`, `active`, `cat_id`, `price`, `description`) VALUES ('$title', '$filename', '$featt', '$activet', '$cata', '$price', '$desi');";
            $res2 = mysqli_query($conn, $sql2);
            if ($res2 == true) {
                // echo "inserted";
                $_SESSION["add"] = "cat added ";
                // header("location:"."http://localhost/foodorder/admin/add_food.php.php");
                echo"<script>window.location.href='http://localhost/foodorder/admin/food.php'</script>";
            } else {
                // echo "not inserted";
                $_SESSION["add"] = "faield added ";
                echo"<script>window.location.href='http://localhost/foodorder/admin/food.php'</script>";
            }
        }
?>
