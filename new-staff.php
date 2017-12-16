<?php 
  require ('includes/permission.php');
  include ('includes/header.php'); ?>

<h3 class="text-center">Thêm nhân viên mới</h3>

<form action="new-staff.php" method="POST" class="col-md-6 offset-md-3">

  <div class="form-group">
    <label for="name-staff">Tên nhân viên: </label>
    <input type="text" name="name-staff" class="form-control" id="name-staff" required="">
  </div>

  <div class="form-group">
    <label for="email-staff">Email: </label>
    <input type="email" name="email-staff" class="form-control" id="email-staff" required="">
  </div>

  <div class="form-group">
    <label for="address">Địa chỉ: </label>
    <input type="text" name="address" class="form-control" id="address">
  </div>

  <div class="form-group">
    <label for="Position">Chức vụ: </label>
    <select name="position" class="form-control" size="1">
      <?php 
        $query = "select * from position";
        require ('includes/connection.php');
        $data = ConnectDatabase($query);
        while ($row = mysqli_fetch_assoc($data)) {
      ?>

      <option value=<?php echo $row['Id']; ?>> <?php echo $row['Name'] ?> </option>
      <?php 
        }
      ?>
    </select>
  </div>

  <button type="submit" class="btn btn-primary" name="btn-add-staff">Thêm nhân viên</button>
</form>

<?php 
  if (isset($_POST['btn-add-staff'])) {
    $name = $_POST['name-staff'];
    $email = $_POST['email-staff'];
    $address = $_POST['address'];
    $positionId = $_POST['position'];

    $query = "INSERT INTO staff(Name, Email, Address, PositionId)
              VALUES('$name', '$email', '$address', '$positionId')";

    $data = ConnectDatabase($query);

    header('Location: index-staffs.php');
  }
?>

<?php include ('includes/footer.php') ?>
