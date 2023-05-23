<?php
session_start();
include 'dbConn.php';
include 'Header.php';

$ID = $_SESSION['CustID'];
$querycart = "SELECT * FROM `cart` WHERE `Customer_ID`= '$ID'";
$resultcart = mysqli_query($connection,$querycart);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Cart</title>

    <style>
        body {
            font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
            background-color: #c2d6b4;  
        }
        #MyCart{
            top: 0%;
            left: 0%;
            overflow: hidden;
            width: 100%;
            margin: 10px 0px;
        }
        table{
            position: fixed;
            border-collapse: collapse;
            border-spacing: 0;
            width: 100%;
            border: 1;
            font-size: 17px;
            font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
        }
        td, th {
            vertical-align: middle;
            text-align: center;
        }
        input[type="checkbox"] {
            width: 22px;
            height: 22px;
            border-radius: 5px;
        }
        input[type="number"] {
            width: 120px;
            height: 30px;
            border-radius: 9px;
        }
        button {   
            color: rgb(0, 0, 0);   
            padding: 15px;   
            margin: 20px 10px;   
            border: none;   
            cursor: pointer; 
        } 
        button:hover {
            opacity: 0.7;
        }
        #btnCheckout:hover {   
            border: 1px solid ghostwhite;
            font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
            background: saddlebrown;
            color: #EDFFCC;
        }   
        #btnCheckout {
            background-color: #EDFFCC; 
            color: saddlebrown;
            border: 1px solid ghostwhite;
            padding: 15px;
            font-size: 16px;
            font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
            height: 50px;  
            width: 100px;  
            font-weight: bold;
            transition: all .5s ease-in;
            padding: 15px;   
            margin: 20px 10px;   
            border: none;   
            border-radius: 20px;
            cursor: pointer; 
        }        
        .totalCheckout {
            font-size: 15px;
            position: fixed;
            bottom: 0;
            text-align: center;
        }
    </style>
</head>
<body>
    <div id="MyCart">
        <h1>My Cart</h1>                
        <hr>      
        <table id="myTable" cellpadding="0" cellspacing="0">
            <tr>
                <th><b>Select</b></th>
                <th><b>Image</b></th>
                <th><b>Product Name</b></th>
                <th><b>Unit Price</b></th>
                <th><b>Quantity</b></th>                
                <th><b>Subtotal</b></th>                
            </tr>
            <?php 
            
            $counter = 0;
            while ($rowcart = mysqli_fetch_assoc($resultcart)) {   
                $productID = $rowcart['Product_ID'];
                $queryprod = "SELECT * FROM `product` WHERE `Product_ID` = '$productID'";
                $resultprod = mysqli_query($connection, $queryprod);
                $rowprod = mysqli_fetch_array($resultprod);
                $countprod = mysqli_num_rows($resultprod);
                if ($countprod == 1) {
            ?>
               
            <tr>
                <?php $counter += 1 ?>
                <td><input type="checkbox" id="selProduct" name="selProduct" value="selProduct" onclick="selectFunction()"/></td>
                <td><?php echo '<img src="data:image;base64,' .base64_encode($rowprod['Product_Image']).'"height="80" width="80">' ?></td>
                <td><?php echo $rowprod['Product_Name']; ?></td>
                <td><?php echo $rowprod['Unit_Price']; ?></td>
                <td><input type="number" id="quantity" name="quantity" value="<?php echo $rowcart['Quantity']; ?>" onchange="mulFunction(<?php echo $counter; ?>)"> </td>                
                <td><?php                  
                    $unitprice = $rowprod['Unit_Price'];
                    $quantity = $rowcart['Quantity'];
                    $subtotal = $unitprice * $quantity;
                    echo $subtotal;
                ?></td>
            </tr>
    </div>       
    
<script>
    function selectFunction() {
        var rowCount = document.getElementById("myTable").rows.length;
        var total = 0;
        var subtotal = 0;
        for(i = 1; i < rowCount; i++) {
            var rowCheck = document.getElementById("myTable").rows[i].cells[0].getElementsByTagName('input')[0].checked;
            if( rowCheck == true) {
                subtotal = document.getElementById("myTable").rows[i].cells[5].innerHTML;
                total += parseInt(subtotal);
            }            
        }
        document.getElementById("total").innerHTML = "Total Price: RM " + total;
    }

    function mulFunction(x) {
        var quantity = document.getElementById("myTable").rows[x].cells[4].getElementsByTagName('input')[0].value;
        var unitprice = document.getElementById("myTable").rows[x].cells[3].innerHTML;
        var subtotal = quantity * unitprice;
        document.getElementById("myTable").rows[x].cells[5].innerHTML = subtotal;
    }
</script>
        
<?php
                }
            }
mysqli_close($connection);
?>
        </table>  
       
<div class="totalCheckout">
    <p id="total" >Total Price: RM 0</p>
    <a href="payment_page.php"><button type="submit" name="btnCheckout" id="btnCheckout">Checkout</button></a>
</div>
                       
</body>
</html>