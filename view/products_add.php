<?php
include_once("../settings/core.php");
include_once("../controllers/product_controller.php");
$categories_arr = display_categories();

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
      <link rel="stylesheet" href="../css/custom.css">

    <title>Hello, world!</title>
  </head>
  <body>
    <?php include_once("navbar.php"); ?>
    <div class="container">
    <h1>Add New Product</h1>
      <form method="post" action="../functions/product_add.php" enctype="multipart/form-data">
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="inputname">Product Name</label>
              <input type="text" class="form-control" id="inputname" name="product_name">
            </div>
            <div class="form-group col-md-6">
              <label for="inputprice">Price: Ghc</label>
              <input type="number" class="form-control" id="inputprice" name="product_price">
            </div>
          </div>
          <div class="form-group">
            <label for="inputAddress">Description</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="desc"></textarea>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="inputauthor">Category</label>
              <select name="category" id="inputauthor" class="form-control">
                <option value="" selected>Pick a Category</option>
                <?php
                  foreach($categories_arr as $key =>$value){
                ?>
                  <option value="<?php echo $value['id']; ?>"><?php echo $value['cat_name']; ?></option>
                  <?php
                  }
                  ?>
              </select>
            </div>
            <div class="form-group col-md-6">
              <label for="inputstock">Stock</label>
              <input type="number" class="form-control" id="inputstock" name="stock">
            </div>
          </div>
            <div class="form-group">
            <label for="exampleFormControlFile1">Cover Image</label>
            <input type="file" class="form-control-file" name="img" id="exampleFormControlFile1">
          </div>
          <input type="hidden" name="seller_id" value="<?= $_SESSION['user_id'] ?>">
          <button type="submit" class="btn btn-primary" name="submit">Add Product</button>
        </form>



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
    <?php

    if(isset($_SESSION['notifs'])){
        echo 'hi';
        display_error_message($_SESSION['notifs']);
    }
    ?>
  </body>
</html>
