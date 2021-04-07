<html>

<head>
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
  <link rel="stylesheet" href="cart.css">
  <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
</head>

<body>
  <?php
  include('../Database/connect.php');
  session_start();
  error_reporting(0);

  function addCart()
  {
    if ($_REQUEST['id']) {
      $id = $_REQUEST['id'];
      //truy xuat thong tin cart du tren id user
      $read = "SELECT * FROM cart WHERE userId = '{$_SESSION['userId']}'";
      global $conn;
      $cart = $conn->query($read);
      if (mysqli_num_rows($cart) > 0) {
        while ($row = mysqli_fetch_assoc($cart)) {
          $idCart = $row['id']; //Lay id cua cart
        }
      }
      $insert = "INSERT INTO cart_item (productId,cartId)
          VALUES ('$id',$idCart) ";
      $conn->query($insert);
      //Them du lieu vao cart item
    }
  }
  addCart();
  
  function calcul(){

}

  ?>
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
                    <div class="p-2 px-3 text-uppercase">Image</div>
                  </th>
                  <th scope="col" class="border-0 bg-light">
                    <div class="py-2 text-uppercase">Name</div>
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
                <?php
                // $product = "SELECT product_view.* FROM product_view
                // INNER JOIN cart_item
                // ON product_view.id = cart_item.productId
                // where cart_item.cartId= (select id from cart where userId = '{$_SESSION['userId']}')"; 

                $idItem = "SELECT * FROM cart_item WHERE cart_item.cartId = (select id from cart where userId ='{$_SESSION['userId']}')";
                $result = $conn->query($idItem);
               echo $conn->error;
                echo $result->error;
                if (mysqli_num_rows($result) > 0) {
                  while ($row = mysqli_fetch_assoc($result)) {
                    $idItem = "{$row['id']}";
                  }
                }
                $product = "SELECT product_view.* FROM product_view
                      INNER JOIN cart_item
                        ON product_view.id = cart_item.productId
                          where cart_item.cartId= (select id from cart where userId ='{$_SESSION['userId']}')";
                $result = mysqli_query($conn, $product);
                if (mysqli_num_rows($result) > 0) {
                  while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . "<img src ='{$row['image']}' width = 80px; height=80px>" . "</td>";
                    echo "<td>" . $row['name'] . "</td>";
                    echo "<td>" . $row['price'] . "</td>";
                    echo "<td>" . "<div class='buttons_added'>
                                  <input class='minus is-form' type='button' value='-'>
                                  <input type='number' class='input-qty' max='10' min='1' name='quantity' placeholder='1' >
                                  <input class='plus is-form' type='button' value='+'></div>" . "</td>";
                    echo "<td>" . "<button class = 'btn m1-1 btn-outline-warning'> <a class='icon2' href = 'delete.php?id=" . $idItem . "'>Delete</a></button>" . "</td>";
                    echo "</tr>";
                  }
                } else {
                  echo "<img src='../Home/Image/emptycart.png'>";
                }
                ?>
              </tbody>
            </table>
          </div>
          <!-- End -->
        </div>
      </div>




      <div class="col-lg-12">
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
  <script>
    $('input.input-qty').each(function() {
      var $this = $(this),
        qty = $this.parent().find('.is-form'),
        min = Number($this.attr('min')),
        max = Number($this.attr('max'))
      if (min == 0) {
        var d = 0
      } else d = min
      $(qty).on('click', function() {
        if ($(this).hasClass('minus')) {
          if (d > min) d += -1
        } else if ($(this).hasClass('plus')) {
          var x = Number($this.val()) + 1
          if (x <= max) d += 1
        }
        $this.attr('value', d).val(d)
      })
    })
    //]]>
  </script>
</body>

</html>