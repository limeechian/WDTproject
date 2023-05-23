<?php
session_start();
include 'Header.php';
// include 'Header.php';

$ID = $_SESSION['CustID'];
$querypurchase = "SELECT * FROM `order` WHERE `Customer_ID`= $ID";
$resultpurchase = mysqli_query($connection,$querypurchase);

if(isset($_POST['btnBuyAgain'])){
    header("location: Product Page.php");

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Purchase</title>

    <style>
        body {
            font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
            background-color: #c2d6b4;  
        }
        #MyPurchase{
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
        #btnBuyAgain:hover {   
            border: 1px solid ghostwhite;
            font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
            background: saddlebrown;
            color: #EDFFCC;
        }     
        #btnBuyAgain {
            text-align: center;
            line-height: 15px;
            background-color: #EDFFCC; 
            color: saddlebrown;
            border: 1px solid ghostwhite;
            padding: 15px;
            font-size: 16px;
            font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
            height: 50px;  
            width: 150px;  
            font-weight: bold;
            transition: all .5s ease-in;
            padding: 15px;   
            margin: 17px 0px;   
            border: none;   
            border-radius: 20px;
            cursor: pointer; 
        }      
    </style>
</head>
<body>
    <div id="MyCart">
        <h1>My Purchase</h1>
        <hr>
        <form action="#" method="post">    
        <table id="myTable" cellpadding="0" cellspacing="0">
            <tr>
                <th><b>Image</b></th>
                <th><b>Product Name</b></th>
                <th><b>Quantity</b></th>
                <th><b>Unit Price</b></th>                
                <th><b>Subtotal</b></th>
                <th></th>                
            </tr>
            <?php
            $counter = 0;
            while ($rowpurchase = mysqli_fetch_assoc($resultpurchase)) {
                $productID = $rowpurchase['Product_ID'];
                $queryprod = "SELECT * FROM product WHERE Product_ID= '$productID'";
                $resultprod = mysqli_query($connection, $queryprod);
                $rowprod = mysqli_fetch_array($resultprod);
                $countprod = mysqli_num_rows($resultprod);
                if ($countprod == 1){ 
            
                echo "<tr>";
                $counter += 1;
                echo "<td>" . '<img src="data:image;base64,' .base64_encode($rowprod['Product_Image']) . '" height="80" width="80">' . "</td>";                echo "<td>" . $rowprod['Product_Name'] . "</td>";
                echo "<td>". $rowpurchase['Quantity_Ordered'] . "</td>";         
                echo "<td>" . $rowprod['Unit_Price'] . "</td>";
                echo "<td>";                  
                    $unitprice = $rowprod['Unit_Price'];
                    $quantity = $rowpurchase['Quantity_Ordered'];
                    $subtotal = $unitprice * $quantity;
                    echo $subtotal;
                echo "</td>";
                echo "<td><button type=\"submit\" name=\"btnBuyAgain\" id=\"btnBuyAgain\">Buy Again</button></td>";
                echo "</tr>";
                }
            }
            ?>
        </table>
        </form>
    </div>
<?php
    mysqli_close($connection); 
?>    
</body>
</html>

               
