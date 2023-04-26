<div class="container-custom">
          <div class="navbar-custom">
              <div class="logo-custom">
                    Mancave Gaming

              </div>
              <nav>
                    <ul>
                        <?php
                        include_once("../controllers/cart_controller.php");
                        //if admin

                        if(isset($_SESSION['user_role'])){
                            $cart = get_cart_items_no($_SESSION['user_id']);
                            if($_SESSION['user_role'] == 1){

                                ?>
                        <li><a href="../index.php">Home</a></li>
                        <li><a href="shop.php">Shop</a></li>
                        <li><a href="cart.php">Cart(<?= $cart['count'] ?>)</a></li>
                        <li><a href="../admin/dashboard.php">Products</a></li>
                        <li><a href="categories.php">Category</a></li>
                        <li><a href="../login/logout.php">Logout</a></li>


                        <?php
                            }elseif($_SESSION['user_role'] == 2){
                                ?>
                        <li><a href="../index.php">Home</a></li>
                        <li><a href="shop.php">Shop</a></li>
                        <li><a href="cart.php">Cart(<?= $cart['count'] ?>)</a></li>
                        <li><a href="../admin/dashboard.php">Your Products</a></li>
                        <li><a href="../admin/orders.php">Your Orders</a></li>
                        <li><a href="../login/logout.php">Logout</a></li>



                        <?php
                            }elseif($_SESSION['user_role'] == 3){
                                ?>
                        <li><a href="../index.php">Home</a></li>
                        <li><a href="shop.php">Shop</a></li>
                        <li><a href="cart.php">Cart(<?= $cart['count'] ?>)</a></li>
                        <li><a href="../login/seller.php">Become a Seller</a></li>

                        <li><a href="../login/logout.php">Logout</a></li>

                        <?php
                            }
                        }else{
                            $ip_add = getRealIpAddr();
                            $cart = get_cart_items_no_nlog($ip_add);
                        ?>
                        <li><a href="../index.php">Home</a></li>
                        <li><a href="shop.php">Shop</a></li>
                        <li><a href="../login/sign-up.php">Sign Up</a></li>
                        <li><a href="../login/login.php">Login</a></li>
                        <li><a href="cart.php">Cart(<?= $cart['count'] ?>)</a></li>

                        <?php
                        }

                        ?>

                        <li class="single-product">
                  <form method="get" action="search-results.php">
                      <input type="text" name="term" placeholder='search..' style='width: 200px; border-radius: 25px;'>
                      <button class="btn-custom"> Search</button>

                  </form></li>

                    </ul>



              </nav>

          </div>



      </div>
