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
    //header('location:'.$_SERVER['PHP_SELF']);
}
/* Remove product */
if (!empty($_GET['action']) && $_GET['action']=="remove") {
    if(!empty($_SESSION["cart_item"])) {
        foreach($_SESSION["cart_item"] as $key => $value) {
            if ($_GET["product_id"] == $key) {
                unset($_SESSION["cart_item"][$key]);
                $message = "<div class='box' style='color:red;'>
                Product is removed from your cart!</div>";
            }
            if(empty($_SESSION["cart_item"])) {
                unset($_SESSION["cart_item"]);
            } 
        }
    }
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
        <form action='products.php' method='post'>
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
        <div id="shopping-cart"> 
            <h1>Shopping Cart</h1>
            <?php
            if(isset($_SESSION["cart_item"])) {
                $total_quantity = 0;
                $total_price = 0;
            ?>	
            <table class="tbl-cart" cellspacing = '0px'>
                <thead>
                    <tr>
                        <th>Product Name</th>
                        <th>Quantity</th>
                        <th>Unit Price</th>
                        <th>Total Price</th>
                        <th>Remove</th>
                    </tr>
                </thead>
                <tbody>	
                    <?php		
                    foreach ($_SESSION["cart_item"] as $item){
                    ?>
                    <tr>
                        <td><img src="<?php echo $item["image"]; ?>" class="cart-item-image" /><?php echo $item["name"]; ?></td>
				        <td><?php echo $item["quantity"]; ?></td>
				        <td><?php echo "$".$item["price"]; ?></td>
				        <td><?php echo "$".number_format($item["price"]*$item["quantity"], 2); ?></td>
                        <td><a href="products.php?action=remove&product_id=<?php echo $item["id"]; ?>" class="btnRemoveAction">Remove Item</a></td>
				    </tr>
                    <?php
                    $total_quantity += $item["quantity"];
				    $total_price += ($item["price"]*$item["quantity"]);
		            }
		            ?>
                    <tr>
                        <td align="right">Total:</td>
                        <td><?php echo $total_quantity; ?></td>
                        <td colspan="2"><strong><?php echo "$ ".number_format($total_price, 2) ?></strong></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>		
            <?php
            } else {
            ?>
            <div class="no-records">Your Cart is Empty</div>
            <?php 
            }
            ?>
        </div>       
        <div class="message_box">
            <?php echo $message; ?>
        </div>
        <div id="products">
            <?php
            showProducts();
            ?>
        </div>
    </div>
    <?php include "footer.php"; 
    ?>