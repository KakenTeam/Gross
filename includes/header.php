<?php 
session_start();
ob_start();
?>
<!DOCTYPE html>
<html>
   <head>
      <title>Quản Lí Nhân Viên</title> 
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
            <a class="nav-link" href="index.php">Trang chủ <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index-staffs.php">Nhân viên</a>
          </li>
        </ul>
        <form action="index-staffs.php" class="form-inline my-2 my-lg-0" name="searchForm">
          <?php $seachString = isset($_REQUEST["txtSearch"]) ? $_REQUEST["txtSearch"] : ""?>
          <input class="form-control mr-sm-2" type="text" placeholder="Tên nhân viên" name="txtSearch" value=<?php echo $seachString;?>>
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Tìm kiếm</button>
        </form>   
        <?php 
          if (isset($_SESSION["user_id"])) {
            echo '<span class="username">Hi, '.$_SESSION["username"]."</span>";
          ?>
            <button class="btn btn-primary" onClick="document.location.href='login.php'">Log out</button>
        <?php 
          } else { ?>

            <button class="btn btn-primary" onClick="document.location.href='login.php'">Log in</button>
        <?php
          }
        ?>
      </div>
    </nav>

    <main id="main" class="container">

