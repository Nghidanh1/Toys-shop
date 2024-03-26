<?php
require_once('header.php');
require_once('connect.php');
$a = $_GET['id'];
$sql = "SELECT * FROM `product` WHERE `pid`='$a'";
// 2 dau ? tuong ung voi so cot o tren

$c = new Connect();
$dblink = $c->connectToMySQL();
// $re = $dblink->prepare($sql);
// $valueArray = ["$username", "$password"];
// $stmt = $re->execute($valueArray);


$re = $dblink->query($sql);
$row = $re->fetch_assoc()
?>

<link rel="stylesheet" href="./css/detail.css">
<div class="container mt-5 mb-5">
    <div class="row d-flex justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="row">
                    <div class="col-md-6">
                        <div class="images p-3">
                            <div class="thumbnail text-center"> <img id="main-image" src="./images/<?= $row['pimage'] ?>" width="500px"> </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="product p-4">
                            <!-- <div class="d-flex justify-content-between align-items-center">
                                <div class="d-flex align-items-center"> <i class="fa fa-long-arrow-left"></i> <button class="ml-1" href="allproducts.php">Back</button> </div> <i class="fa fa-shopping-cart text-muted"></i>
                            </div> -->
                            <div class="mt-4 mb-3">
                                <h5 class="text-uppercase"><?= $row['pname'] ?></h5>
                                <div class="price d-flex flex-row align-items-center"> <span class="act-price"><?= $row['pprice'] ?>&#36;</span>
                                    <!-- <div class="ml-2"> <small class="dis-price">$59</small> <span>40% OFF</span> </div> -->
                                </div>
                            </div>
                            <p class="about"><?= $row['pinfo'] ?></p>
                            <div class="sizes mt-5">
                                <!-- <h6 class="text-uppercase">Size</h6> <label class="radio"> <input type="radio" name="size" value="S" checked> <span>S</span> </label> <label class="radio"> <input type="radio" name="size" value="M"> <span>M</span> </label> <label class="radio"> <input type="radio" name="size" value="L"> <span>L</span> </label> <label class="radio"> <input type="radio" name="size" value="XL"> <span>XL</span> </label> <label class="radio"> <input type="radio" name="size" value="XXL"> <span>XXL</span> </label> -->
                            </div>
                            <a href="cart.php?id=<?= $row['pid'] ?>" class="btn btn-warning bold-btn">Add to cart</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>