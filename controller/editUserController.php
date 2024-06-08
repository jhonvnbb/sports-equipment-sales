<?php
include_once "../config/dbconnect.php";

if(isset($_POST['update'])) {
    $userId = $_POST['user_id'];
    $firstName = $_POST['first_name'];
    $lastName = $_POST['last_name'];
    $email = $_POST['email'];
    $contactNo = $_POST['contact_no'];
    $dob = $_POST['dob'];

    $update = mysqli_query($conn, "UPDATE users SET first_name='$firstName', last_name='$lastName', email='$email', contact_no='$contactNo', registered_at='$dob' WHERE user_id='$userId'");

    if (!$update) {
        echo "Error: " . mysqli_error($conn);
        header("Location: ../?editUser=error");
    } else {
        echo "Records updated successfully.";
        header("Location: ../?editUser=success");
    }
    exit;
}
?>
