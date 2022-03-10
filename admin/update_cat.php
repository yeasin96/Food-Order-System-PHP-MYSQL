<?php include('./part/header.php') ?>

<div class="main-content">
  <div class="wrapper">
    <h1>Update Cat</h1>

    <?php
    if (isset($_GET['id'])) {
      $id = $_GET['id'];
      $sql = "SELECT * FROM tbl_catagori WHERE id=$id";
      // $sql="delete from tbl_admin  id=$id";
      $res = mysqli_query($conn, $sql);
      if ($res == true) {
        $count = mysqli_num_rows($res);
        if ($count == 1) {
          $row = mysqli_fetch_assoc($res);
          $title = $row['tittle'];
          $img = $row['image_name'];
          $feat = $row['featured'];
          $active = $row['active'];
        } else {
          $_SESSION['not'] = 'not found';
          header("location:" . "http://localhost/foodorder/admin/cat.php");
        }
      }
    } else {
      header('location:' . "http://localhost/foodorder/admin/cat.php");
    }

    ?>

    <form action="" method="POST" enctype="multipart/form-data">
      <h4>Title:</h4>
      <input type="text" name="title" value="<?php echo $title ?>">
      <h4>Current img:</h4>
      <?php
      if ($img != '') {
        echo " <img src='http://localhost/foodorder/admin/img/$img' width='100px'>";
      } else {
        echo 'no image added';
      }


      ?>
      <img src="" alt="">
      <h4>new img:</h4>
      <input type="file" name="uploadfile" value="">
      <h4>Featured:</h4>
      <input type="radio" name="feat" value="yes" <?php if ($feat == 'yes') {
                                                    echo 'checked';
                                                  } ?>>Yes
      <input type="radio" name="feat" value="no" <?php if ($feat == 'no') {
                                                    echo 'checked';
                                                  } ?>>No
      <h4>Active:</h4>
      <input <?php if ($active == 'yes') {
                echo 'checked';
              } ?> type="radio" name="active" value="yes">Yes
      <input <?php if ($active == 'no') {
                echo 'checked';
              } ?> type="radio" name="active" value="no">No
      <br>
      <input type="hidden" name="id" value="<?php echo $id ?>">
      <input type="hidden" name="curent_image" value="<?php echo $img ?>">
      <input type="submit" name="submit">

    </form>
  </div>
</div>

<?php

if (isset($_POST['submit'])) {
  $id = $_POST['id'];
  $title1 = $_POST['title'];
  $feat1 = $_POST['feat'];
  $active1 = $_POST['active'];
  $img1 = $_POST['curent_image'];



  if ($_FILES['uploadfile']['name']) {


    //upload image

    $filename = $_FILES["uploadfile"]["name"];

    if ($img != '') {
      $path = './img/' . $img;
      echo $path;
      $remove = unlink($path);
      if ($remove == false) {
        // $_SESSION['remove'] = "img no deleted";
        header('location:' . "http://localhost/foodorder/admin/cat.php");
        die();
      }
    }
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
    $filename = $img;
  }









  //   $sql2="UPDATE tbl_catagori SET tittle='$title1',featured='$feat1 ,active='$active1' WHERE id='$id'";
  $sql2 = "UPDATE tbl_catagori SET tittle='$title1', image_name='$filename',featured='$feat1',active='$active1'  WHERE id='$id'";
  $res2 = mysqli_query($conn, $sql2);
  if ($res2 == true) {


    $_SESSION['update'] = 'updated';
    header("location:" . "http://localhost/foodorder/admin/cat.php");
  } else {
    $_SESSION['update'] = 'updated failed';
    header("location:" . "http://localhost/foodorder/admin/cat.php");
  }
}

?>



<?php include('./part/footer.php') ?>