<?php
include_once("../settings/core.php");
include_once("../controllers/cart_controller.php");
$details = get_seller_sales($_SESSION['user_id']);;
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script
      src="https://kit.fontawesome.com/64d58efce2.js"
      crossorigin="anonymous"
    ></script>
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>Payment Details</title>
  </head>
  <body>
    <div class="container-custom">
      <div class="forms-container">
        <div class="signin-signup">
          <form action="seller_payment_process.php" class="payment-details-form" method="post">
            <h2 class="title">Payment Details</h2>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" placeholder="Account name" name="acc_name" />
            </div>
            <div class="input-field">
              <i class="fas fa-pen"></i>
              <input type="text" placeholder="Account number" name="acc_number" />
            </div>
            <div class="input-field">
            <i class="fas fa-pen"></i>
              <input type="text" placeholder="Bank name" name="bank_name" />
            </div>
            <div class="input-field">
            <i class="fas fa-pen"></i>
              <input type="text" placeholder="Amount" name="amt" value="<?= $details[0]['result']*0.9 ?> "/>
            </div>
            <input type="submit" name="submit" value="Confirm" class="btn-custom solid" />

          </form>
          </div>
      </div>

      <div class="panels-container">
        <div class="panel left-panel">
          <div class="content">
            <h3>Notice</h3>
            <p>
              Kindly note that transactions are processed within 24 hours. Kindly contact support if there is a problem
            </p>
            <!--<a href="sign-up.php">
            <button class="btn-custom transparent" id="sign-up-btn">
              Sign up
            </button>
            </a>
          </div>
          <img src="img/log.svg" class="image" alt="" />
        </div>
        <div class="panel right-panel">
          <div class="content">
            <h3>One of us ?</h3>
            <p>
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum
              laboriosam ad deleniti.
            </p>
            <button class="btn-custom transparent" id="sign-in-btn">
              Sign in
            </button>
          </div>
          <img src="img/register.svg" class="image" alt="" />
        </div>
      </div>
    </div>-->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

<?php

    if(isset($_SESSION['notifs'])){
        display_error_message($_SESSION['notifs']);
    }
    ?>
  </body>
</html>
