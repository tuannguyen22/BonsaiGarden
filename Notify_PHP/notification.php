<?php 
    error_reporting(0);
    include('connect.php');
?>
<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

<?php 

    if(isset($_POST['Pay'])){
        $sql = "INSERT INTO notify (userName, message) VALUES ('Lu', 'Co don dat hang moi')";
        $sql1 = "SELECT * FROM notify WHERE userName = userName"; 

        $result = mysqli_query($conn, $sql);
        $list = [];
        if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) {
            $list[] = $row['message']; 
          }
        }

      
    }
 
?>

<div class="container">                                         
  <div class="dropdown">
    <button class="btn btn-primary dropdown-toggle" type="button" style="border: none; background: none; color:black" data-toggle="dropdown">
        <i class="fa fa-bell" style="font-size:26px;color:green"></i><?php echo count($list) ?>
    <span class="caret"></span></button>
    <ul class="dropdown-menu">

        <?php 
            foreach($list as $product_view){
                echo '<li><a href="#">'.$message.'</a></li>';
              }     
        ?>
          echo '<li><a href="#">'.$message.'</a></li>';  echo '<li><a href="#">'.$message.'</a></li>';  echo '<li><a href="#">'.$message.'</a></li>';  echo '<li><a href="#">'.$message.'</a></li>';
    </ul>
  </div>
</div>

</body>
</html>