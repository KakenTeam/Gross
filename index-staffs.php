<?php include ('includes/header.php') ?>
<h3 class="text-center">Staffs list </h3>

<button type="button" class="btn btn-primary" onClick="document.location.href='new-staff.php'">Thêm nhân viên</button>

<table class = "table table-hover table-bordered">
    <tr class="thead-light">
        <th>Id</th>
        <th>Name</th>
        <th>Address</th>
        <th>Email</th>
        <th>Position</th>
        <th>Action</th>
    </tr>
    <?php
        require ('includes/connection.php');
        $query = "SELECT staff.Id, staff.Name, staff.Address, staff.Email, position.Name as Position
                    FROM staff INNER JOIN position ON staff.positionId = position.Id";
        $data = ConnectDatabase($query);
        $count = mysqli_num_rows($data); 
        while ($row = mysqli_fetch_assoc($data))
        {
            ?>
            <tr id="rowStaff<?php echo $row{'Id'} ?>">
            <?php
            echo "
            <td>".$row{"Id"}."</td>
            <td>".$row{"Name"}."</td>
            <td>".$row{"Address"}."</td>
            <td>".$row{"Email"}."</td>
            <td>".$row{"Position"}."</td>"
        ?>
            <td>
                <button class="btn btn-info"  onClick="document.location.href='update-staff.php?Id=<?php echo $row{"Id"}; ?>'">Chỉnh sửa</button>
                <button 
                    class="btn btn-danger"
                    data-toggle="modal" 
                    data-target="#deleteModal" 
                    data-staff-id="<?php echo $row{"Id"} ?>"
                    data-staff-name="<?php echo $row{"Name"} ?>">Xóa</button>
            </td>
            </tr>
        <?php
        }
    ?>
</table>


<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy bỏ</button>
        <button type="button" class="btn btn-primary" id="delete-staff-btn" >Xóa</button>
      </div>
    </div>
  </div>
</div>

<?php include("includes/footer.php") ?>