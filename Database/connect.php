<html>
<head>
</head>
<body>
    <?php
            $servername = "localhost";
            $database = "shop";
            $username = "root";
            $password = "";
            // Create connection
            $conn = mysqli_connect($servername, $username, $password, $database);
            // Check connection
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }
            echo "Connected successfully";

    ?>
</body>

</html>