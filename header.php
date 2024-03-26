<!DOCTYPE html>
<html>

<head>
  <title>BestToyForKids</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
</head>

<body>
<body style="background-color: #BFABDC;">
  <!--navbar-->
  <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
    <div class="container-fluid">
      <!-- Logo --> 
      <a href="index.php" class="navbar-brand">
        <img src="./Images/toys-shop-for-kid-logo.png" alt="" width="50px">
      </a>
      <!-- button toggler-->
      <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navmenu">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navmenu">
        <!-- left -->
        <div class="navbar-nav">
          <a href="cart.php" class="nav-link">Cart</a>
          <a href="allproducts.php" class="nav-link">All Product</a>
          <a href="addproduct.php" class="nav-link">Add Product</a>
          <div class="dropdown">
            <a href="allproducts.php" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Categories</a>
            <div class="dropdown-menu">
              <a href="cat.php?id=C001" class="dropdown-item">Car Toys</a>
              <a href="cat.php?id=C002" class="dropdown-item">Plane Toys</a>
              <a href="cat.php?id=C003" class="dropdown-item">Ship Toys</a>
            </div>
          </div>
        </div>
        <!-- right-->
        <?php
        if (isset($_COOKIE['cc_usr'])) {
        ?>
          <div class="navbar-nav ms-auto">
            <a href="register.php" class="nav-link">Welcome, <?= $_COOKIE['cc_usr'] ?></a>
            <a href="logout.php" class="nav-link">Logout</a>
          </div>
        <?php
        } else {
        ?>
          <div class="navbar-nav ms-auto">
            <a href="register.php" class="nav-link">Register</a>
            <a href="login.php" class="nav-link">Login</a>
          </div>
        <?php
        }
        ?>
      </div>
    </div>
    </div>
    </div>
  </nav>