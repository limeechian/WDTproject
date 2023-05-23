<?php
session_start();
include 'Header.php';
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

        .title{
            margin: 0% 2%;
        }

        #AllCompany form{
            margin: 0px 20px;
        }
        
        #AllCompany table tr th{
            text-align: center;
            border: 1px solid black;
            border-collapse: collapse;
        } 
    </style>
</head>
<body>
    <div id="AllCompany">
        <h4 class="title">Search and Display by Company Name</h4><br>
        <form action="#" method="POST">
        Enter Company Name: <input type="text" name= "txtCompany">
                <input type="submit" value="Search" name="btnSearch">
        </form>
        <hr>
        <?php
            if (isset($_POST['btnSearch'])){
                $CompName = $_POST['txtCompany'];
                $query = "SELECT * FROM company WHERE Company_Name='$CompName'";
                $results = mysqli_query($connection, $query); 
            }
            else {
                $query = "SELECT * FROM company";
                $results = mysqli_query($connection, $query); 
            }
        ?>
        <table>
            <tr>
                <th>CompanyName</th>
                <th>Company Phone Number</th>
                <th>Company Email</th>
                <th>Option</th>
            </tr>

            <?php
            while ($row = mysqli_fetch_assoc($results)){
            ?>
            <tr>
                <th><?php echo $row['Company_Name']; ?></th>
                <th><?php echo $row['Company_Phone_Number']; ?></th>
                <th><?php echo $row['Company_Email']; ?></th>
                <th>
                    <a href="Comp List Prod.php?companyID=<?php echo $row['Company_ID']; ?>">View</a>
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


