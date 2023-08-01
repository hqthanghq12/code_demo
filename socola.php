<?php
session_start();
//Mảng tuần tự
$socolaBasic = [
    "red","yellow","green","pink", "black"
];
// Hàm xử lý mảng
// Đếm số socola mình có -> Đếm số phần tử có trong mảng
// Hàm count(tên mảng)
// Đảo ngược hôp socola -> Đảo ngược số phần tử trong mảng
// Hàm array_reverse(tên mảng)
$socolaReverse = array_reverse($socolaBasic);
// Ăn socola -> Xóa phần tử trong mảng
// Ăn viên socola cuối cùng -> Xóa phần tử cuối cùng
// array_pop()
//array_pop($socolaBasic);
//Ăn viên socola đầu tiên -> Xóa phần tử đầu tiên
// array_shift()
//array_shift($socolaBasic)
// Ăn viên socola tùy thích -> Xóa phần từ theo vị trí
// unset()
//unset($socolaBasic[0]);
// array_slice(array, vitribatdau, soluongmuonxoa)
//array_splice($socolaReverse,2,1);
// Thêm socola -> Thêm phần tử vào mảng
// thêm socola vào cuối hộp -> Thêm phân tử vào cuối mảng
// hàm array_push
//array_push($socolaBasic, "aqua");
//Thêm socola vào đầu hộp -> Thêm phân tử vào đầu mảng
// array_unshift()
//array_unshift($socolaBasic, "gray");
// Thêm 1 hộp socola mới -> Ghép 2 mảng vào thành 1
// array_merge
//$socolaM=array_merge($socolaBasic, $socolaReverse);
// Hộp socola không trùng màu -> Mảng k trùng giá trị
// array_unique
//$socolaU=array_unique($socolaM);

if(isset($_GET['an'])){
    if(!empty($_GET['vitri']|| $_GET['vitri'] == 0)){
        if (empty($_SESSION['index']) || !isset($_SESSION['index'])) {
            $_SESSION['index'] = [$_GET['vitri']];
            unset($socolaBasic[$_GET['vitri']]);
        } else {
            $_SESSION['index'][] = $_GET['vitri'];
            foreach ($_SESSION['index'] as $key => $value) {
                unset($socolaBasic[$value]);
            }
        }
    }
}
// Mảng liên hợp
$socolaUp = ["pink"=>"vị dâu","red"=>"Sting","green"=>"Matcha"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/socola.css">
</head>
<body>

<div class="container">
    <h1>SoCoLa</h1>
    <form action="" method="GET">
        <input type="text" name="vitri" placeholder="Nhập vị trí">
        <div class="button-group">
            <input type="submit" name="an" value="Ăn">
            <input type="submit" name="huy" value="Hủy">
        </div>
    </form>
    <div class="row">
        <?php foreach ($socolaBasic as $key => $value){?>
        <div class="square-container">
            <span><?php echo $key ?></span>
            <div class="square" style="background:<?php echo $value ?>;"></div>
        </div>
         <?php } ?>
    </div>
    <div class="row">
        <?php foreach ($socolaUp as $keyUp => $valueUp){?>
            <div class="square-container">
                <div class="square" style="background:<?php echo $keyUp ?>; text-align: center"><?php echo $valueUp ?>;</div>
            </div>
        <?php } ?>
    </div>
    <span style="font-size: 20px; font-weight: bold">Số lượng phần tử có trong mảng: <?php echo count($socolaBasic) ?></span>

</div>

</body>
</html>
