<?php 
  require ('includes/permission.php');
  if (isset($_POST["StaffId"])) {
    require ('includes/connection.php');
    $staffId = $_POST["StaffId"];
    $query = "DELETE FROM staff WHERE Id='$staffId'";

    $data = ConnectDatabase($query);
  }
?>