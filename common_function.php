<?php
//step 1 - using external link to access database
include 'dbConn.php';

// getting products
function getproducts(){
    global $connection;
    // condition to check isset or not 
    // if the categories and the compony is not set then all datas below will be display 
    if(!isset($_GET['category'])){
        if(!isset($GET['company'])){

      //retrieve database
      $query = "SELECT * FROM `product`";
      //execute query
       $results = mysqli_query($connection,$query);
      //display results
      while ($row = mysqli_fetch_assoc($results)){
        $product_id = $row['Product_ID'];
        $product_image = 'data:image;base64,' .base64_encode($row['Product_Image']);
        $product_name = $row['Product_Name'];
        $product_description = $row['Product_Description'];
        $category_id = $row['Category_ID'];
        $unit_price = $row['Unit_Price'];
        $stock = $row['Stock'];
        $company_id = $row['Company_ID'];
        echo "<div class='col-md-4 mb-2 mt-2'>
        <div class='card'>
        <img src='$product_image' 
        class='card-img-top' 
        alt='$product_name'>
        
          <div class='card-body'>
          <h5 class='card-title'>$product_name</h5>
          <p class='card-text'>$product_description</p>
          <p class='card-text'>Price: RM$unit_price</p>
          <a href='Product Page.php?productID=$product_id' class='btn btn-success'>View Product</a>
          </div>
        </div>
      </div>";  
      }
}
}
}

// getting unique categories 
function get_unique_categories(){
    global $connection;
    // condition to check isset or not 
    if(isset($_GET['category'])){
        $category_id=$_GET['category'];
      //retrieve database
      $query = "SELECT * FROM `product` WHERE category_id = $category_id";
      //execute query
       $results = mysqli_query($connection,$query);
      //display results
      while ($row = mysqli_fetch_assoc($results)){
        $product_id = $row['Product_ID'];
        $product_image = 'data:image;base64,' .base64_encode($row['Product_Image']);
        $product_name = $row['Product_Name'];
        $product_description = $row['Product_Description'];
        $category_id = $row['Category_ID'];
        $unit_price = $row['Unit_Price'];
        $stock = $row['Stock'];
        $company_id = $row['Company_ID'];
        echo "<div class='col-md-4 mb-2 mt-2'>
        <div class='card'>
        <img src='$product_image' 
        class='card-img-top' 
        alt='$product_name'>
          <div class='card-body'>
          <h5 class='card-title'>$product_name</h5>
          <p class='card-text'>$product_description</p>
          <p class='card-text'>Price: RM$unit_price</p>
          <a href='index.php?add_to_cart=$product_id' class='btn btn-success'>View Product</a>
          </div>
        </div>
      </div>";  
      }
}
}

// getting unique company
function get_unique_company(){
    global $connection;
    // condition to check isset or not 
    if(isset($_GET['company'])){
      $company_id=$_GET['company'];
      //retrieve database
      $query = "SELECT * FROM `product` WHERE Company_Id = '$company_id'";
      //execute query
       $results = mysqli_query($connection,$query);
      //display results
      while ($row = mysqli_fetch_assoc($results)){
        $product_id = $row['Product_ID'];
        $product_image = 'data:image;base64,' .base64_encode($row['Product_Image']);
        $product_name = $row['Product_Name'];
        $product_description = $row['Product_Description'];
        $category_id = $row['Category_ID'];
        $unit_price = $row['Unit_Price'];
        $stock = $row['Stock'];
        $company_id = $row['Company_ID'];
        echo "<div class='col-md-4 mb-2 mt-2'>
        <div class='card'>
        <img src='$product_image'  
        class='card-img-top' 
        alt='$product_name'>
          <div class='card-body'>
          <h5 class='card-title'>$product_name</h5>
          <p class='card-text'>$product_description</p>
          <p class='card-text'>Price: RM$unit_price</p>
          <a href='index.php?add_to_cart=$product_id' class='btn btn-success'>View Product</a>
          </div>
        </div>
      </div>";  
      }
}
}



