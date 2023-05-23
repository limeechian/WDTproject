<?php
include 'Header.php';

if (isset($_POST['btnPay'])){
        echo "<script>";
        echo "alert('Payment Successfully');";
        echo "window.location = 'index.php';";
        echo "</script>";
    }   
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Page</title>
    <style>
    #header{
        height: 100px;
        width:100%;
        margin:0 auto; 
        padding-top: 10px ;
        padding-left: 0px;
        margin-left: 0 auto;
        background-color: #c2d6b4;
    }
    img {
        float: left;
        height: 75px;
        width: 75px;
        border-radius: 50%;
        margin-top: 7px;
        margin-left: 10px;
        }
    /* #content1,#content2,#content3,#content4{
        background-color: bisque;
        padding: 3px;
    } */
    #wrapper{
        background-color: beige;
    }
    p {
        padding-left: 10px;
    }
    </style>
</head>
<body id="top">
    <div id="wrapper">

        <div id="content1">
            <p>
                <b>Delivery Address</b><br><br>
                11,Jalan TKK 2/4B, Taman Puncak Kinrara, 47100 Puchong, Selangor <br><br>
                <button type="button">Edit</button>
            </p>
            <hr>
        </div>
        <div id="content2" >
            <table border="0" width="100%" cellpadding="0" cellspacing="0">
                <tr>
                    <th><p><b>Product Name</b></p></th>
                    <th><p><b>Quantity</b></p></th>
                    <th><p><b>Price</b></p></th>
                </tr>
                <tr>
                    <th><p>Tomato</p></th>
                    <th><p>2</p></th>
                    <th>
                        <p><b>Unit Price: </b>RM10 <br></p>
                        <p><b>Shipping Fee: </b>RM0 <br></p>
                        <p><b>Subtotal: </b>RM10 <br></p>
                    </th>
                </tr>
            </table>
            <hr>
        </div>
        <div id="content3">
            <p><b>Payment Method</b></p>
            <button type="button">Card</button>
            <button type="button">Online Transfer</button>
            <button type="button">E-wallet</button>
            <button type="button">Add</button>
            <hr>
        </div>
        <div id="content4">
            <p><b>Shipping Fee: </b>RM0 <br></p>
            <p><b>Subtotal: </b>RM10 <br></p>
            <form action="#" method="post">
                <input type="submit" value="Pay" name="btnPay">
            <!-- <button><a href="index.php">Pay</a></button> -->
            <hr></form>
            <a href="#top">Top</a>
            <hr>
        </div>
</div>
</body>
</html>