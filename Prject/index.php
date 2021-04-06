
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Track purchases</title>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">
    <link rel="stylesheet" href="index.css">
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="confirm.css">

  </head>

  <body>

    <div class="container">
      <nav class="style-4">
        <ul class="header">
          <li><a href="#"><i class="fa fa-arrow-circle-left" style="font-size:30px"></i></a></li>
          <li><a href="#">
            <input type="text" placeholder="Search.." name="search">
            <button style="border: none; background: none;" type="submit"><i class="fa fa-search" style="font-size:25px"></i></button>
          </a></li> 
            
        </ul>
      </nav>
      <nav class="style-4">
        <ul class="menu-4">
          <li class="current"><a href="#" data-hover="Home">Home</a></li>
          <li><a href="confirm.php" data-hover="Wait for Confirm">Wait for Confirm</a></li>
          <li><a href="wait.php" data-hover="Wait">Wait</a></li>
          <li><a href="Delivering.php" data-hover="Delivering">Delivering</a></li>
          <li><a href="Delivered.php" data-hover="Delivered">Delivered</a></li>
          <li><a href="cancel.php" data-hover="Cancel">Cancel</a></li>
        </ul>
      </nav>
      <hr style="width: 85%">


        <?php
        error_reporting(0);
        include('connect.php'); 
          $sql = "SELECT * FROM product_view where product_view.id=(
            SELECT product.id FROM product 
            INNER JOIN cart_item ON product.id = cart_item.productId 
            where cart_item.cartId= (select id from cart))
          LIMIT 1 ";
          $result = mysqli_query($conn, $sql);
          $list = [];
          if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
              $list[] = $row; 
            }
        }

        foreach($list as $product_view){
          $image = $product_view['image'];
          $name = $product_view['name'];
          $type = $product_view['type'];
          $content = $product_view['content'];
          $quantity = $product_view['quantity'];
          $price = $product_view['price'];
        }
        
        $sql = "SELECT * FROM product_view where product_view.id=(
          SELECT product.id FROM product 
          INNER JOIN cart_item ON product.id = cart_item.productId 
          where cart_item.cartId= (select status from cart))
        LIMIT 1 ";

        $result = mysqli_query($conn, $sql);
        $list = [];
        if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) {
            $list[] = $row; 
          }
        }
        

        foreach($list as $product_view){
          $status = $product_view['status'];
        }

        if( $status == 0 || $status == 1 ||  $status == 2 ||  $status == 3 ||  $status == 4){
          $status = "";
          echo '
          <div class="card">
          <div class="container-fliud">
            <div class="wrapper row">
              <div class="preview col-md-6">
                <div class="preview-pic tab-content">
                  <div class="tab-pane active" id="pic-1"><img src="'.$image.'" /></div>
                </div>
              </div>
              <div class="details col-md-8">
                <div class="rating">
                  <span class="product-title" style="font: size 25px;">'.$name.'</span><br>
                  <span class="review-no">'.$content.'</span>
                </div>
                
                <h5 class="sizes">Sizes:
                  <span class="size" data-toggle="tooltip" title="small">'.$type.'</span>
                </h5>
                
              </div>
            </div>
                    <hr style="width: 85%">
                    <div class="action">
                        <span>'.$quantity.'</span>
                        <span style="margin-left: 75%;"><i class="fa fa-dollar" style="font-size:30px;color:red"></i> '.$price.'</span>
                    </div>
                    <hr style="width: 85%">
                    <div class="action">
                        <span style="color:blue"><i class="fas fa-truck" style="font-size:30px;color:green; margin-left: -25px;"></i>'.$status.'<span>
                        <span style="margin-left: 70%;"><i class="fas fa-angle-right" style="font-size:24px"></i></span>
                    </div>
                    <hr style="width: 85%">
                    <div class="action">
                        <span class="stars" style="margin-right: 63%">
                          <span class="fa fa-star checked" style="color:orange"></span>
                          <span class="fa fa-star checked" style="color:orange"></span>
                          <span class="fa fa-star checked" style="color:orange"></span>
                          <span class="fa fa-star" ></span>
                          <span class="fa fa-star"></span>
                        </span>
                        <span><button class="add-to-cart btn btn-default" style="background: orange; font-size: 20px" type="button"><a href="cart.php">Buy Again</a></button></span>
            </div>
          
          </div>
        </div>    
          ';
          }
          else{
            echo 'Not find any products!';
          }
        ?>
		
	</div>
  </body>
</html>
