<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Game Store</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Shop</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Category
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
      <?php
        if(isset($_SESSION['user_id'])){
            if($_SESSION['user_role'] = 1){
                ?>
          <li class="nav-item">
            <a class="nav-link" href="view/categories.php">Categories</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="view/products.php">Products</a>
          </li>
        <?php
            }elseif($_SESSION['user_role'] == 2){
                ?>
        <li class="nav-item">
            <a class="nav-link" href="view/products.php">Products</a>
          </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Orders</a>
          </li>
        <?php
            }
        ?>
        <li class="nav-item">
            <a class="nav-link" href="#">Logout</a>
          </li>
        <?php

        }
      ?>
    <li class="nav-item">
        <a class="nav-link" href="#">Cart</a>
    </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>
