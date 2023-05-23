<?php
session_start();
include 'dbConn.php';

if(isset($_POST ['ChangePass'])){
    $CustEmail = $_POST['InputCustomerEmail'];
    $query = "SELECT * FROM customer WHERE Customer_Email='$CustEmail'";
    $result = mysqli_query($connection, $query);
    $row = mysqli_fetch_assoc($result); //$row[0]; $row['email']
    $count = mysqli_num_rows($result); //1 or 0

    if ($count ==1){
        $_SESSION['CustID'] = $row['Customer_ID'];

        $CustNewPass = $_POST['ConfirmPass'];
        $updateQuery = "UPDATE `customer` SET `Customer_Password`='$CustNewPass' WHERE Customer_ID=" . $_SESSION['CustID'];
    
        if (mysqli_query($connection, $updateQuery)){
            echo "<script>";
            echo "alert('Password Has Been Changed');";
            echo "window.location = 'Login.php';";
            echo "</script>";
        }
    }
    else {
        echo '<script>alert("Email Not Found! Please Try Again")</script>';
        header("Location: ForgotPass.php");
    }
}


mysqli_close($connection)
?>

<!DOCTYPE html>   
<html>   
<head>  
<meta name="viewport" content="width=device-width, initial-scale=1">  
<title> Forgot Password Page </title>  
<style>   
    Body {  
    font-family: Calibri, Helvetica, sans-serif;  
    background-color: #c2d6b4;  
    }  
    button {   
        background-color: #6b7b5c; 
        height: 50px;  
        width: 100px;  
            color: rgb(0, 0, 0);   
            padding: 15px;   
            margin: 20px 10px;   
            border: none;   
            cursor: pointer;   
            }   
    form {   
            border: 3px solid #f1f1f1;   
        }   
    input[type=email], input[type=password] {   
            width: 100%;   
            margin: 8px 0;  
            padding: 12px 20px;   
            display: inline-block;   
            border: thick green;   
            box-sizing: border-box;   
        }  
    button:hover {   
            opacity: 0.7;   
        }   
    .cancel {   
            width: 100px;   
            padding: 10px 18px;  
            margin: 10px 5px;  
        }    
    .container {   
            padding: 25px; 
            /* height: 200px;   */
            background-color: lightblue;  
        }   
</style>   
</head>    
<body>    
    <center> <h1> Forgot Password </h1> </center>  
    <form action="#" method="post">  
        <div class="container">  
            <h2>Please Enter Your Account You Wish To Reset Password</h2>
                Email Address: <br>  
                <input type="email" placeholder="Please Enter Your Email Address" name="InputCustomerEmail" required> <br> 
                New Password : <br>
                <input type="password" placeholder="Enter Your Password" name="ConfirmPass" required> <br/>
                <a href="Login.php"><button type="button" value="Cancel">Cancel</button></a>  
                <button type="submit" value="Login" name="ChangePass">Update</button><br>
        </div>
    </form>     
</body>     
</html>  