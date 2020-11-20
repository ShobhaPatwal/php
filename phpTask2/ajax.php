<?php

session_start();
include('config.php');
$pickup = $_POST['pickup'];
$quantity = $_POST['quantity'];
$action = $_POST['action'];

function fetchProduct($productid) {
    global $products;
    foreach($products as $product) {
        if($product['id'] == $productid) {
            return $product;    
        }
    }
    return false;
}
$product = fetchProduct($productid);
$name = $product['name'];
$price = $product['price'];
$image = $product['image'];
$cartArray = array(
    $productid=>array(
        'id' => $productid,    
        'name' => $name,
        'price' => $price,
        'image' => $image,
        'quantity'=> $quantity
    )
);
if (empty($_SESSION["cart_item"])) {
    $_SESSION["cart_item"] = $cartArray;
    $message = "<div class='box'>Product is added to your cart!</div>";
} else {
    $array_keys = array_keys($_SESSION["cart_item"]); 
    if (in_array($productid, $array_keys)) {
        foreach($_SESSION["cart_item"] as $k => $v) {
            if($productid == $k) {
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


/* Remove product */
if (!empty($_POST['action']) && $_POST['action']=="remove") {
    if(!empty($_SESSION["cart_item"])) {
        foreach($_SESSION["cart_item"] as $key => $value) {
            if ($_POST["productid"] == $key) {
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

?>

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
            <td><a href="#" class="btnRemoveAction"  data-id="<?php echo $item["id"]; ?>">Remove Item</a></td>
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

//echo json_encode( array("product"=>$product) ); 
//echo json_encode($product);

?>