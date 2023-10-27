<?php
class Cart extends DB {
    // -------------------
    // This is what the cart array is intended to look like
    // [
    //     {
    //         "productId": 1,
    //         "productName": "my product",
    //         "image": "the image",
    //         "qty": 2
    //     }
    // ]
    public $cartArray;
    public function __construct() {
        $this->cartArray = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
    }
    public function addProduct($product) {
        if(!is_array($product)) return $cartArray;
        $cartArray = $this->cartArray; // shortening the array syntax
        // First, we need to check if this item exists
        $existingItem = null;
        foreach($cartArray as $key => $item) {
            if($item["productId"] == $product['productId']) {
                // Product has been found. Let's update the qty
                $existingItem = $item;
                $cartArray[$key] = array(
                    "productId" => $item['productId'],
                    "productName" => $item['productName'],
                    "image" => $item["image"],
                    "qty" => $item['qty']+$product['qty']
                );
                $_SESSION['cart'] = $cartArray;
                break; // break the loop right here.
                // return;
                // stop this function from proceeding.
                // If we don't stop this function, we shall have a duplicate. And we don't want that
            }
        }
        if(!$existingItem) {
            $cartArray[] = array(
                "productId" => $product['productId'],
                "productName" => $product['productName'],
                "image" => $product["image"],
                "qty" => $product['qty'] // notice how we used $product instead of item? It's because we want to accept the quantity submitted by the user
            );
            $_SESSION['cart'] = $cartArray;
        }
        return $cartArray;
    }
    public function cartItems() {
        $total = 0;
        $this->cartArray = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
        foreach($this->cartArray as $item) $total+= $item['qty'];
        return $total;
    }
}
$cart = new Cart; // initialize the Cart class that will be used in the global scope.