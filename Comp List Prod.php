<?php
session_start();
include 'Header.php';
$companyID=$_GET['companyID'];
$query = "SELECT * FROM customer ";
$result = mysqli_query($connection, $query);
$row = mysqli_fetch_array($result); //$row[0]; $row['email']
$count = mysqli_num_rows($result); //1 or 0



if (isset($_POST['btnSearch'])){
    $Category = $_POST['Category'];
    $query = "SELECT * FROM product 
    INNER JOIN category ON product.Category_ID=category.Category_ID 
    INNER JOIN company ON product.Company_ID=company.Company_ID
    WHERE category.Category_ID='$Category' AND company.Company_ID='$companyID'";
    $results = mysqli_query($connection, $query); 
}
else {
    $compname = "SELECT * FROM product 
    INNER JOIN company ON product.Company_ID=company.Company_ID
    INNER JOIN category ON product.Category_ID=category.Category_ID
    WHERE company.Company_ID='$companyID'";
    $results = mysqli_query($connection, $compname);
}

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
        

        .title{
            margin: 0% 2%;
        }

        #AllProduct{
            height: auto;
        }

        #AllProduct form input{
            margin: 0px 10px;
        }

        #AllProduct table{
            width:100%;
        }

        #AllProduct table tr th{
            text-align: center;
            border: 1px solid black;
            border-collapse: collapse;        
        }

    </style>


</head>
<body>


    <div id="MyStore">

    <div id="AllProduct">
        <h2 class="title">Selling Product</h2><br>
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
        
        <table border=1>
            <tr>
                <th>Product ID</th>
                <th>Product Image</th>
                <th>Product Name</th>
                <th>Product Description</th>
                <th>Category</th>
                <th>Unit Price (RM)</th>
                <th>Stock</th>
                <th>Company ID</th>
                <th align="center">Option</th>

            </tr>

            <?php
            while ($row = mysqli_fetch_assoc($results)){
            ?>
                <tr>
                    <th><?php echo $row['Product_ID']; ?></th>
                    <th><?php echo '<img src="data:image;base64,' .base64_encode($row['Product_Image']).'" height="100" width="100">';?></th>
                    <th><?php echo $row['Product_Name']; ?></th>
                    <th><?php echo $row['Product_Description']; ?></th>
                    <th><?php echo $row['Category_ID']; ?></th>
                    <th><?php echo $row['Unit_Price']; ?></th>
                    <th><?php echo $row['Stock']; ?></th>
                    <th><?php echo $row['Company_ID']; ?></th>
                    <th align="center">
                        <a href="Product Page.php?productID=<?php echo $row['Product_ID']; ?>">View</a>
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


