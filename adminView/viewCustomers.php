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
        <th class="text-center">registeredAt</th>
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
              <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#editUserModal" onclick="editUser('<?= $row['user_id'] ?>', '<?= $row['first_name'] ?>', '<?= $row['last_name'] ?>', '<?= $row['email'] ?>', '<?= $row['contact_no'] ?>', '<?= $row['registered_at'] ?>')"><i class="fas fa-edit"></i></button>
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

  <button type="button" class="btn btn-secondary" style="height:40px" data-toggle="modal" data-target="#addUserModal">
    Add User
  </button>



  <!-- Modal Add User -->
  <div class="modal fade" id="addUserModal" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Add New User</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <form enctype='multipart/form-data' action="./controller/addUserController.php" method="POST">
            <div class="form-group">
              <label for="firstName">First Name:</label>
              <input type="text" class="form-control" id="firstName" name="first_name" required>
            </div>
            <div class="form-group">
              <label for="lastName">Last Name:</label>
              <input type="text" class="form-control" id="lastName" name="last_name" required>
            </div>
            <div class="form-group">
              <label for="email">Email:</label>
              <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
              <label for="password">Password:</label>
              <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class="form-group">
              <label for="contactNo">Contact Number:</label>
              <input type="text" class="form-control" id="contactNo" name="contact_no" required>
            </div>
            <div class="form-group">
              <label for="registeredAt">registeredAt:</label>
              <input type="date" class="form-control" id="registeredAt" name="registered_at" required>
            </div>
            <div class="form-group">
              <label for="userAddress">Address:</label>
              <input type="text" class="form-control" id="userAddress" name="user_address" required>
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-secondary" name="add" style="height:40px">Add User</button>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal" style="height:40px">Close</button>
        </div>
      </div>
    </div>
  </div>


  <!-- Modal Edit User -->
  <div class="modal fade" id="editUserModal" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Edit User Information</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <form enctype='multipart/form-data' action="./controller/editUserController.php" method="POST">
            <input type="hidden" id="editUserId" name="user_id">
            <div class="form-group">
              <label for="editFirstName">First Name:</label>
              <input type="text" class="form-control" id="editFirstName" name="first_name" required>
            </div>
            <div class="form-group">
              <label for="editLastName">Last Name:</label>
              <input type="text" class="form-control" id="editLastName" name="last_name" required>
            </div>
            <div class="form-group">
              <label for="editEmail">Email:</label>
              <input type="email" class="form-control" id="editEmail" name="email" required>
            </div>
            <div class="form-group">
              <label for="editContactNo">Contact Number:</label>
              <input type="text" class="form-control" id="editContactNo" name="contact_no" required>
            </div>
            <div class="form-group">
              <label for="editDob">Date of Birth:</label>
              <input type="date" class="form-control" id="editDob" name="dob" required>
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-secondary" name="update" style="height:40px">Update User</button>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal" style="height:40px">Close</button>
        </div>
      </div>
    </div>
  </div>

</div>

<script>
function editUser(userId, firstName, lastName, email, contactNo, dob) {
    document.getElementById('editUserId').value = userId;
    document.getElementById('editFirstName').value = firstName;
    document.getElementById('editLastName').value = lastName;
    document.getElementById('editEmail').value = email;
    document.getElementById('editContactNo').value = contactNo;
    document.getElementById('editDob').value = dob;
}
</script>

<footer style="max-width:1500px">
  <div class="social-icons">
      <a href="https://github.com/jhonvnbb" target="_blank"><i class="fab fa-github"></i></a>
      <a href="https://www.youtube.com/channel/UCML2M8j1wTcXTP8D0mHPhgw" target="_blank"><i class="fab fa-youtube"></i></a>
      <a href="https://www.instagram.com/jhonnvnbb" target="_blank"><i class="fab fa-instagram"></i></a>
  </div>
  <p>&copy; 2024 <span>Sport Equipments</span>. All Rights Reserved.</p>
</footer>
