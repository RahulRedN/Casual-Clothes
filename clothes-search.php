<?php include ('partials-front/menu.php'); ?>

<!-- CLOTHES SEARCH Section Starts Here -->
<section class="clothes-search text-center">
    <div class="container">
        <?php
        // Get the Search Keyword
        $search = mysqli_real_escape_string($conn, $_POST['search']);
        ?>

        <h2>Clothes on Your Search <a href="#">"<?php echo $search; ?>"</a></h2>
    </div>
</section>
<!-- CLOTHES SEARCH Section Ends Here -->

<!-- CLOTHES Menu Section Starts Here -->
<section class="clothes-menu">
    <div class="container">
        <h2 class="text-center">Clothes Menu</h2>

        <?php
        // SQL Query to Get clothes based on search keyword
        $sql = "SELECT * FROM tbl_clothes WHERE title LIKE '%$search%' OR description LIKE '%$search%'";

        // Execute the Query
        $res = mysqli_query($conn, $sql);

        // Count Rows
        $count = mysqli_num_rows($res);

        // Check whether clothes available or not
        if ($count > 0) {
            // Clothes Available
            while ($row = mysqli_fetch_assoc($res)) {
                // Get the details
                $id = $row['id'];
                $title = $row['title'];
                $price = $row['price'];
                $description = $row['description'];
                $image_name = $row['image_name'];
                ?>

                <div class="clothes-menu-box">
                    <div class="clothes-menu-img">
                        <?php
                        // Check whether image name is available or not
                        if ($image_name == "") {
                            // Image not Available
                            echo "<div class='error'>Image not Available.</div>";
                        } else {
                            // Image Available
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

                        <a href="#" class="btn btn-primary">Order Now</a>
                    </div>
                </div>

                <?php
            }
        } else {
            // Clothes Not Available
            echo "<div class='error'>Clothes not found.</div>";
        }
        ?>

        <div class="clearfix"></div>
    </div>
</section>
<!-- CLOTHES Menu Section Ends Here -->

<?php include ('partials-front/footer.php'); ?>