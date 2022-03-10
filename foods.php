<?php include('/xampp/htdocs/foodorder/menu/header.php') ?>
<?php include('/xampp/htdocs/foodorder/admin/const.php') ?>
<!-- Navbar Section Ends Here -->

<!-- fOOD sEARCH Section Starts Here -->
<section class="food-search text-center">
    <div class="container">

        <form action="http://localhost/foodorder/food-search.php" method="post">
            <input type="search" name="search" placeholder="Search for Food.." required>
            <input type="submit" name="submit" value="Search" class="btn btn-primary">
        </form>

    </div>
</section>



    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>

            <?php
        $sql1 = "SELECT * FROM `tbl_food`";
        $res1 = mysqli_query($conn, $sql1);
        $count1 = mysqli_num_rows($res1);
        if ($count1 > 0) {
            while ($row = mysqli_fetch_assoc($res1)) {
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
            echo 'no catagori';
        }

        ?>


            <div class="clearfix"></div>

            

        </div>

    </section>
    <!-- fOOD Menu Section Ends Here -->

    <?php include('./menu/footer.php') ?>