<html>

<head>
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
  <link rel="stylesheet" href="cart.css">
</head>

<body>
  <?php
  include('../Database/connect.php');
  function addCart()
  {
    if ($_REQUEST['id']) {
      $id = $_REQUEST['id'];
      $read = "SELECT * FROM cart WHERE userId = '{$_SESSION['userId']}'"; 
      global $conn;
      $idCart = $conn->query($read);
      if (mysqli_num_rows($idCart) > 0) {
        while($row = mysqli_fetch_assoc($idCart)) {
          $cart = $row['id'];
        }
      }
      $read = "SELECT * FROM product WHERE id=" . $id; 
      global $conn;
      $product = $conn->query($read);
      if (mysqli_num_rows($product) > 0) {
        while($row = mysqli_fetch_assoc($product)) {
          $insert = "INSERT INTO cart (userId,email)
          VALUES ('{$row['id']}','{$row['email']}') ";

        }
      }

    }
  }


  ?>;
  <nav class="navbar navbar-expand-md">
    <div class="container">
      <a class="navbar-brand" href="../Home/home.html"><img src="../Home/Image/logo.jpg" width="100px" height="100px"></a>
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

  <!-- <section class="jumbotron text-center">
        <div class="container">
            <div class="jumbotron-heading">
              <img src="../Home/Image/back-cart.jpg" width="100%" height="400rem">
            </div>
        </div>
    </section> -->

  <div class="pb-5">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 p-5 bg-white rounded shadow-sm mb-5">

          <!-- Shopping cart table -->
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col" class="border-0 bg-light">
                    <div class="p-2 px-3 text-uppercase">Product</div>
                  </th>
                  <th scope="col" class="border-0 bg-light">
                    <div class="py-2 text-uppercase">Price</div>
                  </th>
                  <th scope="col" class="border-0 bg-light">
                    <div class="py-2 text-uppercase">Quantity</div>
                  </th>
                  <th scope="col" class="border-0 bg-light">
                    <div class="py-2 text-uppercase">Remove</div>
                  </th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th scope="row" class="border-0">
                    <div class="p-2">
                      <img src="https://res.cloudinary.com/mhmd/image/upload/v1556670479/product-1_zrifhn.jpg" alt="" width="70" class="img-fluid rounded shadow-sm">
                      <div class="ml-3 d-inline-block align-middle">
                        <h5 class="mb-0"> <a href="#" class="text-dark d-inline-block align-middle">Timex Unisex Originals</a></h5><span class="text-muted font-weight-normal font-italic d-block">Category: Watches</span>
                      </div>
                    </div>
                  </th>
                  <td class="border-0 align-middle"><strong>$79.00</strong></td>
                  <td class="border-0 align-middle"><strong>3</strong></td>
                  <td class="border-0 align-middle"><a href="#" class="text-dark"><i class="fa fa-trash"></i></a></td>
                </tr>
              </tbody>
            </table>
          </div>
          <!-- End -->
        </div>
      </div>



      <div class="row py-5 p-4 bg-white rounded shadow-sm">
        <div class="col-lg-6">
          <div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold">Coupon code</div>
          <div class="p-4">
            <p class="font-italic mb-4">If you have a coupon code, please enter it in the box below</p>
            <div class="input-group mb-4 border rounded-pill p-2">
              <input type="text" placeholder="Apply coupon" aria-describedby="button-addon3" class="form-control border-0">
              <div class="input-group-append border-0">
                <button id="button-addon3" type="button" class="btn btn-dark px-4 rounded-pill"><i class="fa fa-gift mr-2"></i>Apply coupon</button>
              </div>
            </div>
          </div>
          <div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold">Instructions for seller</div>
          <div class="p-4">
            <p class="font-italic mb-4">If you have some information for the seller you can leave them in the box below</p>
            <textarea name="" cols="30" rows="2" class="form-control"></textarea>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold">Order summary </div>
          <div class="p-4">
            <p class="font-italic mb-4">Shipping and additional costs are calculated based on values you have entered.</p>
            <ul class="list-unstyled mb-4">
              <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Order Subtotal </strong><strong>$390.00</strong></li>
              <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Tax</strong><strong>$0.00</strong></li>
              <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Total</strong>
                <h5 class="font-weight-bold">$400.00</h5>
              </li>
            </ul><a href="#" class="btn btn-dark rounded-pill py-2 btn-block">Buy now</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>


  <?php
  // $read = "SELECT * FROM product ORDER BY id"; 
  // $result = mysqli_query($conn, $read);
  // if (mysqli_num_rows($result) > 0) {
  //     while($row = mysqli_fetch_assoc($result)) {
  //         echo "<tr>";
  //         echo "<td>" . $row['id'] . "</td>";
  //         echo "<td>" . $row['nameProd'] . "</td>";
  //         echo "<td>"."<img src ='{$row['img']}' width = 100px; height=150px>"."</td>";
  //         echo "<td>" . $row['price'] . "</td>";
  //         echo "<td><button class = 'btn btn-outline-danger' data-toggle='modal' data-target='#update'><i class='fas fa-cogs'></i></button>";
  //         echo "<button onclick='deleteProd('{$row['id']}')' class = 'btn m1-1 btn-outline-warning'> <i class='fas fa-trash'></i></button></td>";
  //         echo "</tr>";
  //     }
  // }
  ?>
</body>

</html>