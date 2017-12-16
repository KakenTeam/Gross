<?php include ('includes/header.php') ?>

<h3 class="text-center">Cập nhật thông tin</h3>

<?php 
    if (isset($_GET["Id"])) {
      require ('includes/connection.php');
      $IdStaff = $_GET["Id"];
      $query = "select * from staff where Id=".$_GET["Id"];
      $data = ConnectDatabase($query);
      while ($row = mysqli_fetch_assoc($data)) {
        $positionId = $row{"PositionId"};
      ?>
        <form action="update-staff.php?Id=<?php echo $IdStaff; ?>" method="POST" class="col-md-6 offset-md-3">

          <div class="form-group">
            <label for="name-staff">Tên nhân viên: </label>
            <input 
              type="text" name="name-staff" class="form-control" id="name-staff" required=""
              value="<?php echo $row{"Name"}; ?>">
          </div>

          <div class="form-group">
            <label for="email-staff">Email: </label>
            <input 
              type="email" name="email-staff" class="form-control" id="email-staff" required=""
              value="<?php echo $row{"Email"}; ?>">
          </div>

          <div class="form-group">
            <label for="address">Địa chỉ: </label>
            <input 
              type="text" name="address" class="form-control" id="address"
              value="<?php echo $row{"Address"} ?>">
          </div>

          <div class="form-group">
            <label for="Position">Chức vụ: </label>
            <select name="position" class="form-control" size="1">
              <?php 
                $query2 = "select * from position";
                $data2 = ConnectDatabase($query2);
                while ($row2 = mysqli_fetch_assoc($data2)) {
              ?>

              <option 
                value=<?php echo $row2['Id']; ?>
                <?php if ($row2['Id'] == $positionId ) echo 'selected' ; ?> 
                > 
                <?php echo $row2['Name'] ?> </option>
              <?php 
                }
              ?>
            </select>
          </div>

          <button type="submit" class="btn btn-primary" name="btn-update-staff">Cập nhật</button>
        </form>
      <?php
      }
    }
?>

<?php 
  if (isset($_POST['btn-update-staff'])) {
    $name = $_POST['name-staff'];
    $email = $_POST['email-staff'];
    $address = $_POST['address'];
    $positionId = $_POST['position'];

    $query = "UPDATE staff SET Name='$name', Email='$email', Address='$address', PositionId='$positionId' WHERE Id='$IdStaff'";

    $data = ConnectDatabase($query);

    header('Location: index-staffs.php');
  }
?>


<?php include("includes/footer.php") ?>