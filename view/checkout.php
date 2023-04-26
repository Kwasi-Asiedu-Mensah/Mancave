<?php
include_once (dirname(__FILE__)).'/../settings/core.php';
include_once (dirname(__FILE__)).'/../controllers/product_controller.php';
include_once (dirname(__FILE__)).'/../controllers/cart_controller.php';

if(isset($_SESSION['user_id'])){
    $cart_arr = view_cart($_SESSION['user_id']);
    $cart_value = get_cart_value($_SESSION['user_id']);
}else{
    $_SESSION['notloggedin'] = true;
    header("location: ../login/login.php");
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

    <title>Check Out</title>
  </head>
  <body>

      <?php include_once("navbar.php");

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
                        </div>


                      </div>

                      </td>

              <td class="single-product">
                  <?= $value['qty'] ?>

              </td>
              <td> GHc <?= $value['qty']*$value['product_price'] ?></td>



                  </tr>

                  <?php
                  }

              ?>
              </tbody>

          </table>
          <div class="total-price">
              <table>
                  <tr>
                      <td>Sub Total</td>
                      <td>Ghc <span id="amt"><?= $cart_value['result'] ?></span></td>
                  </tr>
                  <tr>
                      <td>Total</td>
                      <td>Ghc <span id="amt"><?= $cart_value['result'] ?></span></td>
                  </tr>
                  <tr>
                     <!-- <td>Pay with</td>
                      <td></td>
                  </tr>
                  <tr>
                    <td>
                        <div id="paypal-payment-button"></div>
                    </td>
                  </tr>
                  <tr>
                      <td>Or</td> -->
                      <td></td>
                  </tr>
                  <tr>
                    <td>
                       <!-- <input type="hidden" id="email" value="<?= $_SESSION['user_email'] ?>"> -->
        <button class="btn btn-success btn-lg btn-block" onclick="payWithPaystack()" style="border-radius: 100px;">Paystack</button>
                    </td>
                  </tr>

              </table>

          </div>

      <div>



          </div>
      </div>


   <?php

      if(isset($_SESSION['notifs'])){
        display_error_message($_SESSION['notifs']);
    }
    ?>

<div class="footer">
          <div class="container-custom">
              <div class="row-custom">
                  <div class="footer-col-1">
                      <h3>Download Our App</h3>
                      <p>Download App for Android and ios mobile phone</p>


                  </div>

                  <div class="footer-col-2">
                      <h3>Our Purpose</h3>
                      <p>Our purpose is to sustainably make the pleasure and benefits of sports accessible to many</p>
                  </div>

                  <div class="footer-col-3">

                      <h3>Useful Links</h3>
                      <ul>
                          <li>Home</li>
                          <li>Shop</li>
                          <li>Cart</li>

                      </ul>
                  </div>

                  <div class="footer-col-4">
                      <h3>Follow Us</h3>
                      <ul>
                          <li>Facebook</li>
                          <li>Twitter</li>
                          <li>Instagram</li>

                      </ul>
                  </div>

              </div>

          </div>


      </div>





    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    -->
    <script src="https://www.paypal.com/sdk/js?client-id=AVfGv6Z5RwC0EOTNplKlG2XLXRhWWREacIPQKRdVDevDzmi6snUeA5MC4IYEUOo-ePbTIDMYhPT2iG-E&disable-funding=credit,card"></script>
    <script src="../js/payment.js"></script>
      <script src="https://js.paystack.co/v1/inline.js"></script>
    <script>
        function payWithPaystack() {
          let handler = PaystackPop.setup({
            key: 'pk_live_bd5356607a881f3a0d6843b75d3172b74b9675cd', // Replace with your public key
            email: 'admin@gmail.com',
            currency: "GHS",
            amount: $('#amt').html() * 100,
            // label: "Optional string that replaces customer email"
            onClose: function(){
              alert('Window closed.');
            },
            callback: function(response){
              let message = 'Payment complete! Reference: ' + response.reference;
              window.location.href = "../functions/process_payment.php?status=completed";
              console.log(response.reference);
              alert(message);
            }
          });
          handler.openIframe();
        }
    </script> 
<?php
    if(isset($_SESSION['notifs'])){
        display_error_message($_SESSION['notifs']);
    }
    ?>

  </body>
</html>
