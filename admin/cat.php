<?php include('./part/header.php') ?>
<div class="main-content">
  <div class="wrapper">

    <h1>Manage cat</h1>
    <br>
    <?php
    if(isset($_SESSION["remove"]))
    echo $_SESSION['remove'];
    unset ($_SESSION['remove']);
    ?>
    <?php
    if(isset($_SESSION['upload']))
    echo $_SESSION['upload'];
    unset ($_SESSION['upload']);
    ?>
    <?php
    if(isset($_SESSION['add']))
    echo $_SESSION['add'];
    unset ($_SESSION['add']);
    ?>
    <?php
    if(isset($_SESSION['deleted']))
    echo $_SESSION['deleted'];
    unset ($_SESSION['deleted']);
    ?>
   
    <?php
    if(isset($_SESSION['not']))
    echo $_SESSION['not'];
    unset ($_SESSION['not']);
    ?>
    <?php
    if(isset($_SESSION['update']))
    echo $_SESSION['update'];
    unset ($_SESSION['update']);
    ?>
   

    <br>
 
    <a href="add_cat.php" class="btn-secondary" style="color:white;padding:1%;"> Cat Add</a>

    <table class="table">
      <thead>
        <tr>
          <th scope="col">S.N</th>
          <th scope="col">Title</th>
          <th scope="col">image</th>
          <th scope="col">Featcherd</th>
          <th scope="col">Active</th>
        </tr>
      </thead>
      <?php
      $sql = "SELECT * From tbl_catagori";
      $res = mysqli_query($conn, $sql);
      if ($res == TRUE) {
        $count = mysqli_num_rows($res); //check how many row here in database
        if ($count > 0) {
          while ($rows = mysqli_fetch_assoc($res)) {
            $id = $rows['id'];
            $title = $rows['tittle'];
            $image = $rows['image_name'];
            $feat = $rows['featured'];
            $active = $rows['active'];

      ?>


            <tr>
              <td><?php echo $id ?></td>
              <td><?php echo $title ?></td>
              <td>
                
              <?php if($image!=''){
                
               echo" <img src='http://localhost/foodorder/admin/img/$image' width='100px'>";
              }
              else{
                echo "not addd";
              }
                ?>
            
            
            </td>
              <td><?php echo $feat ?></td>
              <td><?php echo $active ?></td>
              <td>
                <a href="<?php echo "http://localhost/foodorder/admin/update_cat.php" ?>?id=<?php echo $id;?>" class="btn-secondary"> Update </a>
                &nbsp;
                <!-- <a href="<?php echo "http://localhost/foodorder/admin/delete_cat.php" ?>?id=<?php echo $id;?>" class="btn-secondary"> Delete </a> -->
                <a href="<?php echo "http://localhost/foodorder/admin/delete_cat.php" ?>?id=<?php echo $id ;?>&image=<?php echo $image?> " class="btn-secondary"> Delete</a>
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