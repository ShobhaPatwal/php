<?php

session_start();
include "config.php";
$message = "";
if (isset($_POST['cart']))
{ 
    if(!empty($_POST["quantity"])) 
    {
        $productId = $_POST['id'];
        $quantity = $_POST['quantity'];
        foreach ($products as $product_key=>$product) {
            if ($product['id'] == $productId) {
                $name = $product['name'];
                $price = $product['price'];
                $image = $product['image'];
                $cartArray = array(
                    $productId=>array(
                        'id' => $productId,    
                        'name' => $name,
                        'price' => $price,
                        'image' => $image,
                        'quantity'=> $quantity
                    )
                );
                break;
            }
        }
        if (empty($_SESSION["cart_item"])) {
            $_SESSION["cart_item"] = $cartArray;
            
            $message = "<div class='box'>Product is added to your cart!</div>";
        } else {
            $array_keys = array_keys($_SESSION["cart_item"]); 
            if (in_array($productId, $array_keys)) {
                foreach($_SESSION["cart_item"] as $k => $v) {
                    if($productId == $k) {
                        if(empty($_SESSION["cart_item"][$k]["quantity"])) {
                            $_SESSION["cart_item"][$k]["quantity"] = 0;
                        }
                        $_SESSION["cart_item"][$k]["quantity"] += $_POST["quantity"];
                    }
                }
                $message = "<div  class='box'>Product is updated in your cart!</div>"; 
            } else {
                $_SESSION["cart_item"] = array_merge($_SESSION["cart_item"], $cartArray);
                $message = "<div class='box'>Product is added to your cart!</div>";
            }
        }
 
    } else {
        $message = "<div class='box' style='color:red;'>Product quantity should be minimum 1!</div>";
    }
    header('location:'.$_SERVER['PHP_SELF']);
}
/**
 * Displaying all products
 * 
 * @return void
 */
function showProducts() 
{
    global $products;
    $html = "";
    foreach ($products as $product_key=>$product) {
        $html = "<div id='" .$product['id']. "' class='product'>
        <form class='add' action='products2.php' method='post'>
        <input type='hidden' name='id' value='".$product['id']."' />
		<img src='" .$product['image']. "'>
        <h3 class='title'><a href='#'>" .$product['name']. "</a></h3>
        <span>Price: $" .$product['price']. "</span>
        <div class='cart-action'>
        <input type='text' class='product-quantity' name='quantity' value='1' size='2'>
		<input type='submit' name='cart' class='add-to-cart' value='Add to Cart'></div></form></div>";
        echo $html;
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>
        Products
        </title>
        <link href="style.css" type="text/css" rel="stylesheet">
    </head>
    <?php include "header.php"; ?>
    <div id="main">
        <?php
        if(!empty($_SESSION["cart_item"])) { 
            $cart_count = count(array_keys($_SESSION["cart_item"]));
        ?>
        <div class="cart_div">
            <a href="cart.php"><img src="images/cart-icon.png" /> Cart<span>
            <?php echo $cart_count;?></span></a>
        </div>
        <?php
        }
        ?> 
        <div id="products">
            <?php
            showProducts();
            ?>
        </div>
        <div class="message_box">
            <?php echo $message; ?>
        </div>
    </div>
    <?php include "footer.php"; 
    ?>