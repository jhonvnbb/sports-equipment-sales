<?php
    include_once "../config/dbconnect.php";

    $product_id = $_POST['product_id'];
    $p_name = $_POST['p_name'];
    $p_desc = $_POST['p_desc'];
    $p_price = $_POST['p_price'];
    $category = $_POST['category'];

    if (isset($_FILES['newImage']) && $_FILES['newImage']['error'] == 0) {
        $location = "./uploads/";
        $img = $_FILES['newImage']['name'];
        $tmp = $_FILES['newImage']['tmp_name'];
        $dir = '../uploads/';
        $ext = strtolower(pathinfo($img, PATHINFO_EXTENSION));
        $valid_extensions = array('jpeg', 'jpg', 'png', 'gif', 'webp');
        $image = rand(1000, 1000000) . "." . $ext;
        $final_image = $location . $image;

        if (in_array($ext, $valid_extensions)) {
            if (move_uploaded_file($tmp, $dir . $image)) {
            } else {
                echo "Failed to move uploaded file.";
                exit;
            }
        } else {
            echo "Invalid file extension.";
            exit;
        }
    } else {
        $final_image = $_POST['existingImage'];
    }

    $updateItem = mysqli_query($conn, "UPDATE product SET 
        product_name='$p_name', 
        product_desc='$p_desc', 
        price=$p_price,
        category_id=$category,
        product_image='$final_image' 
        WHERE product_id=$product_id");

    if ($updateItem) {
        echo "true";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
?>
