<html>
<?error_reporting(0);?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="./display.css">
    <link rel="stylesheet" href="../Home/home.CSS">

</head>

<body>
<?php require 'connect.php';?>
<nav class="navbar navbar-expand-md">
        <div class="container">
            <a class="navbar-brand" href="../Home/home.php"><img src="../Home/Image/logo.jpg" width="100px" height="100px"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-end" id="navbarsExampleDefault">
                <ul class="navbar-nav m-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="../Home/home.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Notification</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">My account</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Purchase menu</a>
                    </li>
                </ul>

                <form class="form-inline my-4 my-lg-0">
                    <div class="input-group input-group-sm">
                        <input type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" placeholder="Search...">
                        <div class="input-group-append">
                            <button type="button" class="btn btn-secondary btn-number">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </nav>
    <div class="container row mb-3 mr-3">
        <!-- Dùng để hiển thị sản phẩm theo danh mục -->
        <?php
         if (!empty($_REQUEST['category']))
          {
              $value= $_REQUEST['category'];
                       
                       $query="SELECT  *  FROM product_view 
                       where id in  (SELECT id from product 
                                             where product.categoryId =(select id from category where title='$value'))";
                           
                            $result = $conn->query($query);
                            if ($result) {
                            if (mysqli_num_rows($result)>0)
                            {
                                $id=0;
                                while ($row = mysqli_fetch_assoc($result)) 
                                {
                                    if($row['id']==$id) continue;
                                     $name = $row["name"];
                                     $subtitle =$row["subtitle"];     
                                      $sumary = $row["sumary"];
                                     $type = $row["type"];
                                     $price = $row["price"];     
                                     $discount =$row["discount"];
                                      $content = $row["content"];     
                                     $image = $row["image"];

                                    echo $div = "
                                         <div class='col-3 products'>
                                            <div class='card text-left'>
                                                <img class='card-img-top zoom' src='$image' alt='Product'>
                                                <div class='card-body'>
                                                    <h5 class='card-title'>$name</h5>
                                                     <h5 class='text-danger'>$price<sup>đ</sup></h5>
                                                     <div class='display'>
                                                         <button class='btn btn-outline-success'><a class='nav-link' href='#'>Add</a></button>
                                                         <button class='btn btn-outline-success'><a class='nav-link' href='#'>Detail</a></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>";
                                        $id=$row['id'];
                                   }
                         } else {
                             "Thất bại truy vấn rồi";
                         }
                    }
              
             }
        ?>
    </div>
    <div class="comback">
         <p><a href="home.php">TRANG CHỦ </a></p>
    </div>


</body>
</html>