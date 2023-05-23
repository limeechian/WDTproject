<?php
session_start();
include 'Header.php';


if(isset($_POST ['btnChange1'])){
    $CompEmail = $_POST['InputCompEmail'];
    $CompPhoneNumber = $_POST['InputCompPhoneNumber'];
    $CompPassword = $_POST['InputCompPassword'];
    $CompAddress1 = $_POST['CompAddress1'];
    $CompAddress2 = $_POST['CompAddress2'];
    $CompAddress3 = $_POST['CompAddress3'];
    $updateQuery = "UPDATE `company` SET `Company_Email`='$CompEmail',`Company_Phone_Number`='$CompPhoneNumber',`Company_Password`='$CompPassword',`Company_Address1`='$CompAddress1',`Company_Address2`='$CompAddress2',`Company_Address3`='$CompAddress3' WHERE Company_ID=" . $_SESSION['CompID'];

    if (mysqli_query($connection, $updateQuery)){
        header("Location: Main Page.php");
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

        #MyCompany{
            height: 300px;
            margin: 10px 0px;
        }

        #MyCompany table{
            margin: 0px 50px;
        }

        #MyCompany table tr th{
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

    <?php
            $query = "SELECT * FROM company WHERE Company_ID=" . $_SESSION["CompID"];
            $result = mysqli_query($connection, $query);
            $row = mysqli_fetch_assoc($result); //$row[0]; $row['email']
            $count = mysqli_num_rows($result); //1 or 0
            if ($count ==1){
            }
        ?>
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

    <div id="MyCompany">
                <h3 class="title">My Company</h3>
                <br>

            <form action="#" method="POST">
                <table border="1">
                    <tr>
                        <th>Company ID: </th>
                        <th>
                            <?php echo $row['Company_ID']; ?>
                        </th>
                    </tr>
                    <tr>
                        <th>Company Name: </th>
                        <th>
                            <?php echo $row['Company_Name']; ?>
                        </th>
                    </tr>
                    <tr>
                        <th>Email: </th>
                        <th>
                            <input type="text" name="InputCompEmail" value="<?php echo $row['Company_Email']; ?>">
                        </th>
                    </tr>
                    <tr>
                        <th>Phone Number: </th>
                        <th>
                            <input type="text" name="InputCompPhoneNumber" value="<?php echo $row['Company_Phone_Number']; ?>">
                        </th>
                    </tr>
                    <tr>
                        <th>Password: </th>
                        <th>
                            <input type="text" name="InputCompPassword" value="<?php echo $row['Company_Password']; ?>">
                        </th>
                    </tr>
                    <tr>
                        <th>Address 1: </th>
                        <th>
                            <input type="text" name="CompAddress1" value="<?php echo $row['Company_Address1']; ?>">
                        </th>
                    </tr>
                    <tr>
                        <th>Address 2: </th>
                        <th>
                            <input type="text" name="CompAddress2" value="<?php echo $row['Company_Address2']; ?>">
                        </th>
                    </tr>
                    <tr>
                        <th>Address 3: </th>
                        <th>
                            <input type="text" name="CompAddress3" value="<?php echo $row['Company_Address3']; ?>">
                        </th>
                    </tr>
                </table>
                <input type="submit" value="Save" id="btnSave" name="btnChange1">
            </form>
        </div>






                <?php
  
                mysqli_close($connection);
                ?>

            </table>

        </div>
    </div>
</body>
</html>


