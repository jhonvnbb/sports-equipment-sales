<?php
    include_once "../config/dbconnect.php";
    
    if(isset($_POST['upload']))
    {
        $ProductName = $_POST['p_name'];
        $desc= $_POST['p_desc'];
        $price = $_POST['p_price'];
        $category = $_POST['category'];
        
        $name = $_FILES['file']['name'];
        $temp = $_FILES['file']['tmp_name'];
        $size = $_FILES['file']['size'];
        $type = $_FILES['file']['type'];
        
        $location = "./uploads/";
        $image = $location . $name;
        
        $target_dir = "../uploads/";
        $finalImage = $target_dir . $name;
        
        if ($size > 5 * 1024 * 1024) {
            echo "Error: File size exceeds 5MB.";
            exit();
        }

        $allowed_types = ['image/jpeg', 'image/jpg', 'image/png'];
        if (!in_array($type, $allowed_types)) {
            echo "Error: Only JPG, JPEG, and PNG files are allowed.";
            exit();
        }

        if (move_uploaded_file($temp, $finalImage)) {
            $insert = mysqli_query($conn, "INSERT INTO product
            (product_name, product_image, price, product_desc, category_id) 
            VALUES ('$ProductName', '$image', $price, '$desc', '$category')");
            
            if (!$insert) {
                echo "Error: " . mysqli_error($conn);
            } else {
                echo "Records added successfully.";
            }
        } else {
            echo "Error: File upload failed.";
        }
    }
?>
