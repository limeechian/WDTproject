<?php
session_start();
include 'Header.php';
$productID=$_GET['productID'];

if (isset($_POST['btnUpdate'])){
    $name = $_POST['txtProduct'];
    $description = $_POST['txtDescription'];
    $category = $_POST['Category'];
    $price = $_POST['txtPrice'];
    $stock = $_POST['txtStock'];
    $updateQuery = "UPDATE `product` SET `Product_Name`='$name',`Product_Description`='$description',`Category_ID`='$category', `Unit_Price`='$price',`Stock`='$stock' WHERE Product_ID='$productID'";
    if (mysqli_query($connection, $updateQuery)){
        echo "<script>";
        echo "alert('Product Updated Successfully');";
        echo "window.location = 'Product List.php';";
        echo "</script>";
    } 
    else {
        echo 'Sorry, Something Went Wrong. Please Try Again.';
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

    <style>
        Body {  
        font-family: Calibri, Helvetica, sans-serif;  
        background-color: #c2d6b4;  
        }  

        #header{
            /* margin: 162px 0px 10px 0px; */
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

        #editForm{
            height: 300px;
            margin: 10px 0px;
        }

        #editForm table{
            margin: 0px 50px;
        }

        #editForm table tr th{
            text-align: center;
            border: 1px solid black;
            border-collapse: collapse;
        } 

        #btn{
            margin: 10px 50px;
        }

        .title{
            margin: 1% 2%;
        }

    </style>


</head>
<body>
<div id="editForm">
    <h2>Product Information</h2>
    <?php
     $query = "SELECT * FROM product         INNER JOIN category ON product.Category_ID=category.Category_ID 
     INNER JOIN company ON product.Company_ID=company.Company_ID
     WHERE product.Product_ID='$productID'";
     $result = mysqli_query($connection, $query);
     $row = mysqli_fetch_assoc($result); //$row[0]; $row['email']
     $count = mysqli_num_rows($result); //1 or 0
     if ($count ==1){
     ?>

    <form action="#" method="POST">
        <table>
            <tr>
                <td>Product Image : </td>
                <td>
                    <?php echo '<img src="data:image;base64,' .base64_encode($row['Product_Image']).'" height="100" width="100">';?>
                </td>
            </tr>
            <tr>
                <td>ID Company : </td>
                <td>
                    <input type="text" name="CompID" value="<?php echo $row['Company_ID']; ?> ">
                </td>
            </tr>              <tr>
                <td>Product Name : </td>
                <td>
                    <input type="text" name="txtProduct" value="<?php echo $row['Product_Name']; ?> ">
                </td>
            </tr>
            <tr>
                <td>Product Description : </td>
                <td>
                    <input type="text" name="txtDescription"  value="<?php echo $row['Product_Description']; ?> ">
                </td>
            </tr>
            <tr>
                <td>Category : </td>
                <td>
                <select name="Category">
                    <option value="<?php echo $row['Category_ID']; ?>"><?php echo $row['Category_ID']; ?></option>
                    <option value="1">Bean</option>
                    <option value="2">Flower</option>
                    <option value="3">Fruity</option>
                    <option value="4">Leafy</option>
                    <option value="5">Roots</option>
                    <option value="6">Sprout</option>
                    <option value="7">Stem</option>
            </td>
            </tr>
            <tr>
            <tr>
                <td>Unit Price : </td>
                <td>
                    <input type="text" name="txtPrice" value="<?php echo $row['Unit_Price']; ?> ">
                </td>
            </tr>
            <tr>
                <td>Stock : </td>
                <td>
                    <input type="text" name="txtStock" value="<?php echo $row['Stock']; ?> ">
                </td>
            </tr>
 
        </table>
            <a href="Product List.php"><input type="button" value="Back" id="btn" onclick="history.go(-1)"></a>
            <a href="Product List.php"><input type="submit" value="Update" name="btnUpdate"></a>

    </form>
</div>
    <?php
    }
    else{
    echo 'Record Not Found.';
    }
    ?>

</body>
</html>
