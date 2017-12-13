<?php
    function ConnectDatabase($query)
    {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $connection = mysqli_connect($servername, $username, $password);
        if (!$connection)
        {
            die("Connection failed: " .mysqli_connect_error());
        } 
        mysqli_set_charset($connection, 'utf8');
        mysqli_select_db($connection, "thicuoiki");
        return mysqli_query($connection, $query);
    }
?>