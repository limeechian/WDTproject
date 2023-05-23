<?php
session_start();
include 'dbConn.php';
include 'Header.php';


if(isset($_POST['btnSave'])){
    $ID = $_SESSION['CustID'];
    $_SESSION['CustName'] = $row['Customer_Name'];
    $_SESSION['CustPhone'] = $row['Customer_Phone_Number'];
    $Address = $_POST['Address'];
    $saveQuery = "UPDATE `customer` SET `Customer_Address1`='$Address' WHERE `Customer_ID` = $ID";
    if(mysqli_query($connection, $saveQuery)){
        echo '<script>alert("Address Added")</script>';
        // header("location: My Account.php");
    } else {
        echo '<script>alert("Sorry, Something Went Wrong. Please Try Again.")</script>';
    }
}

if(isset($_POST['btnDelete'])){
    $updateQuery = "UPDATE `customer` SET `Customer_Address1`='NULL' WHERE `Customer_ID` =" . $_SESSION['CustID'];
    if(mysqli_query($connection, $updateQuery)){
        echo '<script>alert("Address Deleted")</script>';
    } else {
        echo '<script>alert("Sorry, Something Went Wrong. Please Try Delete Again.")</script>';
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>addAddress</title>
       
    <style>
        .container {
        background-color: #2c4a24; /* #496e3f  #C2D6B4  #bddec0 #769e6c */
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 20px;
        height: 100vh;
        }   

        #formHere {
            background-color: #769e6c; 
            display: flex;
            flex-direction: column;
            padding: 2vw 4vw;
            width: 60%;
            max-width: 600px;
            border-radius: 10px;
        }
        #formHere h1 {
            font-weight: bold;
            text-align: center;
            color: #2A2E30;
            margin-bottom: 20px;
            margin-top: auto;
        }
        #formHere p {
            text-align: center;
            color: #2A2E30;
            margin-top: -5px;
            margin-bottom: -5px;
        }
        #formHere h2 {
            font-weight: bold;
            text-align: left;
            color: #2A2E30;
            margin-bottom: 5px;
        }
        #formHere input {
            border: 0;
            margin: 10px 0px;
            padding: 15px;
            outline-color: transparent;
            background-color: #C2D6B4;
            font-size: 15px;
            border-radius: 10px;
            resize: none;
        }
        #formHere select {
            border: 0;
            margin: 10px 0px;
            padding: 15px;
            outline-color: transparent;
            background-color: #C2D6B4;
            font-size: 15px;
            border-radius: 10px;
            resize: none;
        }

        #buttonHere {
            background: #EDFFCC;
            color: saddlebrown;
            border: 1px solid ghostwhite;
            padding: 15px;
            font-size: 1rem;
            font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
            outline-color: transparent;
            cursor: pointer;
            width: 100%;
            font-weight: bold;
            margin: 20px auto 0;
            border-radius: 30px;
            transition: all .5s ease-in;
        }
        #buttonHere:hover {
            border: 1px solid ghostwhite;
            font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
            background: saddlebrown;
            color: #EDFFCC;
        }
        #wrapper {
            width: 1000px;
            margin: 0 auto;
        }
        #content1 {
            color: #2A2E30;
            font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
        }

        td, th {
            font-size: 15px;
        }
        Body {
            font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
            background-color: #c2d6b4;  
        }

        #MyAccount{
            top: 0%;
            left: 0%;
            overflow: hidden;
            width: 100%;
            margin: 10px 0px;
        }
        #header{
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
            margin: 0% 2%;
        }
        input[type="text"] {
            width: 450px;
            /* height: 25px;
            border-radius: 5px; */
        }
        .container {
            background-color: #2c4a24; /* #496e3f  #C2D6B4  #bddec0 #769e6c */
            /* display: flex;
            justify-content: center;
            align-items: center; */
            /* padding: 20px;
            height: 100vh;
            margin: 0px 10px; */
        }   

#MyAccount form {
    background-color: #769e6c; 
    display: flex;
    flex-direction: column;
    padding: 2vw 4vw;
    width: 60%;
    max-width: 600px;
    border-radius: 10px;
    margin: 0px 10px
}
#MyAccount form h1 {
    font-weight: bold;
    text-align: center;
    color: #2A2E30;
    margin-bottom: 20px;
    margin-top: auto;
}
#MyAccount form p {
    text-align: center;
    color: #2A2E30;
    margin-top: -5px;
    margin-bottom: -5px;
}
#MyAccount form h2 {
    font-weight: bold;
    text-align: left;
    color: #2A2E30;
    margin-bottom: 5px;
}
#MyAccount form input {
    border: 0;
    margin: 10px 0px;
    padding: 15px;
    outline-color: transparent;
    background-color: #C2D6B4;
    font-size: 15px;
    border-radius: 10px;
    resize: none;
    width: 300px
}
#MyAccount form select {
    border: 0;
    margin: 10px 0px;
    padding: 15px;
    outline-color: transparent;
    background-color: #C2D6B4;
    font-size: 15px;
    border-radius: 10px;
    resize: none;
}

#MyAccount form button {
    background: #EDFFCC;
    color: saddlebrown;
    border: 1px solid ghostwhite;
    padding: 15px;
    font-size: 1rem;
    font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
    outline-color: transparent;
    cursor: pointer;
    width: 100%;
    font-weight: bold;
    margin: 20px auto 0;
    border-radius: 30px;
    transition: all .5s ease-in;
}
#MyAccount form button:hover {
    border: 1px solid ghostwhite;
    font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
    background: saddlebrown;
    color: #EDFFCC;
}

#content1 {
    color: #2A2E30;
    font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
}

td, th {
    font-size: 15px;
}    </style>
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

    <div id="MyAccount">
        <form action="#" method="post" id="formHere"> 
        <?php 
        $ID = $_SESSION['CustID'];
        $query = "SELECT * FROM `customer` WHERE `Customer_ID` = $ID";
        $result = mysqli_query($connection, $query);
        $row = mysqli_fetch_array($result);
        $count = mysqli_num_rows($result);
        if ($count == 1) {

        ?>
        <h1>Add / Edit Address</h1>
        <p>Your address details are protected</p>
        <h2><hr>Address Details</h2>
        <br>
        <table>
            <tr>
                <td>Name on Address: </td>
                <td>
                <input type="text" name="NameonAddress" id="content1" value="<?php echo $ID;?>" />
                </td>
            </tr>
            <tr>
                <td>Phone Number: </td>
                <td> 
                <input type="text" name="Phone" id="content1" value="<?php echo $row['Customer_Phone_Number'];?>" />            
                </td>         
            </tr>
            <tr>
                <td>Address: </td>
                <td> 
                <input type="text" name="Address" id="content1" placeholder="Enter address"/>                    
                </td>         
            </tr>
        </table>
        <button type="submit" id="buttonHere" name="btnSave" value="Save">Save</button>
        <button type="reset" id="buttonHere" name="btnReset" value="Reset">Reset</button>
        <button type="delete" id="buttonHere" name="btnDelete" value="- Delete">- Delete</button>
        </table>
        </form> 
    </div>
  
<?php
        }
?>

</body>
</html>