<?php
include "Class/Payment.php";
session_start();

// Lấy dữ liệu từ session

$payment_info = $_SESSION['payment_info'] ?? null;
$id_tour = $payment_info["id_tour"];
$SL_adult = $payment_info['adult'];
$SL_child = $payment_info['children'];
$SL_infant = $payment_info['infant'];
$SL = $SL_adult + $SL_child + $SL_infant;
if (!$payment_info) {
    echo "Không có thông tin thanh toán.";
    exit;
}
if (isset($_POST["btn-home"])){
    $id_CodeTour = $payment_info['codeTour'];
    $total_price = $payment_info['total_price'];
    $id_User = $_SESSION["ID_User"];
    $currentDate = date('d/m/Y');   
    $newPayment = new Payment();
    $rs  = $newPayment->insert_payment($id_CodeTour, $currentDate, $SL, $total_price, $id_User);
    if ($rs){
        echo "<script>alert(Thanh toán thành công!)</script>";
        header("Location: home_page.php");
    }else{
        echo "<script>alert(Thanh toán không thành công!)</script>";
    }
    
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./Assets/Css/payment_parent.css">
    <link rel="stylesheet" href="./Assets/Css/confirmation.css">
    <title>Xác nhận Thanh Toán</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <style>
    /* Định dạng nút "Trở về" */
    .btn-back {
        display: inline-block;
        padding: 10px 20px;
        margin-top: 20px;
        background-color: #FF5722;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 16px;
        font-weight: bold;
        margin-left: 10px;
    }

    .btn-back:hover {
        background-color: #E64A19;
    }
    </style>
</head>

<body>
    <div class="container">
        <div class="steps">
            <div class="step ">1. CHỌN DỊCH VỤ</div>
            <div class="step active">2. XÁC NHẬN</div>
        </div>
        <h1>Thông tin xác nhận</h1>
        <p>Tên Tour: <?php echo $payment_info['tourName'] ?></p>
        <p>Code Tour: <?php echo $payment_info['codeTour'] ?></p>
        <p>Người lớn: <span id="adult_Price"><?php echo $payment_info['adult']; ?></span></p>
        <p>Trẻ em: <span id="child_Price"><?php echo $payment_info['children']; ?></span></p>
        <p>Em bé: <span id="infant_Price"><?php echo $payment_info['infant']; ?></span></p>
        <p>Phương thức thanh toán: <?php echo $payment_info['payment_method']; ?></p>
        <p>Bạn Vui lòng chuyển tiền vào số tài khoản 5811464464 <b>BIDV</b> để được gọi điện xác nhận.</p>
        <img src="./Assets/Image/QR-CODE.jpg" alt="QR-CODE" style="width: 30%; height:30%;">
        <h2>Tổng tiền: <?php echo number_format($payment_info['total_price'], 0, ',', '.'); ?> VND</h2>

        <!-- Nút trở về -->


        <!-- Nút quay về trang chủ -->
        <form action="confirmation.php" method="post">
            <button onclick="goBack()" class="btn-back">Trở về</button>
            <button class="btn-home" id="btn-home" name="btn-home">Hoàn tất</button>
        </form>
    </div>



    <script>
    // Chuyển hướng về trang chủ
    function goHome() {
        window.location.href = 'home_page.php'; // Đường dẫn thực tế tới trang chủ của bạn
    }

    // Chuyển hướng về trang payment.php
    function goBack() {
        window.location.href = 'payment.php?id=<?php echo $id_tour ?>'; // Đường dẫn tới payment.php
    }
    </script>
</body>

</html>