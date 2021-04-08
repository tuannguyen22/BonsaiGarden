<html>
    <body>
    <?php
              error_reporting (0);
                $conn = new mysqli("localhost", "root","","bonsaigarden");
                if($conn){
                    // echo "Success";
                }else{
                    echo "Thất bại rồi";
                }
               ?>
    </body>
</html>
