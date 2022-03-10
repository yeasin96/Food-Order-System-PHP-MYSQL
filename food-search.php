<?php include('./menu/header.php') ?>
<?php include('/xampp/htdocs/foodorder/admin/const.php') ?>
<!-- fOOD sEARCH Section Ends Here -->
<section class="food-search text-center">
    <div class="container">
        <h2>Food On You seaarch <a href="#" class='text-white'><?php echo $search = $_POST['search'];
                                                                ?></a></h2>

    </div>


</section>


<!-- fOOD MEnu Section Starts Here -->
<section class="food-menu">
    <div class="container">
        <h2 class="text-center">Food Menu</h2>


        <?php

        $search = $_POST['search'];

        $sql = "SELECT * From tbl_food where tittle like '%$search%' OR description like '%$search%' ";
        $res = mysqli_query($conn, $sql);
        $count = mysqli_num_rows($res);
        if ($count > 0) {
            while ($row = mysqli_fetch_assoc($res)) {
                $id = $row['id'];
                $title = $row['tittle'];
                $img = $row['image_name'];
                $des = $row['description'];
                $price = $row['price'];
        ?>
                <div class="food-menu-box">
                    <div class="food-menu-img">
                        <?php
                        if ($img == '') {
                            echo "no img added";
                        } else {
                        ?>
                            <img src="<?php echo 'http://localhost/foodorder/admin/img/food/' . $img; ?>" alt="Pizza" class="img-responsive img-curve">
                        <?php

                        }
                        ?>
                    </div>


                    <div class="food-menu-desc">
                        <h4><?php echo $title ?></h4>
                        <p class="food-price"><?php echo $price ?></p>
                        <p class="food-detail">
                            <?php echo $des ?>
                        </p>
                        <br>

                        <a href="order.html" class="btn btn-primary">Order Now</a>
                    </div>
                    </div>
                

        <?php

            }
        } else {
            echo 'not avilable';
        }

        ?>
        
        <div class="clearfix"></div>
    </div>

</section>
<!-- fOOD Menu Section Ends Here -->
<?php include('/xampp/htdocs/foodorder/menu/footer.php') ?>