<?php
require_once('header.php');
require_once('connect.php');
$c = new Connect();
// de han che sql intraction,  
$dblink = $c->connectToPDO();
// dang nhin vao yeu cau, dong nghia nguoi ta muon them san pham vao gio hang, kiem tra bien id
if (isset($_GET['id'])) {
  $pid = $_GET['id'];
  // test xem san pham nay nguoi dung da mua chua
  $findSql = "SELECT `cproid` FROM `cart` WHERE `cproid` = ? AND `cuserid`= ?";


  $re = $dblink->prepare($findSql);
  // lay tu form theo thu tu
  $valueArray = [$pid, 5];
  $stmt = $re->execute($valueArray);
  if ($re->rowCount() == 0)
  // xem thu re co bang 0 hay khong, kiem tra so dong
  {
    $sql = "INSERT INTO `cart`( `cuserid`, `cproid`, `cquantity`, `cdate`) VALUES (?, ?, 1,CURDATE())";
  } else {
    $sql = "UPDATE `cart` SET `cquantity`= `cquantity`+1, `cdate`= CURDATE() WHERE `cuserid` = ? AND `cproid`= ?";
  }
  $re1 = $dblink->prepare($sql);
  // lay tu form theo thu tu
  $valueArray = [5, $pid];
  $stmt = $re1->execute($valueArray);
}
$showCartSQL = "SELECT  `pname`, `pprice`, `pimage`, `cquantity` FROM `cart` c, `product` p WHERE c.cproid = p.pid AND `cuserid` =?";
// chi xem gio hang
$re1 = $dblink->prepare($showCartSQL);
$valueArray1 = [
  5
];
$re1->execute($valueArray1);
//chi execute chua lay ra
$rows = $re1->fetchAll(PDO::FETCH_BOTH);

?>
<section class="h-100" style="background-color: #eee;">
  <div class="container h-100 py-5">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-10">

        <div class="d-flex justify-content-between align-items-center mb-4">
          <h3 class="fw-normal mb-0 text-black">Shopping Cart</h3>
          <div>
            <!-- <p class="mb-0"><span class="text-muted">Sort by:</span> <a href="#!" class="text-body">price <i
                  class="fas fa-angle-down mt-1"></i></a></p> -->
          </div>
        </div>

        <div class="card rounded-3 mb-4">
          <div class="card-body p-4">
            <?php
            foreach ($rows as $row) {
            ?>
              <div class="row d-flex justify-content-between align-items-center">
                <div class="col-md-2 col-lg-2 col-xl-2">
                  <img src="./Images/<?= $row['pimage'] ?>" class="img-fluid rounded-3" alt="">
                </div>
                <div class="col-md-3 col-lg-3 col-xl-3">
                  <p class="lead fw-normal mb-2"><?= $row['pname'] ?></p>
                  <!-- <p><span class="text-muted">Size: </span>M <span class="text-muted">Color: </span>Grey</p> -->
                </div>
                <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
                  <button class="btn btn-link px-2" onclick="this.parentNode.querySelector('input[type=number]').stepDown()">
                    <i class="fas fa-minus"></i>
                  </button>

                  <input id="form1" min="0" name="quantity" value="<?= $row['cquantity'] ?>" type="number" class="form-control form-control-sm" />

                  <button class="btn btn-link px-2" onclick="this.parentNode.querySelector('input[type=number]').stepUp()">
                    <i class="fas fa-plus"></i>
                  </button>
                </div>
                <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                  <h5 class="mb-0"><?= $row['pprice']+$row['cquantity'] ?>&#36</h5>
                </div>
                <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                  <a href="#!" class="text-danger"><i class="fas fa-trash fa-lg"></i></a>
                </div>
              </div>
            <?php
            }
            ?>
          </div>
        </div>
        <?php 
        $total = 0;
        foreach($rows as $row) {
          // Hiển thị thông tin mặt hàng
      
          $subtotal = $row['pprice'] * $row['cquantity'];
          $total += $subtotal;
      }
        ?>
        <div class="d-flex justify-content-between p-2 mb-2" style="background-color: #CC99FF;">
          <h5 class="fw-bold mb-0">Total:</h5>
          <h5 class="fw-bold mb-0"><?=$total?>&#36</h5>
        </div>

        <div class="card">
          <div class="card-body">
          <a href="allproducts.php" class="btn btn-warning btn-block btn-lg">Continue shopping</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
