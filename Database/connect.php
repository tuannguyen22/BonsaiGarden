<html>
<head>
</head>
<body>
    <?php
            $servername = "localhost";
            $username = "root";
            $database = "bonsaigarden";           
            $password = "";
            global $conn;
            // Create connection
            $conn = mysqli_connect($servername, $username, $password, $database);

    ?>
</body>

</html>