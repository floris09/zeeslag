<?php
    $products = getRecentProducts(6);
    // $surfboards = getRecentCategoryProducts($surfboards_id, 3);
    // echo $surfboards_id;
    $products = json_decode($products);
    // $surfboards = json_decode($surfboards); ?>


  <h3>New Products</h3>
<div id='guest-products-container'>
  <?php
    foreach ($products as $product) {
      echo "<div class='guest-product-div' id='prod-$product->id'>
              <div class='guest-product-name-div'>
                $product->name <br>
                $product->price IDR
              </div>
              <div class='guest-product-image-div' style='background-image:url($product->image_url)'></div>
            </div>";
    }
  ?>
</div>
