<?php
require_once('header.php');
require_once('connect.php');

//khi nao an nut dang ky moi bat dau thao tac
//   if(isset($_POST['btnLogin'])){
// $username = $_POST['username'];
// $password = $_POST['password'];
// $hometown = $_POST['Hometown'];

// su dung PDO de su dung cau truy van Select
$sql = "SELECT * FROM `product`";
// 2 dau ? tuong ung voi so cot o tren

$c = new Connect();
$dblink = $c->connectToMySQL();
// $re = $dblink->prepare($sql);
// $valueArray = ["$username", "$password"];
// $stmt = $re->execute($valueArray);


$re = $dblink->query($sql);

if ($re->num_rows > 0) {
?>
  <div class="container">
    <div class="row justify-content-center">
    <h2>All Product</h2>
    <!-- thêm css all product -->
      <?php
      while ($row = $re->fetch_assoc()) {
      ?>
        <div class="col-md-4">
          <link rel="stylesheet" href="./css/style.css">
          <div class="card h-100 shadow-sm">
            <a href="detail.php?id=<?=$row['pid']?>">
              <img src="./Images/<?= $row['pimage'] ?>" class="card-img-top" alt="product.title" />
            </a>

            <!-- <div class="label-top shadow-sm">
              <a class="text-white" href="detail.php">Toys</a>
            </div> -->
            <div class="card-body">
              <div class="clearfix mb-3">
                <span class="float-start badge rounded-pill bg-success">
                  <?= $row['pprice'] ?>&#36;
                </span>

                <!-- <span class="float-end"><a href="#" class="small text-muted text-uppercase aff-link">reviews</a></span> -->
              </div>
              <h5 class="card-title">
                <a target="_blank" href="detail.php?id=<?= $row['pid'] ?>">
                  <?= $row['pname'] ?>
                </a>
              </h5>

              <div class="d-grid gap-2 my-4">
                <!-- ?id truyen theo phuong thuc get -->
                <a href="cart.php?id=<?= $row['pid'] ?>" class="btn btn-warning bold-btn">add to cart</a>

              </div>
              <div class="clearfix mb-1">

                <span class="float-start"><a href="#"><i class="fas fa-question-circle"></i></a></span>

                <span class="float-end">
                  <i class="far fa-heart" style="cursor: pointer"></i>

                </span>
              </div>
            </div>
          </div>
        </div>


      <?php
      }

      ?>

    <?php
  } else {
    echo "Not Found";
  }


    ?>