<?php include ('includes/header.php') ?>
<h3 class="text-center">Danh sách nhân viên</h3>

<?php if (isset($_SESSION["user_id"])) {?>
    <button 
        type="button" class="btn btn-primary pointer btn-add-staff" 
        onClick="document.location.href='new-staff.php'">Thêm nhân viên</button>
<?php } ?>

<table class = "table table-hover table-bordered">
    <tr class="thead-light">
        <th>Id</th>
        <th>Tên</th>
        <th>Địa chỉ</th>
        <th>Email</th>
        <th>Chức vụ</th>
        <?php if (isset($_SESSION["user_id"])) {?>
        <th>Thao tác</th>
        <?php } ?>
    </tr>
    <?php
        require ('includes/connection.php');
        if (isset($_REQUEST["txtSearch"]))
        {
            $query = "SELECT staff.Id, staff.Name, staff.Address, staff.Email, position.Name as Position
                    FROM staff INNER JOIN position ON staff.positionId = position.Id 
                    WHERE staff.Name LIKE '%".$seachString."%'";
        }
        else 
        {
            $query = "SELECT staff.Id, staff.Name, staff.Address, staff.Email, position.Name as Position
                    FROM staff INNER JOIN position ON staff.positionId = position.Id";
        }
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
                <?php if (isset($_SESSION["user_id"])) {?>
                <td>
                    <button class="btn btn-info pointer"  onClick="document.location.href='update-staff.php?Id=<?php echo $row{"Id"}; ?>'">Chỉnh sửa</button>
                    <button 
                        class="btn btn-danger pointer"
                        data-toggle="modal" 
                        data-target="#deleteModal" 
                        data-staff-id="<?php echo $row{"Id"} ?>"
                        data-staff-name="<?php echo $row{"Name"} ?>">Xóa</button>
                </td>
                <?php } ?>
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
        <button type="button" class="btn btn-secondary pointer" data-dismiss="modal">Hủy bỏ</button>
        <button type="button" class="btn btn-primary pointer" id="delete-staff-btn" >Xóa</button>
      </div>
    </div>
  </div>
</div>

<?php include("includes/footer.php") ?>