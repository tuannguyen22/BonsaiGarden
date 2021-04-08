<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="payment.css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="cart.css">
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />

    <link rel="stylesheet" href="fulltextSearch.css">



</head>
<body>
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

    <!-- Dùng hiển thị sản phẩm theo tìm kiếm -->
    <div class="container row mb-3 mr-3">
        <?php
        require 'connect.php';
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {   
            if (isset($_POST["search"])) {
                if (empty($_POST["keyword"])) {
                        $error_keyWord = "<span style='color:red;'> Error : Please enter your key</span>";
                        echo $error_keyWord;
                        } else {
                            $keyword= $_POST["keyword"];
                            
                                $sql = "SELECT * from product inner join product_image 
                                ON product.id = product_image.id_product
                                inner join image on product_image.id_image = image.id
                                WHERE MATCH (name,content) AGAINST('$keyword' IN NATURAL LANGUAGE MODE)";

                                $result = $conn->query($sql);  
                                if ($result) {
                                    if (mysqli_num_rows($result) > 0) {
                                        $id=0;
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            
                                            if($row['id']==$id) continue;
                                            $name = $row["name"];
                                            $subtitle =$row["subtitle"];     
                                            $sumary = $row["sumary"];
                                            $type = $row["type"];
                                            $price = $row["price"];     
                                            $discount = $row["discount"];
                                            $content = $row["content"];     
                                            $image = $row["image"];
                                            echo $div = "
                                                <div class='col-3 products'>
                                                    <div class='card text-left'>
                                                        <img class='card-img-top zoom' src='$image' style='width:100%;height:100%;' alt='Product'>
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
            }
        }
        ?>
    </div>
    <div class="comback">
         <p><a href="home.php">TRANG CHỦ </a></p>
    </div>




</body>

</html>