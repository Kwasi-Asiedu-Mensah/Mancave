<?php
include_once (dirname(__FILE__)).'/../settings/core.php';
include_once (dirname(__FILE__)).'/../controllers/product_controller.php';
if(isset($_GET['term'])){
    $term = $_GET['term'] . '%';
    $products = search_products_fxn($term);
    //print_r($products);
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

    <title>Search Results</title>
  </head>
  <body>
      <?php include_once("navbar.php"); ?>

      <div class="container-custom">
          <?php
          if(!empty($products)){
            foreach($products as $key => $value){
                ?>
            <div class="media">
              <img src="<?= '../'.$value['product_img'] ?>" class="align-self-start mr-3" alt="..." width="200px" height="200px">
              <div class="media-body">
                <h5 class="mt-0"><?= $value['product_name'] ?></h5>
                <h6 class="mt-0">By <?= $value['username'] ?></h6>
                <h7 class="mt-0">In <?= $value['cat_name'] ?></h7>
                <p><?= $value['product_desc'] ?></p>
                        <div class="col"><a href="<?= "single-product.php?id=".$value['id'] ?>" class="btn-custom" styl="margin: 0">View</a></div>
              </div>

        </div>
        <hr>
          <?php
            }}else{
              ?>
          <p>No products found</p>
          <?php
          }
          ?>



      </div>

<?php include('footer.php') ?>


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
