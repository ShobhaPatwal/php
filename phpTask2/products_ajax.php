<?php

session_start();
include "config.php";
$message = "";

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
        <form>
        <input type='hidden' name='id' value='".$product['id']."' />
		<img src='" .$product['image']. "'>
        <h3 class='title'><a href='#'>" .$product['name']. "</a></h3>
        <span>Price: $" .$product['price']. "</span>
        <div class='cart-action'>
        <input type='text' class='product-quantity' name='quantity' id='quantity' value='1' size='2'>
		<input type='button' name='cart' class='add-to-cart' data-productid='" .$product['id']. "' value='Add to Cart'></div></form></div>";
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
        </div>       
        <div class="message_box">
            <?php echo $message; ?>
        </div>
        <div id="products">
            <?php
            showProducts();
            ?>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js">
        </script>
        <script>
            $(document).ready(function(){
                $(".add-to-cart").click(function(){
                    var productId = $(this).data("productid");
                    var quantity = $("#quantity").val();
                        $.ajax({
                            method: "POST",
                            url: "ajax.php",
                            data: { id: productId, quantity: quantity }
                        })
                        .done(function( msg ) {
                            $("#shopping-cart").html(msg);
                        });
                });
                $(".btnRemoveAction").click(function(){
                    var productid = $(this).data("id");
                    console.log('productid');
                    console.log(productid);

                    $.ajax({
                        method: "POST",
                        url: "ajax.php",
                        data: { id: productId, action: "remove" }
                    })
                    .done(function( msg ) {
                        $("#shopping-cart").html(msg);
                    });
                });

            });
        </script>
    </div>
    <?php include "footer.php"; 
    ?>