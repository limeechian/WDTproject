<?php
include 'dbConn.php';

if(isset($_POST['btnSignUp'])) {
    $username = $_POST['txtUsername'];
    $email = $_POST['txtEmail'];
    $phone = $_POST['txtPhone'];
    $password = $_POST['txtPassword'];

    $query = "INSERT INTO `company` (`Company_Name`, `Company_Email`, `Company_Phone_Number`, `Company_Password`) VALUES ('$username', '$email', '$phone', '$password')";

    if (mysqli_query($connection, $query)) {
        echo "<script>";
        echo "alert('Signup Successful');";
        echo "window.location = 'Login.php';";
        echo "</script>";
    } else {
        echo '<script>alert("Sorry, something went wrong. Please try again.")</script>';
    }

mysqli_close($connection);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
    
    <style>
        Body {  
        background-color: #c2d6b4;  
        } 

        .container {
            background-color: #2c4a24; /* #496e3f  #C2D6B4  #bddec0 #769e6c */
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
            height: 100vh;
        }   

        form {
            background-color: #769e6c; 
            display: flex;
            flex-direction: column;
            padding: 2vw 4vw;
            width: 60%;
            max-width: 600px;
            border-radius: 10px;
            /* align-items: center; */
        }
        form h1 {
            font-weight: bold;
            text-align: center;
            color: #2A2E30;
            margin-bottom: 20px;
            margin-top: auto;
        }
        form p {
            text-align: center;
            color: #2A2E30;
            margin-top: -5px;
            margin-bottom: -5px;
        }
    
        form input {
            border: 0;
            margin: 10px 0px;
            padding: 15px;
            outline-color: transparent;  /*outline: none;*/
            background-color: #C2D6B4;
            font-size: 15px;
            border-radius: 15px;
            resize: none;
        } 
        form select {
            border: 0;
            margin: 10px 0px;
            padding: 15px;
            outline-color: transparent;
            background-color: #C2D6B4;
            font-size: 15px;
            border-radius: 10px;
            resize: none;
        }

        form button {
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
        form button:hover {
            border: 1px solid ghostwhite;
            font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
            background: saddlebrown;
            color: #EDFFCC;
        }
        #wrapper {
            width: 800px;
            margin: 0 auto;
        }
        #content1 {
        color: #2A2E30;
        font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
    }
    </style>
</head>
<body>
    <div id="wrapper">
        <form action="#" method="post">
            <!-- <h1>Welcome to Organic2U.</h1> -->
            <h1>Create a New Account as Seller(Company)<hr></h1>
            
            Enter Username: <br>
            <input type="text" name="txtUsername" id="content1" placeholder="Enter Your Username" required>
            Enter Email Address: <br>
            <input type="email" name="txtEmail" id="content1" placeholder="Enter Your Email" required>
            Enter Phone Number: <br>
            <input type="text" name="txtPhone" id="content1" placeholder="Enter Your Phone Number" required>
            Enter Password: <br>
            <input type="password" name="txtPassword" id="content1" placeholder="Enter Your Password" required>
        
            <button type="submit" name="btnSignUp" value="Sign-up">Sign-up</button>
            <a href="Login.php"><button type="button" name="btnReset" value="Cancel">Cancel</button></a>
            <br><br>
            <p>I already have an account. Please click <a href="Login.php">here</a> to login.</p>
        </form>
    </div>
    
</body>
</html>