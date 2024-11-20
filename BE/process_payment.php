<?php
// Bắt đầu session
session_start();

// Kiểm tra nếu dữ liệu được gửi qua POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $adult = $_POST['adult'] ?? 0;
    $children = $_POST['children'] ?? 0;
    $infant = $_POST['infant'] ?? 0;
    
    $payment_method = $_POST['payment_method'] ?? '100%';
    $tour_name = $_POST['tour_name'] ??"";
    $code_tour = $_POST['tour_code']??"";

    $adult_price = $_POST['adult_price']; // Giá người lớn
    $child_price = $_POST['child_price']; // Giá trẻ em
    $infant_price = $_POST['infant_price']; // Giá em bé

    $id_tour = $_POST['id_tour']; //


    // Tính toán tổng tiền
    $total_price = ($adult * $adult_price) + ($children * $child_price) + ($infant * $infant_price);

    // Lưu thông tin vào session
    $_SESSION['payment_info'] = [
        'id_tour' => $id_tour,
        'tourName' => $tour_name,
        'codeTour' => $code_tour,
        'adult' => $adult,
        'children' => $children,
        'infant' => $infant,
        'payment_method' => $payment_method,
        'total_price' => $total_price,
    ];

    // Chuyển hướng sang trang xác nhận
    header('Location: confirmation.php');
    exit();
} else {
    echo "Không có dữ liệu được gửi.";
}
?>