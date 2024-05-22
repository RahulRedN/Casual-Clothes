<?php include ('partials-front/menu.php'); ?>

<!-- CLOTHES Search Section Starts Here -->
<section class=" cs text-center">
    <div class=" container">

        <form action="<?php echo SITEURL; ?>clothes-search.php" method="POST">
            <input type="search" name="search" placeholder="Search for Clothes.." class="cs-search" required>
            <input type="submit" name="submit" value="Search" class="btn btn-primary">
        </form>

    </div>
</section>
<!-- CLOTHES Search Section Ends Here -->

<?php
if (isset($_SESSION['order'])) {
    echo $_SESSION['order'];
    unset($_SESSION['order']);
}
?>

<!-- Categories Section Starts Here -->
<section class="categories">
    <div class="container">
        <h2 class="text-center">Explore Clothes</h2>

        <?php
        //Create SQL Query to Display Categories from Database
        $sql = "SELECT * FROM tbl_category WHERE active='Yes' AND featured='Yes' LIMIT 3";
        //Execute the Query
        $res = mysqli_query($conn, $sql);
        //Count rows to check whether the category is available or not
        $count = mysqli_num_rows($res);

        if ($count > 0) {
            //Categories Available
            while ($row = mysqli_fetch_assoc($res)) {
                //Get the Values like id, title, image_name
                $id = $row['id'];
                $title = $row['title'];
                $image_name = $row['image_name'];
                ?>

                <a href="<?php echo SITEURL; ?>category-clothes.php?category_id=<?php echo $id; ?>">
                    <div class="box-3 float-container">
                        <?php
                        //Check whether Image is available or not
                        if ($image_name == "") {
                            //Display Message
                            echo "<div class='error'>Image not Available</div>";
                        } else {
                            //Image Available
                            ?>
                            <img src="<?php echo SITEURL; ?>images/category/<?php echo $image_name; ?>" alt="<?php echo $title; ?>"
                                class="img-responsive img-curve">
                            <?php
                        }
                        ?>


                        <h3 class="float-text"><?php echo $title; ?></h3>
                    </div>
                </a>

                <?php
            }
        } else {
            //Categories not Available
            echo "<div class='error'>Category not Added.</div>";
        }
        ?>


        <div class="clearfix"></div>
    </div>
</section>
<!-- Categories Section Ends Here -->



<!-- CLOTHES Menu Section Starts Here -->
<section class="clothes-menu">
    <div class="container">
        <h2 class="text-center">Clothes Menu</h2>

        <?php

        //Getting Clothes from Database that are active and featured
        //SQL Query
        $sql2 = "SELECT * FROM tbl_clothes WHERE active='Yes' AND featured='Yes' LIMIT 6";

        //Execute the Query
        $res2 = mysqli_query($conn, $sql2);

        //Count Rows
        $count2 = mysqli_num_rows($res2);

        //Check whether clothes available or not
        if ($count2 > 0) {
            //Clothes Available
            while ($row = mysqli_fetch_assoc($res2)) {
                //Get all the values
                $id = $row['id'];
                $title = $row['title'];
                $price = $row['price'];
                $description = $row['description'];
                $image_name = $row['image_name'];
                ?>

                <div class="clothes-menu-box">
                    <div class="clothes-menu-img">
                        <?php
                        //Check whether image available or not
                        if ($image_name == "") {
                            //Image not Available
                            echo "<div class='error'>Image not available.</div>";
                        } else {
                            //Image Available
                            ?>
                            <img src="<?php echo SITEURL; ?>images/<?php echo $image_name; ?>" alt="<?php echo $title; ?>"
                                class="img-responsive img-curve">
                            <?php
                        }
                        ?>

                    </div>

                    <div class="clothes-menu-desc">
                        <h4><?php echo $title; ?></h4>
                        <p class="clothes-price">$<?php echo $price; ?></p>
                        <p class="clothes-detail">
                            <?php echo $description; ?>
                        </p>
                        <br>

                        <a href="<?php echo SITEURL; ?>order.php?clothes_id=<?php echo $id; ?>" class="btn btn-primary">Order
                            Now</a>
                    </div>
                </div>

                <?php
            }
        } else {
            //Clothes Not Available 
            echo "<div class='error'>Clothes not available.</div>";
        }

        ?>

        <div class="clearfix"></div>

    </div>

    <p class="text-center">
        <a href="<?php echo SITEURL; ?>clothes.php">See All Clothes</a>
    </p>
</section>
<!-- CLOTHES Menu Section Ends Here -->

<?php include ('partials-front/footer.php'); ?>