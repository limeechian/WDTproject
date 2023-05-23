<?php
include 'dbConn.php';
$productID=$_GET['productID'];
$query = "DELETE FROM product WHERE Product_ID='$productID'";
if(mysqli_query($connection, $query)){
    mysqli_close($connection);
    echo "<script>";
    echo "alert('Product Deleted Successfully');";
    echo "window.location = 'Product List.php';";
    echo "</script>";
}
else{
    echo '<script>alert("Sorry, Something Went Wrong. Please Try Again")</script>';
    mysqli_close($connection);
}
?>