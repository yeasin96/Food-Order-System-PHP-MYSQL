<?php include('./part/header.php') ?>

<div class="main-content">
<div class="main-content">
    <h1>Add Cat</h1>

    
    <br>
    <br>
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="mb-3 row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Tittle</label>
            <div>

                <input type="text" class="form-control" id="inputPassword" width="50%" name="title">
            </div>
        </div>
        <label for="inputPassword" class="col-sm-2 col-form-label">Featcherd:</label>
        <div>
            <input class="form-check-input" type="radio" name="feat" id="radioNoLabel1" value="yes" aria-label="..."> Yes
        </div>
        <div>
            <input class="form-check-input" type="radio" name="feat" id="radioNoLabel1" value="no" aria-label="..."> No
        </div>
        <label for="inputPassword" class="col-sm-2 col-form-label">Active</label>
        <div>
            <input class="form-check-input" type="radio" name="active" id="radioNoLabel1" value="yes"> Yes
        </div>
        <div>
            <input class="form-check-input" type="radio" name="active" id="radioNoLabel1" value="no"> No
        </div>
        <br>
        <input type="file" name="uploadfile">

        <br>
        <br>
        <input type="submit" name="submit">





    </form>
    <?php
    if (isset($_POST['submit'])) {

        $title = $_POST['title'];

        if (isset($_POST['feat'])) {
            $feat = $_POST['feat'];
        } else {
            $feat = 'no';
        }

        if (isset($_POST['active'])) {
            $active = $_POST['active'];
        } else {
            $active = 'no';
        }
        // echo $active;
        // echo $title;
        // echo $feat;


        // echo $active;

        if ($_FILES['uploadfile']['name']) {
            //upload image

            $filename = $_FILES["uploadfile"]["name"];
            //renameing
            if ($filename != '') {
                $ext = end(explode('.', $filename));
                $filename = 'food_cat' . rand(000, 999) . '.' . $ext;

                $tempname = $_FILES["uploadfile"]["tmp_name"];
                $folder = './img/' . $filename;
                $upload = move_uploaded_file($tempname, $folder);
                if ($upload == false) {
                    $_SESSION['upload'] = 'error';
                    header("location:" . "http://localhost/foodorder/admin/cat.php");
                    die();
                }
            }
        } else {
            $filename = '';
        }


        $sql = "INSERT INTO tbl_catagori (tittle,image_name,featured,active)
VALUES ('$title','$filename','$feat','$active')";
        $res = mysqli_query($conn, $sql);
        if ($res == true) {
            // echo "inserted";
            $_SESSION["add"] = "cat added ";
            header("location:" . "http://localhost/foodorder/admin/cat.php");
        } else {
            // echo "not inserted";
            $_SESSION["add"] = "faield added ";
            header("location:" . "http://localhost/foodorder/admin/cat.php");
        }
    }

    ?>

</div>
</div>
<?php include('./part/footer.php') ?>