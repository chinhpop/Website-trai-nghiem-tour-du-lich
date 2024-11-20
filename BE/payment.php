<?php 
    include "Class/FormatData.php";
    include "Class/Tour_Program.php";
    include "Class/Tour_Policy.php";
    include "Class/Tour_Visa.php";
    include "Class/Tour_Schedule.php";
    include "Class/Tour_Price.php";
    include "Class/Tour_Code.php";
    include "Class/Tour_Detail.php";
    include "Class/Tour.php";
    include "Class/Payment.php";
    session_start();
?>

<?php 

    // Giá giả lập
    $adult_price = 0; // Giá người lớn
    $child_price = 0; // Giá trẻ em
    $infant_price = 0; // Giá em bé
    $tour_name = "";
    $code_tour = "";
    $id = $_GET["id"];
    $db = new Tour_Detail();
    $detail_tour = $db->get_detail_tourID($id);
    if ($detail_tour){
        $row2 = $detail_tour->fetch_assoc();
        $code_tour = $row2["Code_Tour"];
        $adult_price = $row2["adult_price"];
        $child_price = $row2["child_price"];
        $infant_price = $row2["baby_price"];
    }

    $db = new Tour();
    $tour = $db->get_tour($id);
    if ( $tour ) { 
        $row = $tour->fetch_assoc();
        $tour_name = $row["TourName"];
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang Thanh Toán</title>
    <link rel="stylesheet" href="./Assets/Css/payment_parent.css">
    <link rel="stylesheet" href="./Assets/Css/payment.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>
    <div class="container">
        <!-- Thanh tiến trình -->
        <div class="steps">
            <div class="step active">1. CHỌN DỊCH VỤ</div>
            <div class="step">2. XÁC NHẬN</div>
        </div>

        <!-- Form thanh toán -->
        <form action="process_payment.php" method="POST" id="bookingForm">
            <div class="form-group">
                <h1>Số lượng hành khách</h1>
                <label for="adult">Người lớn (*)</label>
                <input type="number" id="adult" name="adult" value="1" min="1" required>

                <label for="children">Trẻ em</label>
                <input type="number" id="children" name="children" value="1" min="0">

                <label for="infant">Em bé</label>
                <input type="number" id="infant" name="infant" value="1" min="0">
            </div>

            <div class="form-group">
                <h1>Phương thức thanh toán</h1>
                <input type="radio" id="payment_full" name="payment_method" value="100%" checked>
                <label for="payment_full">Thanh toán 100%</label>
                <input type="radio" id="payment_half" name="payment_method" value="50%">
                <label for="payment_half">Thanh toán 50%</label>
            </div>

            <div class="form-group">
                <h1>Thông tin thanh toán</h1>
                <p>Tên Tour: <b><?php echo $tour_name ?></b></p>
                <p>Code Tour: <b><?php echo $code_tour ?></b></p>
                <p>Giá Người lớn: <span id="adult_price"><?php echo number_format($adult_price, 0, ',', '.'); ?>
                        VND</span></p>
                <p>Giá Trẻ em: <span id="child_price"><?php echo number_format($child_price, 0, ',', '.'); ?> VND</span>
                </p>
                <p>Giá Em bé: <span id="infant_price"><?php echo number_format($infant_price, 0, ',', '.'); ?>
                        VND</span></p>
                <input type="hidden" name="id_tour" value="<?php echo $id; ?>">
                <input type="hidden" name="tour_name" value="<?php echo $tour_name; ?>">
                <input type="hidden" name="tour_code" value="<?php echo $code_tour; ?>">
                <input type="hidden" name="adult_price" value="<?php echo $adult_price; ?>">
                <input type="hidden" name="child_price" value="<?php echo $child_price; ?>">
                <input type="hidden" name="infant_price" value="<?php echo $infant_price; ?>">

                <h3>Tổng: <span id="total_price"></span></h3>
            </div>

            <div class="form-group">
                <input type="checkbox" id="agree_terms" required>
                <label for="agree_terms">Tôi đã đọc và đồng ý với <a href="#">điều khoản</a>.</label>
            </div>

            <button type="submit" id="submit_button" disabled>Hoàn tất</button>
        </form>
    </div>

    <!-- Script -->
    <script>
    // Giá cố định
    const adultPrice = <?php echo $adult_price; ?>;
    const childPrice = <?php echo $child_price; ?>;
    const infantPrice = <?php echo $infant_price; ?>;

    // DOM Elements
    const adultInput = document.getElementById('adult');
    const childInput = document.getElementById('children');
    const infantInput = document.getElementById('infant');
    const totalPriceElement = document.getElementById('total_price');
    const agreeTerms = document.getElementById('agree_terms');
    const submitButton = document.getElementById('submit_button');

    // Hàm tính tổng giá
    function calculateTotal() {
        const adultCount = parseInt(adultInput.value) || 0;
        const childCount = parseInt(childInput.value) || 0;
        const infantCount = parseInt(infantInput.value) || 0;

        const total = (adultCount * adultPrice) + (childCount * childPrice) + (infantCount * infantPrice);
        totalPriceElement.textContent = total.toLocaleString('vi-VN') + ' VND';
    }

    // Kích hoạt nút submit khi đồng ý điều khoản
    agreeTerms.addEventListener('change', function() {
        submitButton.disabled = !agreeTerms.checked;
    });

    // Lắng nghe sự thay đổi số lượng hành khách
    [adultInput, childInput, infantInput].forEach(input => {
        input.addEventListener('input', calculateTotal);
    });

    // Tính tổng giá ngay khi trang tải
    calculateTotal();
    </script>
</body>

</html>