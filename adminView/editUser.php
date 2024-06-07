<?php
include_once "../config/dbconnect.php";

if (isset($_GET['id'])) {
  $userId = $_GET['id'];
  $sql = "SELECT * FROM users WHERE user_id='$userId'";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
  }
}
?>
<div>
  <form method="POST" action="update_user.php">
    <input type="hidden" name="user_id" value="<?= $row['user_id'] ?>">
    <label>First Name</label>
    <input type="text" name="first_name" value="<?= $row['first_name'] ?>">
    <label>Last Name</label>
    <input type="text" name="last_name" value="<?= $row['last_name'] ?>">
    <label>Email</label>
    <input type="email" name="email" value="<?= $row['email'] ?>">
    <label>Contact Number</label>
    <input type="text" name="contact_no" value="<?= $row['contact_no'] ?>">
    <button type="submit">Update</button>
  </form>
</div>