<?php
session_start();
include 'Header.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        Body {  
        font-family: Calibri, Helvetica, sans-serif;  
        background-color: #c2d6b4;  
        }  

        #header{
            background-color: rgba(0,0,0,0);
            height: 80px;
        }

        #bar{
            margin: 0% 8%;
            padding: 0% 2%;
        }

        #bar ul li{
            display: inline-block;
            padding: 0% 2%;
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
        }

        .title{
            margin: 1% 2%;
        }

        #AllProduct{
            height: auto;
            background-color: rgba(0,0,0,0);           
            margin: 10px 0px;
        }

        #AllProduct table{
            width: 100%;
        }

        #AllProduct table tr th{
            /* width:100%; */
            text-align: center;
            border: 1px solid black;
            border-collapse: collapse;
        } 

    </style>


</head>
<body>
    <div id="header">
        <h3 class="title">My Account</h3>
        <div id="bar">
            <ul>
                <li><a href="Seller Profile Page.php">My Company</a></li>
                <li> | </li>
                <li><a href="Add Product Page.php">Add Product</a></li>
                <li> | </li>
                <li><a href="Product List.php">My Product</a></li>
                <li> | </li>
                <li><a href="order_page.php">Order</a></li>
            </ul>
        </div>
    </div>

    <div id="MyStore">

    <div id="AllProduct">
        <h4 class="title">Search and Display by Category</h4><br>
        <form action="#" method="POST">
        Select Category: 
                <select name="Category">
                    <option value="1">Bean</option>
                    <option value="2">Flower</option>
                    <option value="3">Fruity</option>
                    <option value="4">Leafy</option>
                    <option value="5">Roots</option>
                    <option value="6">Sprout</option>
                    <option value="7">Stem</option>
                <input type="submit" value="Search" name="btnSearch">
        </form>
        <hr>
        <?php
            if (isset($_POST['btnSearch'])){
                $Category = $_POST['Category'];
                $query = "SELECT * FROM product 
                INNER JOIN category ON product.Category_ID=category.Category_ID 
                INNER JOIN company ON product.Company_ID=company.Company_ID
                WHERE category.Category_ID='$Category'";
                $result = mysqli_query($connection, $query); 
            }
            else {
                $querycom = "SELECT * FROM product INNER JOIN category ON product.Category_ID=category.Category_ID WHERE Company_ID=" . $_SESSION["CompID"];
                $result = mysqli_query($connection, $querycom);
                }
        ?>
        <table border=1>
            <tr>
                <th>Product ID</th>
                <th>Product Image</th>
                <th>Product Name</th>
                <th>Product Description</th>
                <th>Category</th>
                <th>Unit Price (RM)</th>
                <th>Stock</th>
                <th align="center">Option</th>

            </tr>

            <?php
            while ($row = mysqli_fetch_assoc($result)){
            ?>
                <tr>
                    <th><?php echo $row['Product_ID']; ?></th>
                    <th><?php echo '<img src="data:image;base64,' .base64_encode($row['Product_Image']).'" height="100" width="100">';?></th>
                    <th><?php echo $row['Product_Name']; ?></th>
                    <th><?php echo $row['Product_Description']; ?></th>
                    <th><?php echo $row['Category_Name']; ?></th>
                    <th><?php echo $row['Unit_Price']; ?></th>
                    <th><?php echo $row['Stock']; ?></th>
                    <th align="center">
                        <a href="editProduct.php?productID=<?php echo $row['Product_ID']; ?>">Edit</a>
                        <br>
                        <a href="deleteProduct.php?productID=<?php echo $row['Product_ID']; ?>">Delete</a>
                    </th>
                </tr>
    </div>



                <?php
                }
                
                mysqli_close($connection);
                ?>

            </table>

        </div>
    </div>
</body>
</html>


