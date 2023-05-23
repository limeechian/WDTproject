<?php
//step 1 - using external link to access database
include 'dbConn.php';
include 'common_function.php';
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Organic2U</title>
  <!-- BOOTSTRAP CSS LINK (for the website appearance)  -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" 
  rel="stylesheet" 
  integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" 
  crossorigin="anonymous">

  <!-- FONT AWESOME LINK (for the icon)  -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" 
  integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" 
  crossorigin="anonymous" referrerpolicy="no-referrer" />

  <!-- css file  -->
  <link rel="stylesheet" href="style.css">

<style>
  .chat-popup {
    display: none;
    position: fixed;
    bottom: 0;
    right: 10px;
    border: 2px solid;
  }

  .Chat-container {
    width: 200px;
    padding: 10px;
    background-color: white;
  }

  .Chat-container textarea {
    width: 180px;
    padding: 15px;
    margin: 5px 0 10px 0;
    border: none;
    background: #f1f1f1;
    height: 120px;
    resize: none;
  }

  .Chat-container textarea:focus {
    background-color: #ddd;
    outline: none;
  }

  .Chat-container .btn {
    background-color: green;
    color: white;
    padding: 15px 20px;
    width: 100%;
    margin-bottom:10px;
  }

  .Chat-container .cancel {
    background-color: red;
  }

  .Chat-container .btn:hover, .open-button:hover {
    opacity: 0.8;
  }
</style>

</head>
<body>
  <!-- NAVIGATION BAR  -->
  <!-- BOOTSTRAP CLASS TO TAKE 100% OF THE WIDTH  -->
  <div class="container-fluid p-0">
    <!-- NAVIGATION BAR  -->
    <nav class="navbar navbar-expand-lg bg-success">
      <div class="container-fluid">
        <!-- COMPANY LOGO  -->
        <img src="Organic2u (1).png" alt="" class="logo">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="Show All Company.php">All Company</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="Show All Product.php">All Products</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#" class="open-button" onclick="openChat()">Chat</a>
            </li>
      </ul>
      <form class="d-flex" role="search" action="search_product.php" method="get">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
        <!-- <button class="btn btn-outline-light" type="submit">Search</button> -->
      <input type="submit" value="Search" class="btn btn-outline-light" name="search_data_product">
      </form>
    </div>
  </div>
</nav>

<div class="chat-popup" id="myChat">
  <form action="#" class="Chat-container" method="GET">
    <h1>Chat</h1>

    <label for="msg"><b>Message</b></label>
    <textarea placeholder="Your message..." name="msg" required></textarea>

    <button type="submit" class="btn" name="btnSend">Send</button>
    <button type="button" class="btn cancel" onclick="closeChat()">Close</button>
  </form>
</div>

<script>
function openChat() {
  document.getElementById("myChat").style.display = "block";
}

function closeChat() {
  document.getElementById("myChat").style.display = "none";
}
</script>

<?php if (isset($_GET['btnSend'])){
        echo '<script>alert("Message Send!")</script>';
}
?>

<!-- WELCOME  -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <ul div class="navbar-nav me-auto">
  <li class="nav-item">
  <?php
          if (!empty($_SESSION['CustID'])){
      ?>
      <li><a class="nav-link" href="My Account.php"><?php echo $_SESSION['CustName']; ?> </a></li>
      <a class="nav-link" href="MyCart.php">My Cart</a>
      <a class="nav-link" href="MyPurchase.php">My Purchase</a>
      <a class="nav-link" href="Logout.php">Logout</a>


      <?php
      } else {    
          echo '<li><a class="nav-link" href="Login.php">Login</a></li>';
      }
    ?>
  </div>
</nav>

<!-- PRODUCTS AND NAVIGATION BAR  -->
<div class="row">
  <div class="col-md-10">
    <!-- PRODUCTS  -->
    <div class="row">
    <!-- fetching products -->
    <?php 
    // calling function 
    search_product();
    getproducts();
    get_unique_categories();
    ?>
<!-- end of row  -->
  </div>
<!-- end of column  -->
</div>


    <!-- SIDE NAVIGATION BAR  -->
  <div class="col-md-2 bg-secondary p-0">

  </ul>
    <!-- DISPLAY ALL CATEGORIES  -->
    <ul class="navbar-nav me-auto text-center">
    <li class="nav-item bg-success">
      <a href="#" class="nav-link text-light"><h5>Categories</h5></a>
    </li>
    <?php
    getcategory();
    ?>
  </ul>
  </div>
</div>

<!-- FOOTER  -->
<div class="bg-success p-3 text-center">
  <p>All rights reserved</p>
</div>
  </div>



<!-- BOOTSTRAP JS LINK  -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" 
crossorigin="anonymous"></script>
</body>
</html>