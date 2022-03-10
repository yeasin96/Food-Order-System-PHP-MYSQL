<?php include('./menu/header.php') ?>
<?php include('/xampp/htdocs/foodorder/admin/const.php') ?>
<!-- fOOD sEARCH Section Ends Here -->
<section class="food-search text-center">
    <div class="container">
        <h2>Catagories</h2>

    </div>


</section>

    <!-- CAtegories Section Starts Here -->
    <section class="categories">
        <div class="container">
            <h2 class="text-center">Explore Foods</h2>

            <!-- <a href="category-foods.html">
            <div class="box-3 float-container">
                <img src="images/pizza.jpg" alt="Pizza" class="img-responsive img-curve">

                <h3 class="float-text text-white">Pizza</h3>
            </div>
            </a> -->

            <?php
        $sql = "SELECT * FROM `tbl_catagori` WHERE active='yes'";
        $res = mysqli_query($conn, $sql);
        $count = mysqli_num_rows($res);
        if ($count > 0) {
            while ($row = mysqli_fetch_assoc($res)) {
                $id = $row['id'];
                $title = $row['tittle'];
                $img = $row['image_name'];
        ?>
            <a href="http://localhost/foodorder/category-foods.php?cat_id=<?php echo $id?>">
                    <div class="box-3 float-container">
                        <?php
                        if ($img == '') {
                            echo "no img added";
                        } else {
                        ?>
                            <img src="<?php echo 'http://localhost/foodorder/admin/img/' . $img; ?>" alt="Pizza" class="img-responsive img-curve">
                        <?php

                        }
                        ?>


                        <h3 class="float-text text-white"><?php echo $title; ?></h3>
                    </div>
                </a>

        <?php
            }
        } else {
            echo 'no catagori';
        }

        ?>

            
            

            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Categories Section Ends Here -->


    <!-- social Section Starts Here -->
    <?php include('./menu/footer.php') ?>