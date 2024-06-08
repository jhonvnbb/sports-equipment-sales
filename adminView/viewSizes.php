
<div class="container">
  <h2>Available Sizes</h2>
  <hr>
  <table class="table ">
    <thead>
      <tr>
        <th class="text-center">No.</th>
        <th class="text-center">Size</th>
        <th class="text-center">Action</th>
      </tr>
    </thead>
    <?php
      include_once "../config/dbconnect.php";
      $sql="SELECT * from sizes";
      $result=$conn-> query($sql);
      $count=1;
      if ($result-> num_rows > 0){
        while ($row=$result-> fetch_assoc()) {
    ?>
    <tr>
      <td><?=$count?></td>
      <td><?=$row["size_name"]?></td>   
      <td>
        <button class="btn btn-info" data-toggle="modal" data-target="#editSizeModal" onclick="sizeUpdate('<?=$row['size_id']?>', '<?=$row['size_name']?>')"><i class="fas fa-edit"></i></button>
        <button class="btn btn-danger" onclick="sizeDelete('<?=$row['size_id']?>')"><i class="fas fa-trash"></i></button>
      </td>
      </tr>
      <?php
            $count=$count+1;
          }
        }
      ?>
  </table>

  <button type="button" class="btn btn-secondary" style="height:40px" data-toggle="modal" data-target="#myModal">
    Add Size
  </button>

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">New Size Record</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <form  enctype='multipart/form-data' action="./controller/addSizeController.php" method="POST">
            <div class="form-group">
              <label for="size">Size Number:</label>
              <input type="text" class="form-control" name="size" required>
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-secondary" name="upload" style="height:40px">Add Size</button>
            </div>
          </form>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal" style="height:40px">Close</button>
        </div>
      </div>
      
    </div>
  </div>


  <!-- Modal Edit Size -->
  <div class="modal fade" id="editSizeModal" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Edit Size Record</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <form enctype='multipart/form-data' action="./controller/editSizeController.php" method="POST">
            <input type="hidden" id="editSizeId" name="size_id">
            <div class="form-group">
              <label for="edit_size">Size Number:</label>
              <input type="text" class="form-control" id="editSizeName" name="size" required>
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-secondary" name="update" style="height:40px">Update Size</button>
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
function sizeUpdate(sizeId, sizeName) {
    document.getElementById('editSizeId').value = sizeId;
    document.getElementById('editSizeName').value = sizeName;
}
</script>


<footer style="max-width: 1500px;">
  <div class="social-icons">
      <a href="https://github.com/jhonvnbb" target="_blank"><i class="fab fa-github"></i></a>
      <a href="https://www.youtube.com/channel/UCML2M8j1wTcXTP8D0mHPhgw" target="_blank"><i class="fab fa-youtube"></i></a>
      <a href="https://www.instagram.com/jhonnvnbb" target="_blank"><i class="fab fa-instagram"></i></a>
  </div>
  <p>&copy; 2024 <span>Sport Equipments</span>. All Rights Reserved.</p>
</footer>
   