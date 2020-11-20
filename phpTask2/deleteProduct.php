<?php

session_start();
$id = $_GET["product_id"];
if(!empty($_SESSION["cart_item"])) {
    foreach($_SESSION["cart_item"] as $key => $value) {
      if ($_GET["product_id"] == $key) {
      unset($_SESSION["cart_item"][$key]);
      $message = "<div class='box' style='color:red;'>
      Product is removed from your cart!</div>";
      }
      if(empty($_SESSION["cart_item"]))
      {
      unset($_SESSION["cart_item"]);
      } 
    }
}
?>