// displaying company in side navigation bar
function getcompany(){
        global $connection;
        //retrieve database
        $query = "SELECT * FROM `company`";
        //execute query
        $results = mysqli_query($connection,$query);
        //display results
        while ($row = mysqli_fetch_assoc($results)){
          $company_name = $row['Company_Name'];
          $company_id = $row['Company_ID'];
          echo "<li class='nav-item'>
          <a href='index.php?company=$company_id' class='nav-link text-light'>$company_name</a>
          </li>";
        }
}
// displaying categories in side navigation bar
function getcategory(){
    global $connection;
    //retrieve database
    $query = "SELECT * FROM `category`";
    //execute query
    $results = mysqli_query($connection,$query);
    //display results
    while ($row = mysqli_fetch_assoc($results)){
      $category_name = $row['Category_Name'];
      $category_id = $row['Category_ID'];
      echo "<li class='nav-item'>
      <a href='index.php?category=$category_id' class='nav-link text-light'>$category_name</a>
      </li>";
    }
}



// searching products function
function search_product(){
    global $connection;
    if(isset($_GET['search_data_product'])){
        $search_data_value = $_GET['search_data'];
      //retrieve database
      $query = "SELECT * FROM `product` WHERE Product_Name LIKE '%$search_data_value%' ";
      //execute query
       $results = mysqli_query($connection,$query);
      //display results
      while ($row = mysqli_fetch_assoc($results)){
        $product_id = $row['Product_ID'];
        $product_image = 'data:image;base64,' .base64_encode($row['Product_Image']);
        $product_name = $row['Product_Name'];
        $product_description = $row['Product_Description'];
        $category_id = $row['Category_ID'];
        $unit_price = $row['Unit_Price'];
        $stock = $row['Stock'];
        $company_id = $row['Company_ID'];
        echo "<div class='col-md-4 mb-2 mt-2'>
        <div class='card'>
        <img src='$product_image' 
        class='card-img-top' 
        alt='$product_name'>
        
          <div class='card-body'>
          <h5 class='card-title'>$product_name</h5>
          <p class='card-text'>$product_description</p>
          <p class='card-text'>Price: RM$unit_price</p>
          <a href='index.php?add_to_cart=$product_id' class='btn btn-success'>View Product</a>
          </div>
        </div>
      </div>";  
      }
    }
}

// get ip address function 
function getIPAddress() {  
    //whether ip is from the share internet  
     if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
                $ip = $_SERVER['HTTP_CLIENT_IP'];  
        }  
    //whether ip is from the proxy  
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
     }  
//whether ip is from the remote address  
    else{  
             $ip = $_SERVER['REMOTE_ADDR'];  
     }  
     return $ip;  
}  
// $ip = getIPAddress();  
// echo 'User Real IP Address - '.$ip;

// View Product function
// function cart(){
// if(isset($GET['add_to_cart'])){
//     global $connection;
//     $get_ip_add = getIPAddress();
//     $get_product_id = $_GET['add_to_cart'];

//     $select_query = "SELECT * FROM `cart` WHERE ip_address='$get_ip_add' and product_id=$get_product_id";
//     $result_query = mysqli_query($connection,$select_query);
//     $num_of_rows = mysqli_num_rows($result_query);
//     if($num_of_rows>0){
//         echo "<script>alert('This item is already present inside the cart')</script>";
//         echo "<script>window.open('index.php','_self')</script>";
//     }else{
//         $insert_query= "INSERT INTO `cart`(`Product_ID`, `ip address`,`Quantity`) VALUES ('['$get_product_id']','['$get_ip_add']','[0]')";
//         $result_query = mysqli_query($connection,$insert_query);
//         echo "<script>alert('This item added to the cart')</script>";
//         echo "<script>window.open('index.php','_self')</script>";
//     }
// }
// }
?>