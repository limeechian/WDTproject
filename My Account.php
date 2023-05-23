<?php
session_start();
include 'Header.php';


if(isset($_POST ['btnSave'])){
    $CustEmail = $_POST['InputCustEmail'];
    $CustPhoneNumber = $_POST['InputCustPhoneNumber'];
    $CustPassword = $_POST['InputCustPassword'];
    $CustAddress1 = $_POST['CustAddress1'];
    $updateQuery = "UPDATE `customer` SET `Customer_Email`='$CustEmail',`Customer_Phone_Number`='$CustPhoneNumber',`Customer_Password`='$CustPassword',`Customer_Address1`='$CustAddress1' WHERE Customer_ID=" . $_SESSION['CustID'];

    if (mysqli_query($connection, $updateQuery)){
        echo '<script>alert("Account Updated")</script>';
    }
    else{
        echo 'Sorry, Something Went Wrong';
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

        #MyProfile{
            height: 300px;
            margin: 10px 0px;
        }

        #MyProfile table{
            margin: 0px 50px;
        }

        #MyProfile table tr th{
            text-align: center;
            border: 1px solid black;
            border-collapse: collapse;
        } 

        #btnSave{
            margin: 10px 50px;
        }

        .title{
            margin: 1% 2%;
        }
    </style>


</head>
<body>
    <div id="MyAccount">
        <?php
            $query = "SELECT * FROM customer WHERE Customer_ID=" . $_SESSION["CustID"];
            $result = mysqli_query($connection, $query);
            $row = mysqli_fetch_assoc($result); //$row[0]; $row['email']
            $count = mysqli_num_rows($result); //1 or 0
            if ($count ==1){
            }
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
            <div id="MyProfile">
                <h3 class="title">My Profile</h3>
                <br>


                <table>
                <form action="#" method="POST">
                    <tr>
                        <th>Username: </th>
                        <th>
                            <?php echo $row['Customer_Name']; ?>
                        </th>
                    </tr>
                    <tr>
                        <th>Email: </th>
                        <th>
                            <input type="text" name="InputCustEmail" value="<?php echo $row['Customer_Email']; ?>">
                        </th>
                    </tr>
                    <tr>
                        <th>Phone Number: </th>
                        <th>
                            <input type="text" name="InputCustPhoneNumber" value="<?php echo $row['Customer_Phone_Number']; ?>">
                        </th>
                    </tr>
                    <tr>
                        <th>Password: </th>
                        <th>
                            <input type="text" name="InputCustPassword" value="<?php echo $row['Customer_Password']; ?>">
                        </th>
                    </tr>
                    <tr>
                        <th>Address 1: </th>
                        <th>
                            <input type="text" name="CustAddress1" value="<?php echo $row['Customer_Address1']; ?>">
                        </th>
                    </tr>
                </table>
                <input type="submit" value="Save" id="btnSave" name="btnSave">
            </form>
        </div>

    
    <?php
    mysqli_close($connection);
    ?>    

    </div>
</body>
</html>


