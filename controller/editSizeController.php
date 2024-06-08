<?php
include_once "../config/dbconnect.php";

if(isset($_POST['update'])) {
    $sizeId = $_POST['size_id'];
    $sizeName = $_POST['size'];

    $update = mysqli_query($conn, "UPDATE sizes SET size_name='$sizeName' WHERE size_id='$sizeId'");

    if (!$update) {
        echo "Error: " . mysqli_error($conn);
        header("Location: ../?editSize=error");
    } else {
        echo "Records updated successfully.";
        header("Location: ../?editSize=success");
    }
    exit;
}
?>
