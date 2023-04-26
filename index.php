<?php
include_once (dirname(__FILE__)).'/settings/core.php';
include_once (dirname(__FILE__)).'/controllers/cart_controller.php';
include_once (dirname(__FILE__)).'/controllers/product_controller.php';
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css/custom.css">

    <title>Home</title>
  </head>
  <body>
      <div class="container-custom">
          <div class="navbar-custom">
              <div class="logo-custom">
                    ManCave Gaming

              </div>
              <nav>
                    <ul>
                        <?php
                        //if admin

                        if(isset($_SESSION['user_role'])){
                            $cart = get_cart_items_no($_SESSION['user_id']);
                            if($_SESSION['user_role'] == 1){

                                ?>
                        <li><a href="index.php">Home</a></li>
                        <li><a href="view/shop.php">Shop</a></li>
                        <li><a href="view/cart.php">Cart(<?= $cart['count'] ?>)</a></li>
                        <li><a href="admin/dashboard.php">Products</a></li>
                        <li><a href="view/categories.php">Category</a></li>
                        <li><a href="login/logout.php">Logout</a></li>


                        <?php
                            }elseif($_SESSION['user_role'] == 2){
                                ?>
                        <li><a href="index.php">Home</a></li>
                        <li><a href="view/shop.php">Shop</a></li>
                        <li><a href="view/cart.php">Cart(<?= $cart['count'] ?>)</a></li>
                        <li><a href="admin/dashboard.php">Your Products</a></li>
                        <li><a href="admin/orders.php">Your Orders</a></li>
                        <li><a href="login/logout.php">Logout</a></li>



                        <?php
                            }elseif($_SESSION['user_role'] == 3){
                                ?>
                        <li><a href="index.php">Home</a></li>
                        <li><a href="view/shop.php">Shop</a></li>
                        <li><a href="view/cart.php">Cart(<?= $cart['count'] ?>)</a></li>
                        <li><a href="login/seller.php">Become a Seller</a></li>

                        <li><a href="login/logout.php">Logout</a></li>

                        <?php
                            }
                        }else{
                            $ip_add = getRealIpAddr();
                            $cart = get_cart_items_no_nlog($ip_add);
                        ?>
                        <li><a href="index.php">Home</a></li>
                        <li><a href="view/shop.php">Shop</a></li>
                        <li><a href="login/sign-up.php">Sign Up</a></li>
                        <li><a href="login/login.php">Login</a></li>
                        <li><a href="view/cart.php">Cart(<?= $cart['count'] ?>)</a></li>

                        <?php
                        }

                        ?>

                        <li class="single-product">
                  <form method="get" action="view/search-results.php">
                      <input type="text" name="term" placeholder='search..' style='width: 200px; border-radius: 25px;'>
                      <button class="btn-custom"> Search</button>

                  </form></li>

                    </ul>



              </nav>

          </div>



      </div>

      <div class="header-custom">
          <div class="container-custom">
          <div class="row-custom">
              <div class="col-2-custom texts">
                  <h1 style="color: #fff">Welcome to Mancave</h1>
                  <p style="color: #fff">Build your own ManCave from scratch</p>
                  <a href="view/shop.php" class="btn-custom" style="margin-top: 50px">Shop Now</a>
              </div>

          </div>


      </div>
       </div>

      <!-- Featured Categories -->
      <div class="categories-custom">
          <div class="small-container">
              <h2 class="title">Categories</h2>
          <div class="row-custom">

                  <div class="col-3-custom">
                    <a href="view/shop.php?cat=1">
                    <img src="images/pexels-anthony-139038.jpg">
                    <h4 style="text-align: center">Games</h4>
                    </a>
              </div>

              <div class="col-3-custom">
                  <a href="view/shop.php?cat=2">
                    <img src="images/pexels-anthony-5626726.jpg">
                  <h4 style="text-align: center">Consoles</h4>
                  </a>
              </div>
              <div class="col-3-custom">
                  <a href="view/shop.php?cat=3">
                    <img src="images/pexels-garrett-morrow-1649771.jpg">
                  <h4 style="text-align: center">Accessories</h4>
                  </a>
              </div>


          </div>
          </div>

      </div>

      <!-- Featured Products -->
      <div class="small-container">
            <h2 class="title">Featured Products</h2>
            <div class="row-custom">
                

            </div>

      </div>

      <div class="footer">
          <div class="container-custom">
              <div class="row-custom">
                  <div class="footer-col-1">
                      <h3>Download Our App</h3>
                      <p>Download App for Android and ios mobile phone</p>


                  </div>
                  
                <?php

                     $products = display_all_products_fxn();
                     foreach($products as $singleproduct){

                        echo '<div class="col-4-custom">';
                        echo "<img src='".$singleproduct['product_img']."'>";
                    //print_r($products[$i]['product_img']);
                    echo '</div>';
                     }
                   //for($i=0; $i<8; $i++){
                   //echo '<div class="col-4-custom">';
                    //echo "<img src=$products[$i]['product_img']";
                    //print_r($products[$i]['product_img']);
                    //echo '</div>';

                   //}
                    
                ?>
                </div>
                  <div class="footer-col-2">
                      <img src="images/nier.jpg">
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
  </body>
</html>
