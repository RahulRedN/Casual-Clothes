<?php include ('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Clothes</h1>

        <br><br>

        <?php
        if (isset($_SESSION['upload'])) {
            echo $_SESSION['upload'];
            unset($_SESSION['upload']);
        }
        ?>

        <form action="" method="POST" enctype="multipart/form-data">

            <table class="tbl-30">

                <tr>
                    <td>Title: </td>
                    <td>
                        <input type="text" name="title" placeholder="Title of the Clothes">
                    </td>
                </tr>

                <tr>
                    <td>Description: </td>
                    <td>
                        <textarea name="description" cols="30" rows="5"
                            placeholder="Description of the Clothes."></textarea>
                    </td>
                </tr>

                <tr>
                    <td>Price: </td>
                    <td>
                        <input type="number" name="price">
                    </td>
                </tr>

                <tr>
                    <td>Select Image: </td>
                    <td>
                        <input type="file" name="image">
                    </td>
                </tr>

                <tr>
                    <td>Featured: </td>
                    <td>
                        <input type="radio" name="featured" value="Yes"> Yes
                        <input type="radio" name="featured" value="No"> No
                    </td>
                </tr>

                <tr>
                    <td>Active: </td>
                    <td>
                        <input type="radio" name="active" value="Yes"> Yes
                        <input type="radio" name="active" value="No"> No
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Clothes" class="btn-secondary">
                    </td>
                </tr>

            </table>

        </form>


        <?php

        // Check whether the button is clicked or not
        if (isset($_POST['submit'])) {
            // Add the Clothes to the Database
        
            // Get the Data from Form
            $title = $_POST['title'];
            $description = $_POST['description'];
            $price = $_POST['price'];

            // Check whether radio button for featured and active are checked or not
            if (isset($_POST['featured'])) {
                $featured = $_POST['featured'];
            } else {
                $featured = "No"; // Set Default Value
            }

            if (isset($_POST['active'])) {
                $active = $_POST['active'];
            } else {
                $active = "No"; // Set Default Value
            }

            // Upload the Image if selected
            if (isset($_FILES['image']['name'])) {
                // Get the details of the selected image
                $image_name = $_FILES['image']['name'];

                // Check Whether the Image is Selected or not and upload image only if selected
                if ($image_name != "") {
                    // Image is Selected
                    // Rename the Image
                    $ext = end(explode('.', $image_name));
                    $image_name = "Clothes-Name-" . rand(0000, 9999) . "." . $ext;

                    // Upload the Image
                    $source_path = $_FILES['image']['tmp_name'];
                    $destination_path = "../images/clothes/" . $image_name;

                    $upload = move_uploaded_file($source_path, $destination_path);

                    // Check whether the image is uploaded or not
                    if ($upload == false) {
                        // Failed to Upload the Image
                        $_SESSION['upload'] = "<div class='error'>Failed to Upload Image.</div>";
                        header('location:' . SITEURL . 'admin/add-clothes.php');
                        die(); // Stop the Process
                    }
                }
            } else {
                // Set Default Image Name as Blank
                $image_name = "";
            }

            // Insert Into Database
            $sql = "INSERT INTO tbl_clothes SET 
                    title='$title',
                    description='$description',
                    price=$price,
                    image_name='$image_name',
                    featured='$featured',
                    active='$active'
                ";

            $res = mysqli_query($conn, $sql);

            // Check whether data is inserted or not
            if ($res == true) {
                // Data Inserted Successfully
                $_SESSION['add'] = "<div class='success'>Clothes Added Successfully.</div>";
                header('location:' . SITEURL . 'admin/manage-clothes.php');
            } else {
                // Failed to Insert Data
                $_SESSION['add'] = "<div class='error'>Failed to Add Clothes.</div>";
                header('location:' . SITEURL . 'admin/add-clothes.php');
            }
        }

        ?>

    </div>
</div>

<?php include ('partials/footer.php'); ?>