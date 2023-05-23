<?php
session_start();
include 'Header.php';


if (isset($_POST['btnAdd'])){
    $CustID = $_POST['CustomerID'];
    $Name = $_POST['NameonCard'];
    $CardNO = $_POST['CardNumber'];
    $Type = $_POST['CardType'];
    $Date = $_POST['ExpDate'];
    $query = "INSERT INTO `card`(`Customer_ID`, `Name_on_Card`, `Card_Number`, `Card_Type`, `Expiry_Date`) VALUES ('$CustID','$Name','$CardNO','$Type','$Date')";
    if (mysqli_query($connection, $query)){
        echo '<script>alert("Card Added")</script>';
        header("Location: My Account.php");
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

        #AddCard{
            height: 250px;
            background-color: rgba(0,0,0,0);
            margin: 10px 0px;
        }

        #AddCard form{
            margin: 0px 20px;
        }

    </style>


</head>
<body>
<div id="header">
        <h3 class="title">My Account</h3>
        <div id="bar">
            <ul>
                <li><a href="My Account.php">My Profile</a></li>
                <li> | </li>
                <li><a href="Cust Add Card.php">Add Card</a></li>
                <li> | </li>
                <li><a href="Cust Card List.php">Card List</a></li>
                <li> | </li>
                <li><a href="Cust Add Address.php">Add Address</a></li>
            </ul>
        </div>
    </div>

    <div id="AddCard">
        <h3 class="title">Add Card</h3>
        <form action="#" method="POST">
        <table>
            <tr>
                <td>Customer_ID: </td>
                <td>
                <input type="number" name="CustomerID" value="<?php echo $_SESSION['CustID']; ?>">      
                </td>
            </tr>
            <tr>
                <td>Name on Card: </td>
                <td>
                <input type="text" name="NameonCard">      
                </td>
            </tr>
            <tr>
                <td>Card Number: </td>
                <td>
                    <input type="number" name="CardNumber">
                </td>
            </tr>
            <tr>
                <td>Card Type: </td>
                <td>
                    <select name="CardType">
                            <option value="CreditCard">Credit Card</option>
                            <option value="DebitCard">Debit Card</option>
                </td>
            </tr>
            <tr>
                <td>Expiry Date: </td>
                <td>
                    <input type="date" name="ExpDate">
                </td>
            </tr>
        </table>
            <input id="btnAdd" type="submit" value="Add Card" name="btnAdd">
        </form>
    </div>

                <?php
                
                mysqli_close($connection);
                ?>

            </table>
</body>
</html>





