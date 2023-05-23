<?php
session_start();
include 'header.php';
$query = "SELECT * FROM card WHERE " . $_SESSION["CustID"];
$results = mysqli_query($connection, $query); 
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

        #AllCard{
            height: auto;
            background-color: rgba(0,0,0,0);           
            margin: 10px 0px;
        }

        #AllCard table{
            width: 100%;
        }

        #AllCard table tr th{
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



    <div id="AllCard">
        <h3 class="title">My Card</h3><br>
        <table>
            <tr>
                <th>Customer ID</th>
                <th>Name on Card</th>
                <th>Card Number</th>
                <th>Card Type</th>
                <th>Expiry Date</th>
                <th>Option</th>
            </tr>

            <?php
            while ($row = mysqli_fetch_assoc($results)){
            ?>
            <tr>
                <th><?php echo $row['Customer_ID']; ?></th>
                <th><?php echo $row['Name_on_Card']; ?></th>
                <th><?php echo $row['Card_Number']; ?></th>
                <th><?php echo $row['Card_Type']; ?></th>
                <th><?php echo $row['Expiry_Date']; ?></th>
                <th>
                    <a href="Cust Edit Card.php?cardID=<?php echo $row['Card_ID']; ?>">Edit</a>
                    <br>
                    <a href="Cust Delete Card.php?cardID=<?php echo $row['Card_ID']; ?>">Delete</a>
                </th>
            </tr>
    </div>



                <?php
                }
                
                mysqli_close($connection);
                ?>

            </table>

</body>
</html>


