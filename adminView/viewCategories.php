<div class="container">
  <h2>Category Items</h2>
  <hr>
  <table class="table ">
    <thead>
      <tr>
        <th class="text-center">No.</th>
        <th class="text-center">Category Name</th>
        <th class="text-center">Action</th>
      </tr>
    </thead>
    <?php
      include_once "../config/dbconnect.php";
      $sql="SELECT * from category";
      $result=$conn-> query($sql);
      $count=1;
      if ($result-> num_rows > 0){
        while ($row=$result-> fetch_assoc()) {
    ?>
    <tr>
      <td><?=$count?></td>
      <td><?=$row["category_name"]?></td>  
      <td>
        <button class="btn btn-info btn-sm" onclick="categoryUpdate('<?=$row['category_id']?>', '<?=$row['category_name']?>')" data-toggle="modal" data-target="#editModal"><i class="fas fa-edit"></i></button>
        <button class="btn btn-danger btn-sm" onclick="categoryDelete('<?=$row['category_id']?>')"><i class="fas fa-trash"></i></button>
      </td>
    </tr>
      <?php
            $count=$count+1;
          }
        }
      ?>
  </table>

  <button type="button" class="btn btn-secondary" style="height:40px" data-toggle="modal" data-target="#myModal">
    Add Category
  </button>

  <!-- Modal Add Category -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">New Category Item</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <form  enctype='multipart/form-data' action="./controller/addCatController.php" method="POST">
            <div class="form-group">
              <label for="c_name">Category Name:</label>
              <input type="text" class="form-control" name="c_name" required>
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-secondary" name="upload" style="height:40px">Add Category</button>
            </div>
          </form>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal" style="height:40px">Close</button>
        </div>
      </div>
      
    </div>
  </div>


  <!-- Modal Edit Category -->
  <div class="modal fade" id="editModal" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Edit Category Item</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <form enctype='multipart/form-data' action="./controller/editCatController.php" method="POST">
            <input type="hidden" id="editCategoryId" name="category_id">
            <div class="form-group">
              <label for="edit_c_name">Category Name:</label>
              <input type="text" class="form-control" id="editCategoryName" name="category_name" required>
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-secondary" name="update" style="height:40px">Update Category</button>
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
function categoryUpdate(categoryId, categoryName) {
    document.getElementById('editCategoryId').value = categoryId;
    document.getElementById('editCategoryName').value = categoryName;
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