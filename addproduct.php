<?php
require_once('header.php');
require_once('connect.php');
//khi nao an nut dang ky moi bat dau thao tac
if (isset($_POST['btnAdd'])) {
    $pname = $_POST['pname'];
    $price = $_POST['pprice'];
    $pinfo = $_POST['pinfo'];
    $pdate = $_POST['pdate'];
    $pquan = $_POST['pquan'];
    // $pimage = $_POST['pimage'];
    $pcatid = $_POST['pcatid'];

    $imagename = str_replace(' ', '_', $_FILES['pimage']['name']);
    //copy hinh bo vao trong va kiem tra bang flag
    $flag = move_uploaded_file($_FILES['pimage']['tmp_name'], './Images/' . $imagename);
    if ($flag) {
        // su dung PDO de su dung cau truy van Insert
        $sql = "INSERT INTO `product`(`pname`, `pprice`, `pinfo`, `pdate`, `pquan`, `pimage`, `pcatid`) 
    VALUES (?,?,?,?,?,?,?)";
        // 3 dau ? tuong ung voi so cot o tren

        $c = new Connect();
        // de han che sql intraction,  
        $dblink = $c->connectToPDO();
        $re = $dblink->prepare($sql);
        // lay tu form theo thu tu
        $valueArray = [$pname, $price, $pinfo, $pdate, $pquan, $imagename, $pcatid];
        $stmt = $re->execute($valueArray);
        if ($stmt) echo "Congrats";
    } else {
        echo "Image is coppied failed";
    }
}
?>
<div class="container">
    <h2>Product registeration</h2>
    <form action="" name="formReg" method="POST" enctype="multipart/form-data">
        <div class="row">
            <label for="" class="col-lg-2">Product name: </label>
            <div class="col-lg-10">
                <input type="text" class="form-control" name="pname">
            </div>
        </div>
        <div class="row">
            <label for="" class="col-lg-2">Price: </label>
            <div class="col-lg-10">
                <input type="number" class="form-control" min=0 name="pprice">
            </div>
        </div>
        <div class="row">
            <label for="" class="col-lg-2">Description: </label>
            <div class="col-lg-10">
                <input type="text" class="form-control" name="pinfo">
            </div>
        </div>
        <div class="row">
            <label for="" class="col-lg-2">Date: </label>
            <div class="col-lg-10">
                <input type="date" class="form-control" name="pdate">
            </div>
        </div>
        <div class="row">
            <label for="" class="col-lg-2">Category: </label>
            <div class="col-lg-10">
                <input type="number" class="form-control" min=0 name="pquan">
            </div>
        </div>
        <div class="row">
            <label for="" class="col-lg-2">Image: </label>
            <div class="col-lg-10">
                <input type="file" class="form-control" name="pimage">
            </div>
        </div>
        <div class="row">
            <label for="" class="col-lg-2">Cat ID: </label>
            <div class="col-lg-10">
                <input type="text" class="form-control" name="pcatid">
            </div>
        </div>
        <div class="row mb-3">
            <div class="d-grid mx-auto col-3">
                <input type="submit" value="Add" class="btn btn-primary" name="btnAdd">
                <!-- sau khi an submit, chay len action co phuong thuc POST, lay gia tri nay name, o ngay tại file này -->
            </div>
        </div>
    </form>
</div>
</body>

</html>