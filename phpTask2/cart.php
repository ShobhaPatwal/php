<?php

session_start();
include "config.php";
$message = "";

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
    header('location:'.$_SERVER['PHP_SELF']);
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>
        Cart
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
                        <td><a href="cart.php?action=remove&product_id=<?php echo $item["id"]; ?>" class="btnRemoveAction">Remove Item</a></td>
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
            if(!empty($_SESSION["cart_item"])) { 
                $cart_count = $total_quantity;
            ?>
            <div class="cart_div">
                <a href="cart.php"><img src="images/cart-icon.png" /> Cart<span>
                <?php echo $cart_count; ?></span></a>
            </div>
            <?php
            }
            ?>	
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
    </div>
    <?php include "footer.php"; 
    ?>