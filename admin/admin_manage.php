<?php include('./part/header.php') ?>
<div class="main-content">
  <div class="wrapper">

    <h1>Manage Admin</h1>

    <?php
    if (isset($_SESSION['add'])) {
      echo $_SESSION['add'];
      unset($_SESSION['add']);
    }

    ?>
    <?php
    if (isset($_SESSION['deleted'])) {
      echo $_SESSION['deleted'];
      unset($_SESSION['deleted']);
    }

    ?>
    <?php
    if (isset($_SESSION["not"])) {
      echo $_SESSION["not"];
      unset($_SESSION["not"]);
    }

    ?>
    <?php
    if (isset($_SESSION["not match"])) {
      echo $_SESSION["not match"];
      unset($_SESSION["not match"]);
    }

    ?>
    <?php
    if (isset($_SESSION["success"])) {
      echo $_SESSION["success"];
      unset($_SESSION["success"]);
    }

    ?>
    <?php
    if (isset($_SESSION["error"])) {
      echo $_SESSION["error"];
      unset($_SESSION["error"]);
    }

    ?>
    <div style="color: green;">
      <h3>
        <?php
        if (isset($_SESSION['update'])) {
          echo $_SESSION['update'];
          unset($_SESSION['update']);
        }
        ?>
        <h3>
    </div>

    <br>
    <br>
    <a href="add_admin.php" class="btn-secondary" style="color:white;padding:1%;"> Add admin</a>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">S.N</th>
          <th scope="col">Fulname</th>
          <th scope="col">Username</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <?php
      $sql = "SELECT * From tbl_admin";
      $res = mysqli_query($conn, $sql);
      if ($res == TRUE) {
        $count = mysqli_num_rows($res); //check how many row here in database
        if ($count > 0) {
          while ($rows = mysqli_fetch_assoc($res)) {
            $id = $rows['id'];
            $name = $rows['fullname'];
            $user = $rows['username'];

      ?>


            <tr>
              <td><?php echo $id ?></td>
              <td><?php echo $name ?></td>
              <td><?php echo $user ?></td>
              <td>
                <a href="<?php echo "http://localhost/foodorder/admin/update.php" ?>?id=<?php echo $id  ?>" class="btn-secondary"> Update admin</a>
                <a href="<?php echo "http://localhost/foodorder/admin/upadet_pass.php" ?>?id=<?php echo $id  ?>" class="btn-secondary"> Change password </a>
                <a href="<?php echo "http://localhost/foodorder/admin/delete.php" ?>?id=<?php echo $id  ?>" class="btn-secondary"> Delete admin</a>
              </td>
            </tr>
            <!-- </tbody>
</table> -->


      <?php
          }
        } else {
          echo   "no data in database";
        }
      }
      ?>



    </table>
  </div>


</div>
<?php include('./part/footer.php') ?>