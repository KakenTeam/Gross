<?php include ('includes/header.php') ?>
<h3 class="text-center">Danh sách nhân viên</h3>
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
            echo "<tr>
            <td>".$row{"Id"}."</td>
            <td>".$row{"Name"}."</td>
            <td>".$row{"Address"}."</td>
            <td>".$row{"Email"}."</td>
            <td>".$row{"Position"}."</td>";
            if (isset($_SESSION["user_id"])) {?>
            <td>
                <button class="btn" type="button">Chỉnh sửa</button>
                <button class="btn" type="button">Xóa</button>
            </td>
            <?php
            }
            "</tr>";
        }
    ?>
</table>
<?php include("includes/footer.php") ?>