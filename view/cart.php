<?php
include_once (dirname(__FILE__)).'/../settings/core.php';
include_once (dirname(__FILE__)).'/../controllers/product_controller.php';
include_once (dirname(__FILE__)).'/../controllers/cart_controller.php';

if(isset($_SESSION['user_id'])){
    $cart_arr = view_cart($_SESSION['user_id']);
}else{
    $ip_add = getRealIpAddr();
    $cart_arr = view_cart_nlog($ip_add);
}
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="../css/custom.css">

    <title>Cart</title>
  </head>
  <body>

      <?php include_once("navbar.php");
            if(!empty($cart_arr)){
      ?>
      <div class="small-container cart-page">
          <table>
              <thead>
                  <tr>
                  <th>Product</th>
                  <th>Quantity</th>
                  <th>Sub-Total</th>

              </tr>

              </thead>
              <tbody>
                  <?php
                  foreach($cart_arr as $key => $value){
                      ?>

                  <tr>
                      <td>
                          <div class="cart-info">
                          <img src="<?= '../'.$value['product_img'] ?>">
                          <div>
                              <p><?= $value['product_name'] ?></p>
                          <small>GHc <?= $value['product_price'] ?></small>
                        <a href="<?= '../functions/cart_delete.php?id='.$value['product_id'] ?>">Remove</a>

                        </div>


                      </div>

                      </td>

              <td class="single-product">
                  <form method="get" action="../functions/cart_update.php">
                      <input type="number" name="qty" value="<?= $value['qty'] ?>" min="1" max = <?= $value['stock']?>>
                      <input type="hidden" name="id" value="<?= $value['product_id'] ?>">
                      <button class="btn-custom" name="submit"> Update </button>
                  </form>

              </td>
              <td> GHc <?= $value['qty']*$value['product_price'] ?></td>



                  </tr>

                  <?php
                  }

              ?>
              </tbody>

          </table>

      <div>

          <a href="shop.php"><button class="btn-custom">Continue Shopping</button></a>
          <a href="checkout.php"><button class="btn-custom">Check Out</button></a>

          </div>
      </div>
      <?php
            }else{
                ?>
      <div class="small-container"><p>Your cart is empty. Continue <a href="shop.php"><span style="color: #398BEE">shopping</span></a></p></div>
      <?php
            }


      ?>





<?php include('footer.php') ?>


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    -->
<?php

    if(isset($_SESSION['notifs'])){
        display_error_message($_SESSION['notifs']);
    }
    ?>

  </body>
</html>
