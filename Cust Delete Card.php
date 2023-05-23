<?php
include 'dbConn.php';
$cardID=$_GET['cardID'];
$query = "DELETE FROM card WHERE Card_ID='$cardID'";
if(mysqli_query($connection, $query)){
    mysqli_close($connection);
    echo '<script>alert("Card Deleted Successfully")</script>';
    header("Location: My Account.php.php");
}
else{
    echo '<script>alert("Sorry, Something Went Wrong. Please Try Again")</script>';
    mysqli_close($connection);
}
?>