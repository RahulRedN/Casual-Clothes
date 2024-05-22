<?php
// Include Constants Page
include ('../config/constants.php');

if (isset($_GET['id']) && isset($_GET['image_name'])) {
    // Process to Delete
    $id = $_GET['id'];
    $image_name = $_GET['image_name'];

    // Remove the Image if Available
    if ($image_name != "") {
        // Image is available, need to remove from folder
        $path = "../images/clothes/" . $image_name;
        $remove = unlink($path);

        // Check whether the image is removed or not
        if ($remove == false) {
            // Failed to remove image
            $_SESSION['upload'] = "<div class='error'>Failed to Remove Image File.</div>";
            header('location:' . SITEURL . 'admin/manage-clothes.php');
            die(); // Stop the process
        }
    }

    // Delete Clothes from Database
    $sql = "DELETE FROM tbl_clothes WHERE id=$id";
    $res = mysqli_query($conn, $sql);

    // Check whether the query executed or not and set the session message respectively
    if ($res == true) {
        // Clothes Deleted
        $_SESSION['delete'] = "<div class='success'>Clothes Deleted Successfully.</div>";
        header('location:' . SITEURL . 'admin/manage-clothes.php');
    } else {
        // Failed to Delete Clothes
        $_SESSION['delete'] = "<div class='error'>Failed to Delete Clothes.</div>";
        header('location:' . SITEURL . 'admin/manage-clothes.php');
    }
} else {
    // Redirect to Manage Clothes Page
    $_SESSION['unauthorize'] = "<div class='error'>Unauthorized Access.</div>";
    header('location:' . SITEURL . 'admin/manage-clothes.php');
}
?>
