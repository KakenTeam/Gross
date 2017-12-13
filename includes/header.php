<?php 
session_start()
?>
<!DOCTYPE html>
<html>
   <head>
      <title>Quản Lí Phòng Ban </title> 
      <link rel="stylesheet" href="styles/css/bootstrap.min.css">
      <link rel="stylesheet" href="styles/css/styles.css">
      <meta charset="UTF-8">
   </head>
   <body>

    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
      <a class="navbar-brand" href="index.php">Navbar</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index-staffs.php">Nhân viên</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="timkiemtheophongban.php">Tìm kiếm phòng ban</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="timkiemthongtin.php">Tìm kiếm nhân sự</a>
          </li>

        </ul>
        <?php 
          if ($_SESSION["user_id"]) {
            echo '<span class="username">Hi, '.$_SESSION["username"]."</span>";
          }
        ?>
      </div>
    </nav>

    <main id="main" class="container">

