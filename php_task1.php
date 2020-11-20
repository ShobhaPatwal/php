<?php 

/**
 * Array file Doc Comment
 * 
 * PHP version 7.4.9
 * 
 * @category Array_Of_Products
 * @package  Array_Of_Products
 * @author   Author <shobha@godaddy.com>
 * @license  http://shobhalicence.org/licesnces/SHOBHA License
 * @link     http://localhost
 */

 /**
  *  $products
  */
$products = array(   
    "Electronics" => array(
        "Television" => array(
            array(
               "id" => "PR001", 
               "name" => "MAX-001",
               "brand" => "Samsung"
            ),
            array(
                "id" => "PR002", 
                "name" => "BIG-301",
                "brand" => "Bravia"
            ),
            array(
                "id" => "PR003", 
                "name" => "APL-02",
                "brand" => "Apple"
            )
        ),
        "Mobile" => array(
            array(
                "id" => "PR004", 
                "name" => "GT-1980",
                "brand" => "Samsung"
            ),
            array(
                "id" => "PR005", 
                "name" => "IG-5467",
                "brand" => "Motorola"
            ),
            array(
                "id" => "PR006", 
                "name" => "IP-8930",
                "brand" => "Apple"
            )
        )
    ),
    "Jewelry" => array(
        "Earrings" => array(
            array(
                "id" => "PR007", 
                "name" => "ER-001",
                "brand" => "Chopard"
            ),
            array(
                "id" => "PR008", 
                "name" => "ER-002",
                "brand" => "Mikimoto"
            ),
            array(
                "id" => "PR009", 
                "name" => "ER-003",
                "brand" => "Bvlgari"
            )
        ),
        "Necklaces" => array(
            array(
                "id" => "PR010", 
                "name" => "NK-001",
                "brand" => "Piaget"
            ),
            array(
                "id" => "PR011", 
                "name" => "NK-002",
                "brand" => "Graff"
            ),
            array(
                "id" => "PR012", 
                "name" => "NK-003",
                "brand" => "Tiffany"
            )
        )
    )
);

/**
 * Displaying the products contents
 * 
 * @return void
 */
function showProducts() 
{
    global $products;
    foreach ($products as $category=>$value) {
        foreach ($value as $subcategory=>$x) {
            foreach ($x as $product=>$y) {
                echo "<tr><td>".$category."</td>";
                echo "<td>".$subcategory."</td>";
                echo "<td>".$y['id']."</td>";
                echo "<td>".$y['name']."</td>";
                echo "<td>".$y['brand']."</td></tr>";
            }
        }
    }
}

/**
 * Deleting the products contents
 * 
 * @return void
 */
function deleteProduct() 
{
    global $products;
    echo "<table border='1' cellspacing = '0px' cellpadding 
        = '10px'><thead><tr><th>Category</th
        ><th>Subcategory</th><th>ID</th><th>Name</th>
        <th>Brand</th></tr></thead><tbody>";
    foreach ($products as $category=>$value) {
        foreach ($value as $subcategory=>$x) {
            foreach ($x as $product=>$y) {
                if ($y['id'] == 'PR003') {
                    continue;
                } else {
                        echo "<tr><td>".$category."</td>";
                    echo "<td>".$subcategory."</td>";
                    echo "<td>".$y['id']."</td>";
                    echo "<td>".$y['name']."</td>";
                    echo "<td>".$y['brand']."</td></tr>";
                }
            }
        }
    }
    echo "</tbody></table>";  
}

/**
 * Updating the product contents
 * 
 * @return void
 */
function updateProduct() 
{
    global $products;
    echo "<table border='1' cellspacing = '0px' cellpadding 
    = '10px'><thead><tr>
    <th>Category</th>th>Subcategory</th>
    <th>ID</th><th>Name</th><th>Brand</th></tr></thead><tbody>";
    foreach ($products as $category=>$value) {
        foreach ($value as $subcategory=>$x) {
            foreach ($x as $product=>$y) {
                if ($y['id'] == 'PR002') {
                    $y['name'] = "BIG-555";
                    echo "<tr><td>".$category."</td>";
                    echo "<td>".$subcategory."</td>";
                    echo "<td>".$y['id']."</td>";
                    echo "<td>".$y['name']."</td>";
                    echo "<td>".$y['brand']."</td></tr>";
                } else {
                    echo "<tr><td>".$category."</td>";
                    echo "<td>".$subcategory."</td>";
                    echo "<td>".$y['id']."</td>";
                    echo "<td>".$y['name']."</td>";
                    echo "<td>".$y['brand']."</td></tr>";
                }
            }
        }
    }
    echo "</tbody></table>";
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>PHP Task 1</title>
    </head>
    <body>
        <div id="wrapper">
            <!-- products table --->
            <div id="product_list">
                <p>1. List all products of an array</p>
                <table border="1" cellspacing = "0px" cellpadding = "10px">
                    <thead>
                        <tr>
                            <th>Category</th>
                            <th>Subcategory</th>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Brand</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        showProducts();
                        ?>
                    </tbody>
                </table>
                <br/><br/>
                <p>2. List all products in Mobile subcategory</p>
                <table border="1" cellspacing = "0px" cellpadding = "10px">
                    <thead>
                        <tr>
                           <th>Category</th>
                           <th>Subcategory</th>
                           <th>ID</th>
                           <th>Name</th>
                           <th>Brand</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($products as $category=>$value) {
                            foreach ($value as $subcategory=>$x) {
                                if ($subcategory == 'Mobile') {
                                    foreach ($x as $product=>$y) {
                                        echo "<tr><td>".$category."</td>";
                                        echo "<td>".$subcategory."</td>";
                                        echo "<td>".$y['id']."</td>";
                                        echo "<td>".$y['name']."</td>";
                                        echo "<td>".$y['brand']."</td></tr>";
                                    }
                                }
                            }
                        }
                        ?>
                    </tbody>
                </table>
                <br/>
                <br/>
                <p>3. List all products with brand name = "Samsung"</p>
                <?php
                foreach ($products as $category=>$value) {
                    foreach ($value as $subcategory=>$x) {
                        foreach ($x as $product=>$y) {
                            if ($y['brand'] == 'Samsung') {
                                echo "<p><b>Product ID: </b>".$y['id']."<br/>";
                                echo "<b>Product Name: </b>".$y['name']."<br/>";
                                echo "<b>Subcategory: </b>".$subcategory."<br/>";
                                echo "<b>Category: </b>".$category."</p>";
                            }
                        }
                    }
                }
                ?>
                <br/>
                <p>4. Delete product with id = PR003</p>
                <?php
                deleteProduct();
                ?>
                <br/>
                <p>5. Update product name = "BIG-555" with id = PR002</p>
                <?php
                updateProduct();
                ?>
                <br/>
                <br/>
            </div>
        </div>
    </body>
</html>