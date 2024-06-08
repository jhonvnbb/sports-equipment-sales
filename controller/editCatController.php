<?php
    include_once "../config/dbconnect.php";

    session_start();
    
    if(isset($_POST['update']))
    {
        $catId = $_POST['category_id'];
        $catname = $_POST['category_name'];

        $update = mysqli_query($conn,"UPDATE category SET category_name='$catname' WHERE category_id='$catId'");

        if (!$update) {
            echo mysqli_error($conn);
            header("Location: ../?editCategory=error");
        } else {
            echo "Records updated successfully.";
            header("Location: ../?editCategory=success");
        }
        exit;
    }
?>
