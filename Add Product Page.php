<?php
session_start();
include 'Header.php';
// include 'dbConn.php';


if (isset($_POST['btnAdd'])){
    $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
    $name = $_POST['txtProduct'];
    $description = $_POST['txtDescription'];
    $category = $_POST['Category'];
    $price = $_POST['txtPrice'];
    $stock = $_POST['txtStock'];
    $company = $_POST['CompanyID'];
    $query = "INSERT INTO `product`(`Product_Image`,`Product_Name`, `Product_Description`, `Category_ID`, `Unit_Price`, `Stock`, `Company_ID`) VALUES ('$image', '$name','$description','$category','$price','$stock','$company')";
    if (mysqli_query($connection, $query)){
        echo '<script>alert("Product Added")</script>';
        // header("Location: My Company.php");
    } 
    else {
        echo '<script>alert("Sorry, Something Went Wrong. Please Try Again.")</script>';
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

        #AddProduct{
            height: 250px;
            background-color: rgba(0,0,0,0);
            margin: 10px 0px;
        }

        #AddProduct form{
            margin: 0px 20px;
        }

    </style>


</head>
<body>
    <div id="header">
        <h3 class="title">My Company</h3>
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

    <div id="AddProduct">
        <h3 class="title">Add Product</h3>
        <form action="#" method="POST" enctype="multipart/form-data">
            <table>
                <tr>
                    <td>Company ID : </td>
                    <td>
                        <input type="number" name="CompanyID" value="<?php echo $_SESSION['CompID']; ?>">
                    </td>
                </tr>                  <tr>
                    <td>Product Image : </td>
                    <td>
                        <input type="file" name="image">
                    </td>
                </tr>
                <tr>
                    <td>Product Name : </td>
                    <td>
                        <input type="text" name="txtProduct">
                    </td>
                </tr>
                <tr>
                    <td>Product Description : </td>
                    <td>
                        <input type="text" name="txtDescription">
                    </td>
                </tr>
                <tr>
                    <td>Category : </td>
                    <td>
                        <select name="Category">
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
                    <td>Unit Price (RM) : </td>
                    <td>
                        <input type="text" name="txtPrice">
                    </td>
                </tr>
                <tr>
                    <td>Stock : </td>
                    <td>
                        <input type="text" name="txtStock">
                    </td>
                </tr>
            </table>
            <input id="btnAdd" type="submit" value="Add Product" name="btnAdd">
        </form>
    </div>

                <?php
                
                mysqli_close($connection);
                ?>

            </table>
</body>
</html>





