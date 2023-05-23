<?php
session_start();
// include 'dbConn.php';
include 'Header.php';
$cardID=$_GET['cardID'];


if (isset($_POST['btnUpdate'])){
    $CustID = $_POST['CustomerID'];
    $Name = $_POST['NameonCard'];
    $CardNO = $_POST['CardNumber'];
    $Type = $_POST['CardType'];
    $Date = $_POST['ExpDate'];
    $updateQuery = "UPDATE `card` SET `Customer_ID`='$CustID',`Name_on_Card`='$Name',`Card_Number`='$CardNO',`Card_Type`='$Type',`Expiry_Date`='$Date' WHERE Card_ID='$cardID'";
    if (mysqli_query($connection, $updateQuery)){
        // header('Location: Cust Card List.php');
        echo '<script>alert("Card Updated")</script>';
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

        #EditBanksandCards{
            height: 300px;
            margin: 10px 0px;
        }

        #EditBanksandCards table{
            margin: 0px 50px;
        }

        #EditBanksandCards table tr th{
            text-align: center;
            border: 1px solid black;
            border-collapse: collapse;
        } 

        #btn, #EditBanksandCards p{
            margin: 10px 50px;
        }

        .title{
            margin: 1% 2%;
        }
    </style>


</head>
<body>


        <div id="EditBanksandCards">
            <h3 class="title">Edit Banks and Cards</h3>

            <?php
                $query = "SELECT * FROM card WHERE Card_ID='$cardID'";
                $result = mysqli_query($connection, $query);
                $row = mysqli_fetch_assoc($result); //$row[0]; $row['email']
                $count = mysqli_num_rows($result); //1 or 0
                if ($count ==1){
            ?>
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

                <br>
            <form action="#" method="POST">
                <table>
                    <tr>
                        <th>Customer_ID: </th>
                        <th>
                        <input type="number" name="CustomerID" value="<?php echo $_SESSION['CustID']; ?>">                              
                        </th>
                    </tr>
                    <tr>
                        <th>Name on Card: </th>
                        <th>
                        <input type="text" name="NameonCard" value="<?php echo $row['Name_on_Card']; ?>">      
                        </th>
                    </tr>
                    <tr>
                        <th>Card Number: </th>
                        <th>
                        <input type="number" name="CardNumber" value="<?php echo $row['Card_Number']; ?>">      
                        </th>
                    </tr>
                    <tr>
                        <th>Card Type: </th>
                        <th>
                            <select name="CardType">
                                    <option value="<?php echo $row['Card_Type']; ?>"><?php echo $row['Card_Type']; ?>"</option>
                                    <option value="CreditCard">Credit Card</option>
                                    <option value="DebitCard">Debit Card</option>
                        </th>
                    </tr>
                    <tr>
                        <th>Expiry Date: </th>
                        <th>
                            <input type="date" name="ExpDate" value="<?php echo $row['Expiry_Date']; ?>">
                        </th>
                    </tr>
                    <tr>
                        </table>
                    <input type="button" value="Back" id="btn" onclick="history.go(-1)">
                    <input type="submit" value="Update" name="btnUpdate">
            </form>
            <p>I acknowledge that my card information is saved securely on my Organic4U account and One Time Password (OTP) is not required for future transaction on Organic4U.</p>
        </div>

                <?php
                    }
                    else{
                        echo 'Record Not Found';
                    }
                ?>


</body>
</html>





