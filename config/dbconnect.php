<?php
    $conn = mysqli_connect("localhost", "root", "", "sports_equipment_sales");

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
?>