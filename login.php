
<?php
session_start();
if (!empty($_SESSION['user_id'])) session_unset($_SESSION['user_id']); 
session_write_close();
?>
<?php include ('includes/header.php') ?>
      <form 
        class="col-md-6 offset-md-3"
        method="POST"
        action="login.php"
        class="form-signin">
        <h2 class="form-signin-heading">Please sign in</h2>

        <div class="form-group row">
          <label for="inputUserName" class="col-sm-2 col-form-label">User name: </label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="username" id="inputUserName" required="" placeholder="Username">
          </div>
        </div>

        <div class="form-group row">
          <label for="inputPassword" class="col-sm-2 col-form-label">Password: </label>
          <div class="col-sm-10">
            <input type="password" class="form-control" name="password" id="inputPassword" required="" placeholder="Password">
          </div>
        </div>

        <button class="btn btn-primary pointer" name="btn-sign-in" type="submit">Sign in</button>
      </form>
    <?php 
      // connect to database
      require_once("includes/connection.php");

      if (isset($_POST["btn-sign-in"])) {
        // get info from form 
        $username = $_POST["username"];
        $password = $_POST["password"];

         //làm sạch các thẻ html các kí tự đặc biệt do người dùng tạo ra để tấn công database theo phương thức sql injection
        $username = strip_tags($username); //loại bỏ các tag html
        $username = addslashes($username);  //các dấu , / ..

        $password = strip_tags($password);
        $password = addslashes($password);

        $sql = "SELECT * FROM user WHERE username='$username' and password='$password'";
        $query = ConnectDatabase($sql);
        $num_row = mysqli_num_rows($query);

        if ($num_row == 0) {
          echo '<script language="javascript">';
          echo 'alert("Invalid login credentials. Please try again!")';
          echo '</script>';
        } else {

          while ($data = mysqli_fetch_array($query)) {
            $_SESSION["user_id"] = $data["Id"];
            $_SESSION["username"] = $data["username"];
          }

          header('Location: index.php');  
        }

      }
    ?>
<?php include("includes/footer.php") ?>