<?php include ('includes/header.php') ?>
<h3 class="text-center">Staffs list </h3>
<table class = "table">
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Address</th>
        <th>Email</th>
        <th>Position</th>
    </tr>
    <?php
        require ('includes/connection.php');
        $query = "SELECT staff.Id, staff.Name, staff.Address, staff.Email, position.Name as Position
                    FROM staff INNER JOIN position ON staff.positionId = position.Id";
        $data = ConnectDatabase($query);
        $count = mysqli_num_rows($data); 
        while ($row = mysqli_fetch_assoc($data))
        {
            echo "<tr>
            <td>".$row{"Id"}."</td>
            <td>".$row{"Name"}."</td>
            <td>".$row{"Address"}."</td>
            <td>".$row{"Email"}."</td>
            <td>".$row{"Position"}."</td>
            </tr>";
        }
    ?>
</table>
<?php include("includes/footer.php") ?>