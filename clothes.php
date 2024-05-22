<?php include ('partials-front/menu.php'); ?>

<!-- CLOTHES Search Section Starts Here -->
<section class="cs text-center">
    <div class="container">

        <form action="<?php echo SITEURL; ?>clothes-search.php" method="POST">
            <input type="search" name="search" placeholder="Search for Clothes.." class="cs-search" required>
            <input type="submit" name="submit" value="Search" class="btn btn-primary">
        </form>

    </div>
</section>
<!-- CLOTHES Search Section Ends Here -->



<!-- CLOTHES Menu Section Starts Here -->
<section class="clothes-menu">
    <div class="container">
        <h2 class="text-center">Clothes Menu</h2>

        <?php
        //Display Clothes that are Active
        $sql = "SELECT * FROM tbl_clothes WHERE active='Yes'";

        //Execute the Query
        $res = mysqli_query($conn, $sql);

        //Count Rows
        $count = mysqli_num_rows($res);

        //Check whether the clothes are available or not
        if ($count > 0) {
            //Clothes Available
            while ($row = mysqli_fetch_assoc($res)) {
                //Get the Values
                $id = $row['id'];
                $title = $row['title'];
                $description = $row['description'];
                $price = $row['price'];
                $image_name = $row['image_name'];
                ?>

                <div class="clothes-menu-box">
                    <div class="clothes-menu-img">
                        <?php
                        //Check whether image available or not
                        if ($image_name == "") {
                            //Image not Available
                            echo "<div class='error'>Image not Available.</div>";
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
            //Clothes not Available
            echo "<div class='error'>Clothes not found.</div>";
        }
        ?>

        <div class="clearfix"></div>

    </div>
</section>
<!-- CLOTHES Menu Section Ends Here -->

<?php include ('partials-front/footer.php'); ?>