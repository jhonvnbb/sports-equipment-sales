<div class="container">
  <h2>Customers Data</h2>
  <hr>
  <table class="table">
    <thead>
      <tr>
        <th class="text-center">No.</th>
        <th class="text-center">Username</th>
        <th class="text-center">Email</th>
        <th class="text-center">Contact Number</th>
        <th class="text-center">Date of Birth</th>
        <th class="text-center">Actions</th>
      </tr>
    </thead>
    <tbody>
      <?php
      include_once "../config/dbconnect.php";
      $sql = "SELECT * FROM users WHERE isAdmin=0";
      $result = $conn->query($sql);
      $count = 1;
      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
      ?>
          <tr>
            <td><?= $count ?></td>
            <td><?= $row["first_name"] ?> <?= $row["last_name"] ?></td>
            <td><?= $row["email"] ?></td>
            <td><?= $row["contact_no"] ?></td>
            <td><?= $row["registered_at"] ?></td>
            <td class="text-center">
              <button class="btn btn-info btn-sm" onclick="editUser('<?= $row['user_id'] ?>')"><i class="fas fa-edit"></i></button>
              <button class="btn btn-danger btn-sm" onclick="deleteUser('<?= $row['user_id']?>')"><i class="fas fa-trash"></i></button>
            </td>
          </tr>
      <?php
          $count = $count + 1;
        }
      }
      ?>
    </tbody>
  </table>
</div>

<footer style="width:1500px">
  <div class="social-icons">
      <a href="https://github.com/jhonvnbb" target="_blank"><i class="fab fa-github"></i></a>
      <a href="https://www.youtube.com/channel/UCML2M8j1wTcXTP8D0mHPhgw" target="_blank"><i class="fab fa-youtube"></i></a>
      <a href="https://www.instagram.com/jhonnvnbb" target="_blank"><i class="fab fa-instagram"></i></a>
  </div>
  <p>&copy; 2024 <span>Sport Equipments</span>. All Rights Reserved.</p>
</footer>