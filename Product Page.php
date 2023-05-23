<?php
session_start();
include 'Header.php';
$productID=$_GET['productID'];

if(isset($_GET['btnAddToCart'])){
    $cartID = $_GET['cartID'];
    $productID = $_GET['productID'];    
    $quantity = 1;
    $ID = $_SESSION['CustID'];
    $companyID = $_GET['companyID'];

    $queryaddcart = "INSERT INTO `cart` (`Product_ID`, `Quantity`, `Customer_ID`, `Company_ID`) VALUES ('$productID', '$quantity', '$ID', '$companyID')";
    if (mysqli_query($connection,$queryaddcart)){
        echo "<script>alert('Added to cart successfully')</script>";
    } else {
        echo 'Error adding to cart';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="productpagestyle.css">
</head>

<style>
    Body {  
    font-family: Calibri, Helvetica, sans-serif;  
    background-color: #c2d6b4;  
    }  

    #content2{
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
    border-radius: 20px;
    height: auto;
    background-color:#5C8660;
    margin: 20px 50px 10px 0px;
    padding: 50px 50px ;
    }
    /* #wrapper {
    top: 0%;
    left: 0%;
    overflow: hidden;
    position: fixed;
    width: 100%;
    height:auto;
    margin: 10px 0px;
    } */
</style>

<body>
<div id="wrapper">
    <div id="content2">
    <form action="" method="get">
    <?php
     $query = "SELECT * FROM `product` WHERE `Product_ID` ='$productID'";
     $result = mysqli_query($connection, $query);
     $row = mysqli_fetch_array($result); //$row[0]; $row['email']
     $count = mysqli_num_rows($result); //1 or 0
     if ($count == 1){
     ?>

        <p>
            <a href="Show All Product.php">Back</a><br><br>
            <?php echo '<img src="data:image;base64,' .base64_encode($row['Product_Image']).'" height="100" width="100">';?><br>
            <b>Product Name: </b><?php echo $row['Product_Name']; ?><br>
            <b>Description: </b><?php echo $row['Product_Description']; ?><br>
            <b>Unit Price: </b><?php echo $row['Unit_Price']; ?><br>
            <br>

            <input type="hidden" id="cartID" name="cartID" value="cartID">
            <input type="hidden" id="productID" name="productID" value="<?php echo $row['Product_ID'];?>">
            <input type="hidden" id="companyID" name="companyID" value="<?php echo $row['Company_ID'];?>">
            <button type="submit" name="btnAddToCart">Add to cart</button>
            <button><a href="payment_page.php">Buy Now</a></button>
        </p>
    </form>
    </div>
</div>

<?php            
        }
?>

</body>
</html>