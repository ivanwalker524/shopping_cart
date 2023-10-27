<?php
session_start();
require './class._db.php';
require './class.cart.php';
if(isset($_GET['addToCart'])) {
  // {
  //   "productId": 1,
  //   "productName": "my product",
  //   "image": "the image",
  //   "qty": 2
  // }
  $productId = $_GET['productId'];
  $q = $db->query("SELECT * FROM products where id = '$productId'");
  $row = $q->fetch_assoc();
  $product = array(
    "productId"=> $row['id'],
    "productName"=> $row['product_name'],
    "image"=> $row['image'],
    "qty"=> 1
  );
  $cart->addProduct($product);
  header("location: ./");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Shopping Cart</title>
  <style><?php require './style.css'; ?></style>
</head>
<body>
  <h1>SHOPPING CART</h1>
  <div id="cart-icon" class="flex justify-center items-center">
    <?php require './cart-shopping.svg'; ?>
    <span><?=$cart->cartItems()?></span>
  </div>
  <?php
  $ref = isset($_GET['ref']) ? $_GET['ref'] : 'products';
  require "./$ref.php";
  ?>
  <h3 style="color: #3a7;">ITEMS IN MY CART</h3>
  <pre><?php print_r(isset($_SESSION['cart']) ? $_SESSION['cart'] : []); ?></pre>
</body>
</html>
