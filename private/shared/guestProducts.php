<?php
    $products = getRecentProducts(3);
    $surfboards = getRecentSurfboards(3);
    $products = json_decode($products);
    $surfboards = json_decode($surfboards); ?>



<div class='guest-products-container'>
  <h3>New Products</h3>
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

<div class='guest-surfboards-container'>
  <h3>New Surfboards<h3>
  <?php
    foreach ($surfboards as $surfboard) {
      echo "<div class='guest-product-div' id='surf-$surfboard->id'>
              $surfboard->name
            </div>";
    }
  ?>
</div>
