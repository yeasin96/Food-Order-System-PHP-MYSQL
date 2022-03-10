<?php include('./menu/header.php') ?>
<?php include('/xampp/htdocs/foodorder/admin/const.php') ?>
<?php 
if (isset($_GET['cat_id'])){
$cat_id=$_GET['cat_id'];
$sql="SELECT tittle FROM tbl_catagori WHERE id='$cat_id'";
$res=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($res);
$title=$row['tittle'];
}
else{
header('location:'.'http://localhost/foodorder/');
}
?>
<!-- fOOD sEARCH Section Ends Here -->
<section class="food-search text-center">
    <div class="container">
        <h2>Food On You search <a href="#" class='text-white'><?php echo $title ?></a></h2>

    </div>


</section>


    <!-- fOOD MEnu Section Starts Here -->
    <!-- <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>

            <div class="food-menu-box">
                <div class="food-menu-img">
                    <img src="images/menu-pizza.jpg" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
                </div>

                <div class="food-menu-desc">
                    <h4>Food Title</h4>
                    <p class="food-price">$2.3</p>
                    <p class="food-detail">
                        Made with Italian Sauce, Chicken, and organice vegetables.
                    </p>
                    <br>

                    <a href="#" class="btn btn-primary">Order Now</a>
                </div>
            </div>

            <div class="food-menu-box">
                <div class="food-menu-img">
                    <img src="images/menu-burger.jpg" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
                </div>

                <div class="food-menu-desc">
                    <h4>Smoky Burger</h4>
                    <p class="food-price">$2.3</p>
                    <p class="food-detail">
                        Made with Italian Sauce, Chicken, and organice vegetables.
                    </p>
                    <br>

                    <a href="#" class="btn btn-primary">Order Now</a>
                </div>
            </div>

            <div class="food-menu-box">
                <div class="food-menu-img">
                    <img src="images/menu-burger.jpg" alt="Chicke Hawain Burger" class="img-responsive img-curve">
                </div>

                <div class="food-menu-desc">
                    <h4>Nice Burger</h4>
                    <p class="food-price">$2.3</p>
                    <p class="food-detail">
                        Made with Italian Sauce, Chicken, and organice vegetables.
                    </p>
                    <br>

                    <a href="#" class="btn btn-primary">Order Now</a>
                </div>
            </div>

            <div class="food-menu-box">
                <div class="food-menu-img">
                    <img src="images/menu-pizza.jpg" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
                </div>

                <div class="food-menu-desc">
                    <h4>Food Title</h4>
                    <p class="food-price">$2.3</p>
                    <p class="food-detail">
                        Made with Italian Sauce, Chicken, and organice vegetables.
                    </p>
                    <br>

                    <a href="#" class="btn btn-primary">Order Now</a>
                </div>
            </div>

            <div class="food-menu-box">
                <div class="food-menu-img">
                    <img src="images/menu-pizza.jpg" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
                </div>

                <div class="food-menu-desc">
                    <h4>Food Title</h4>
                    <p class="food-price">$2.3</p>
                    <p class="food-detail">
                        Made with Italian Sauce, Chicken, and organice vegetables.
                    </p>
                    <br>

                    <a href="#" class="btn btn-primary">Order Now</a>
                </div>
            </div>

            <div class="food-menu-box">
                <div class="food-menu-img">
                    <img src="images/menu-momo.jpg" alt="Chicke Hawain Momo" class="img-responsive img-curve">
                </div>

                <div class="food-menu-desc">
                    <h4>Chicken Steam Momo</h4>
                    <p class="food-price">$2.3</p>
                    <p class="food-detail">
                        Made with Italian Sauce, Chicken, and organice vegetables.
                    </p>
                    <br>

                    <a href="#" class="btn btn-primary">Order Now</a>
                </div>
            </div>


            <div class="clearfix"></div>

            

        </div>

    </section> -->
    <!-- fOOD Menu Section Ends Here -->

 <section class="food-menu">
    <div class="container">
        <h2 class="text-center">Food Menu</h2>


        <?php

        $sql1 = "SELECT * From tbl_food where cat_id=$cat_id ";
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
            echo 'not avilable';
        }

        ?>
        
        <div class="clearfix"></div>
    </div> 

</section>
<!-- fOOD Menu Section Ends Here -->
<?php include('/xampp/htdocs/foodorder/menu/footer.php') ?>