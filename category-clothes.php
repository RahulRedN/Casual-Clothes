<?php include ('partials-front/menu.php'); ?>

<?php
// Check whether id is passed or not
if (isset($_GET['category_id'])) {
    // Category id is set and get the id
    $category_id = $_GET['category_id'];
    // Get the Category Title Based on Category ID
    $sql = "SELECT title FROM tbl_category WHERE id=$category_id";

    // Execute the Query
    $res = mysqli_query($conn, $sql);

    // Get the value from Database
    $row = mysqli_fetch_assoc($res);
    // Get the Title
    $category_title = $row['title'];
} else {
    // Category not passed
    // Redirect to Home page
    header('location:' . SITEURL);
}
?>

<!-- CLOTHES SEARCH Section Starts Here -->
<section class="clothes-search text-center">
    <div class="container">

        <h2>Clothes on <a href="#">"<?php echo $category_title; ?>"</a></h2>

    </div>
</section>
<!-- CLOTHES SEARCH Section Ends Here -->

<!-- CLOTHES Menu Section Starts Here -->
<section class="clothes-menu">
    <div class="container">
        <h2 class="text-center">Clothes Menu</h2>

        <?php
        // Create SQL Query to Get clothes based on Selected Category
        $sql2 = "SELECT * FROM tbl_clothes WHERE category_id=$category_id";

        // Execute the Query
        $res2 = mysqli_query($conn, $sql2);

        // Count the Rows
        $count2 = mysqli_num_rows($res2);

        // Check whether clothes are available or not
        if ($count2 > 0) {
            // Clothes are Available
            while ($row2 = mysqli_fetch_assoc($res2)) {
                $id = $row2['id'];
                $title = $row2['title'];
                $price = $row2['price'];
                $description = $row2['description'];
                $image_name = $row2['image_name'];
                ?>

                <div class="clothes-menu-box">
                    <div class="clothes-menu-img">
                        <?php
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

                        <a href="<?php echo SITEURL; ?>order.php?clothes_id=<?php echo $id; ?>" class="btn btn-primary">Order
                            Now</a>
                    </div>
                </div>

                <?php
            }
        } else {
            // Clothes not available
            echo "<div class='error'>Clothes not Available.</div>";
        }
        ?>

        <div class="clearfix"></div>

    </div>
</section>
<!-- CLOTHES Menu Section Ends Here -->

<?php include ('partials-front/footer.php'); ?>