<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Trang Thanh Toán</title>
    <link rel="stylesheet" href="./Assets/Css/payment.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

</head>

<body>
    <div class="container">
        <!-- Thanh tiến trình -->
        <div class="steps">
            <div class="step active" data-step="1">1. CHỌN DỊCH VỤ</div>
            <div class="step" data-step="2">2. NHẬP THÔNG TIN HÀNH KHÁCH</div>
            <div class="step" data-step="3">3. THANH TOÁN</div>
            <div class="step" data-step="4">4. XÁC NHẬN</div>
        </div>

        <!-- Step 1 -->
        <div class="step-content active" id="step-1">
            <div class="content">
                <!-- Left Section -->
                <div class="left-section">
                    <h1>Số lượng hành khách</h1>
                    <div class="form-group">
                        <label for="adults">Người lớn (*)</label>
                        <input type="number" id="adults" name="adults" value="1" min="1" max="10"
                            placeholder="Nhập số người lớn" />
                    </div>
                    <div class="form-group">
                        <label for="children">Trẻ em</label>
                        <input type="number" id="children" name="children" value="0" min="0" max="10"
                            placeholder="Nhập số trẻ em" />
                    </div>
                    <div class="form-group">
                        <label for="infants">Em bé</label>
                        <input type="number" id="infants" name="infants" value="0" min="0" max="5"
                            placeholder="Nhập số em bé" />
                    </div>
                    <h1>Phương thức thanh toán</h1>
                    <div class="radio-group">
                        <input type="radio" id="fullPayment" name="paymentMethod" value="100%" checked />
                        <label for="fullPayment">Thanh toán 100%</label>
                        <input type="radio" id="partialPayment" name="paymentMethod" value="50%" />
                        <label for="partialPayment">Thanh toán 50%</label>
                    </div>
                    <div class="payment-container">
                        <h2>Chọn một trong các phương thức sau:</h2>

                        <!-- Thanh toán bằng thẻ nội địa ATM -->
                        <div class="payment-method" id="atm-payment">
                            <div class="method-header" onclick="togglePayment('atm-payment')">
                                <p><strong>Thanh toán bằng thẻ nội địa ATM</strong></p>
                                <p>
                                    Sau khi đặt vé và thanh toán thành công, Chúng Tôi
                                    sẽ gửi vé điện tử của Quý khách qua email.
                                </p>
                            </div>
                        </div>

                        <!-- Thanh toán bằng thẻ tín dụng -->
                        <div class="payment-method" id="credit-payment">
                            <div class="method-header" onclick="togglePayment('credit-payment')">
                                <p><strong>Thanh toán bằng Thẻ Tín Dụng</strong></p>
                                <p>
                                    Sau khi đặt vé và thanh toán thành công, Chúng Tôi
                                    sẽ gửi vé điện tử của Quý khách qua email.
                                </p>
                            </div>
                        </div>

                        <!-- Thanh toán bằng Zalo Pay -->
                        <div class="payment-method" id="zalopay-payment">
                            <div class="method-header" onclick="togglePayment('zalopay-payment')">
                                <p><strong>Thanh toán bằng Zalo Pay</strong></p>
                                <p>
                                    Sau khi đặt vé và thanh toán thành công, Chúng Tôi
                                    sẽ gửi vé điện tử của Quý khách qua email.
                                </p>
                            </div>
                        </div>

                        <!-- Thanh toán bằng momo -->
                        <div class="payment-method" id="momo-payment">
                            <div class="method-header" onclick="togglePayment('momo-payment')">
                                <p><strong>Thanh toán bằng Momo</strong></p>
                                <p>
                                    Hạn mức tối đa là 20.000.000 VND<br />
                                    Sau khi đặt vé và thanh toán thành công, Chúng Tôi
                                    sẽ gửi vé điện tử của Quý khách qua email.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="right-section">
                    <img src="https://saigontourist.net/uploads/destination/NuocNgoai/Maldives/Maldives-beach-nature_557944723.jpg"
                        alt="Tour Image">
                    <div class="tour-info">
                        <h3>DU LỊCH MALDIVES - TẾT NGUYÊN ĐÁN 2025 (MÙNG 1)</h3>
                        <p><i class="fas fa-barcode"></i> Code: <strong>STSTOB-2025-00024</strong></p>
                        <p><i class="fas fa-calendar-alt"></i> Ngày đi: <strong>29-01-2025</strong></p>
                        <p><i class="fas fa-calendar-alt"></i> Ngày về: <strong>02-02-2025</strong></p>
                        <p><i class="fas fa-clock"></i> Thời gian: <strong>5 ngày 3 đêm</strong></p>
                        <p><i class="fas fa-user"></i> Giá Người lớn: <strong>69.999.000 đ X 1</strong></p>
                        <h4>Tổng: <span class="total-price">69.999.000 đ</span></h4>
                    </div>
                </div>
            </div>
            <!-- Terms and Conditions -->
            <div class="terms-container">
                <div class="checkbox-group">
                    <input type="checkbox" id="termsCheckbox" />
                    <label for="termsCheckbox">Tôi đã đọc và đồng ý
                        <a href="#" style="color: blue">điều khoản</a></label>
                </div>
                <!-- Buttons -->
                <div class="buttons">
                    <button type="button" class="next-btn" id="continueButton" disabled data-next="2">
                        Tiếp Tục
                    </button>
                </div>
            </div>
        </div>

        <!-- Step 2 -->
        <div class="step-content" id="step-2">
            <h2>Thông Tin Hành Khách</h2>
            <form>
                <label for="name">Tên:</label>
                <input type="text" id="name" name="name" required />
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required />
                <label for="phone">Số Điện Thoại:</label>
                <input type="tel" id="phone" name="phone" required />
                <button type="button" class="prev-btn" data-prev="1">Quay Lại</button>
                <button type="button" class="next-btn" data-next="3">Tiếp Tục</button>
            </form>
        </div>

        <!-- Step 3 -->
        <div class="step-content" id="step-3">
            <h2>Phương Thức Thanh Toán</h2>
            <form>
                <label for="payment">Chọn Phương Thức:</label>
                <select id="payment" name="payment">
                    <option value="atm">Thanh toán bằng thẻ nội địa ATM</option>
                    <option value="credit">Thanh toán bằng thẻ tín dụng</option>
                    <option value="transfer">Thanh toán chuyển khoản</option>
                    <option value="zalopay">Thanh toán bằng Zalo Pay</option>
                    <option value="momo">Thanh toán bằng ví MoMo</option>
                </select>
                <button type="button" class="prev-btn" data-prev="2">Quay Lại</button>
                <button type="button" class="next-btn" data-next="4">Tiếp Tục</button>
            </form>
        </div>

        <!-- Step 4 -->
        <div class="step-content" id="step-4">
            <h2>Xác Nhận</h2>
            <p>Vui lòng kiểm tra lại thông tin trước khi hoàn tất đặt chỗ.</p>
            <button type="button" class="prev-btn" data-prev="3">Quay Lại</button>
            <button type="submit">Hoàn Tất</button>
        </div>
    </div>

    <script src="./Assets/payment.js"></script>
    <script type="text/javascript">
    const termsCheckbox = document.getElementById("termsCheckbox");
    const continueButton = document.getElementById("continueButton");
    const termssCheckbox = document.getElementById("termsCheckbox");
    const continueeButton = document.getElementById("continueButton");

    // Kích hoạt nút "Tiếp Tục" khi điều khoản được đồng ý
    termsCheckbox.addEventListener("change", () => {
        continueButton.disabled = !termsCheckbox.checked;
    });

    function togglePayment(id) {
        // Lấy tất cả các phương thức thanh toán
        const methods = document.querySelectorAll(".payment-method");

        // Duyệt qua từng phương thức và đặt trạng thái
        methods.forEach((method) => {
            if (method.id === id) {
                method.classList.toggle("active");
            } else {
                method.classList.remove("active");
            }
        });
    }

    termsCheckbox.addEventListener("change", () => {
        continueButton.disabled = !termsCheckbox.checked;
    });
    </script>
    <script>
    //Xử lý sự kiện khi người dùng chọn ô checkbox
    $(document).ready(function() {
        if ($(this).is(":checked")) {
            $(".next-btn").css("background-color", "#f90");
        } else {
            $(".next-btn").css("background-color", "#ddd");
        }
        $("#termsCheckbox").click(function() {
            if ($(this).is(":checked")) {
                $(".next-btn").css("background-color", "#f90");
            } else {
                $(".next-btn").css("background-color", "#ddd");
            }
        });
    })
    </script>
    </bodybody </html>