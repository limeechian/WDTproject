<?php
session_start();
include 'dbConn.php';

if(isset($_POST['btnLogin'])){
    $Email = $_POST['InputEmail'];
    $Password = $_POST['InputPassword'];

    $query = "SELECT * FROM customer WHERE Customer_Email='$Email' AND Customer_Password='$Password'";
    $result = mysqli_query($connection, $query);
    $row = mysqli_fetch_array($result); //$row[0]; $row['email']
    $count = mysqli_num_rows($result); //1 or 0

    $querycomp = "SELECT * FROM company WHERE Company_Email='$Email' AND Company_Password='$Password'";
    $resultcomp = mysqli_query($connection, $querycomp);
    $rowcomp = mysqli_fetch_array($resultcomp); //$row[0]; $row['email']   
    $countcomp = mysqli_num_rows($resultcomp); //1 or 0

    if ($count ==1)
    {
        echo 'Record Found';
        $_SESSION['CustID'] = $row['Customer_ID'];
        $_SESSION['Email'] = $row['Customer_Email'];
        $_SESSION['CustName'] = $row['Customer_Name'];

        header("Location: index.php");
    }
    else if ($countcomp == 1 ){
     
            $_SESSION['CompID'] = $rowcomp['Company_ID'];
            $_SESSION['CompEmail'] = $rowcomp['Company_Email'];
            $_SESSION['CompName'] = $rowcomp['Company_Name'];

            header("Location: Seller Profile Page.php");
        }
    else {
        echo '<script>alert("Invalid Email or Password!")</script>';
    }
}


mysqli_close($connection)
?>

<!DOCTYPE html>   
<html>   
<head>  
<meta name="viewport" content="width=device-width, initial-scale=1">  
<title> Login Page </title>  
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
    <center> <h1> Welcome to Organic2U. Please Login Your Account. </h1> </center>   
    <form action="#" method="post">  
        <div class="container">  
        <a href="index.php"><button type="button" value="Back" >Back</button><br></a>
            <h2>Please Enter Your Account</h2>
                Email Address: <br>  
                <input type="email" placeholder="Please Enter Your Email Address" name="InputEmail" required> <br> 
                Password : <br>
                <input type="password" placeholder="Enter Your Password" name="InputPassword" required> <br/>
                <a href="ForgotPass.php">Forgot password? </a>  
                <div class="loginbtn"></div>
                    <a href="index.php"><button type="button" value="Cancel">Cancel</button></a>  
                    <button type="submit" value="Login" name="btnLogin">Login</button><br>
            <p>Sign Up As Customer <a href="Customer Signup.php">Register Now</a></p>
            <p>Sign Up As Seller <a href="Company Signup.php">Register Now</a></p>   
        </div>
    </form>     
</body>     
</html>  