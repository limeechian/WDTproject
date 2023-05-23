<?php
include 'Header.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Page</title>
    <style>        
    Body {  
        font-family: Calibri, Helvetica, sans-serif;  
        background-color: #c2d6b4;  
        } 


    img {
        float: left;
        height: 75px;
        width: 75px;
        border-radius: 50%;
        /* margin-top: 7px; */
        margin-left: 10px;
        }
    /* #content1,#content2,#content3,#content4{
        background-color: bisque;
        padding: 3px;
    } */
    #wrapper{
        /* background-color: beige; */
    }
    p {
        padding-left: 10px;
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
    </style>
</head>
<body id="top">
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

    <div id="wrapper">
        <div id="content1">
            <p>
                <h1>Orders</h1>
                Search orders: <input type="text" name="" id="">
                <input type="submit" value="Search">
            </p>
            <hr>
        </div>
        <div id="content2">
        <table border="0" width="100%" cellpadding="0" cellspacing="0">
                <tr>
                    <th><h3>Customer Username</h3></th>
                    <th><h3></h3></th>
                    <th><h3></h3></th>
                    <th><h3 align="center">Order id: 999999</h3></th>
                    <th><input type="submit" value="Cancel Order"></th>
                </tr>
        </div>
        <div id="content3" >
                <tr>
                    <th><p><b>Product Name</b></p></th>
                    <th><p><b>Quantity</b></p></th>
                    <th><p><b>Order Total Price</b></p></th>
                    <th><p><b>Shipping status</b></p></th>
                    <th><p><b>Delivery Address</b></p></th>
                </tr>
                <tr>
                    <th><p>Tomato</p></th>
                    <th><p>1</p></th>
                    <th><p>RM10</p></th>
                    <th>
                        <select name="status" id="">
                        <option value="toship">To Ship</option>
                        <option value="shipped">Shipped</option>
                        </select>
                    </th>
                    <th>11,Jalan tkk 2/4b</th>
                </tr>
            </table>
            <hr>
        </div>
        <div id="content4">
        <table border="0" width="100%" cellpadding="0" cellspacing="0">
                <tr>
                    <th><h3>Customer Username</h3></th>
                    <th><h3></h3></th>
                    <th><h3></h3></th>
                    <th><h3 align="center">Order id: 999769</h3></th>
                    <th><input type="submit" value="Cancel Order"></th>
                </tr>
        </div>
        <div id="content5">
                <tr>
                    <th><p><b>Product Name</b></p></th>
                    <th><p><b>Quantity</b></p></th>
                    <th><p><b>Order Total Price</b></p></th>
                    <th><p><b>Shipping status</b></p></th>
                    <th><p><b>Delivery Address</b></p></th>
                </tr>
                <tr>
                    <th><p>Cucumber</p></th>
                    <th><p>1</p></th>
                    <th><p>RM3</p></th>
                    <th>
                        <select name="status" id="">
                        <option value="toship">To Ship</option>
                        <option value="shipped">Shipped</option>
                        </select>
                    </th>
                    <th>11,Jalan tkk 2/4b</th>
                </tr>
            </table>
        </div>
</div>
</body>
</html>