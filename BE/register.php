<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>ĐĂNG KÍ</title>
    <link rel="stylesheet" href="Assets/Css/register.css" />
    <script>
    let lastScrollY = window.scrollY;

    window.addEventListener("load", function() {
        const mainheader = document.getElementById("mainheader");
        const registerContainer = document.querySelector(".register-container");

        // Lấy chiều cao của header và thiết lập khoảng cách cho form
        const headerHeight = mainheader.offsetHeight;
        registerContainer.style.paddingTop = `${headerHeight}px`;
    });

    window.addEventListener("scroll", function() {
        const subheader = document.getElementById("subheader");
        const mainheader = document.getElementById("mainheader");

        if (window.scrollY > lastScrollY) {
            // Cuộn xuống
            subheader.style.transform = "translateY(-100%)";
            mainheader.style.position = "fixed";
            mainheader.style.top = "0";
            mainheader.classList.add("scrolled");
        } else if (window.scrollY === 0) {
            // Đưa mọi thứ về mặc định khi ở vị trí đầu trang
            subheader.style.transform = "translateY(0)";
            mainheader.style.position = "relative";
            mainheader.classList.remove("scrolled");
        }

        lastScrollY = window.scrollY;
    });
    document.querySelector('.register-form').addEventListener('submit', function(event) {
        const inputs = this.querySelectorAll('input');
        let hasEmptyField = false;

        // Kiểm tra tất cả các ô input
        inputs.forEach(input => {
            if (input.value.trim() === '') {
                hasEmptyField = true;
                input.classList.add('error'); // Thêm lớp lỗi để đánh dấu ô trống
            } else {
                input.classList.remove('error'); // Xóa lớp lỗi nếu ô không trống
            }
        });

        if (hasEmptyField) {
            event.preventDefault(); // Ngăn không cho gửi form
            alert('Vui lòng điền đầy đủ thông tin!'); // Thông báo lỗi
        }
    });
    </script>

</head>

<body>
    <div class="header">
        <div id="subheader" class="subheader">
            <div class="contact-info">
                <a href="mailto:info@saigontourist.net">
                    <span class="icon">📧</span> info@saigontourist.net</a>
                <a href="tel:19001808">
                    <span class="icon">📞</span> Hotline: 1900 180</a>
            </div>
            <div class="nav-links">
                <a href="#"><span class="icon">📍</span> Chọn điểm khởi hành</a>
                <a href="#">Đăng nhập</a>
            </div>
        </div>
        <div id="mainheader" class="mainheader">
            <div class="logo">
                <img src="logo.pn g" alt="Saigontourist" />
            </div>
            <nav class="navbar">
                <a href="#">TRANG CHỦ</a>
                <a href="#">TOUR TRONG NƯỚC</a>
                <a href="#">TOUR NƯỚC NGOÀI</a>
                <a href="#">DỊCH VỤ DU LỊCH</a>
                <a href="#">LIÊN HỆ</a>
            </nav>
            <div class="search">
                <button class="search-button">🔍</button>
            </div>
        </div>
    </div>
    <div class="register-container">
        <h2>ĐĂNG KÝ</h2>
        <div class="social-login">
            <button class="fb">ĐĂNG KÝ VỚI FACEBOOK</button>
            <button class="google">ĐĂNG KÝ VỚI GOOGLE</button>
        </div>
        <?php 
        include "Connection/connect.php";
            if (isset($_POST["register-btn"])){   
                $UserName = $_POST["username"];
                $Password = $_POST["password"];
                $Fullname = $_POST["full-name"];
                $Email = $_POST["email"];
                $Phone = $_POST["phone"];
                $Address = $_POST["address"];     
                $sql_search = "Select * from user_account where UserName = '$UserName' and Password = '$Password'";
                $result = mysqli_query($conn, $sql_search);
                if (mysqli_num_rows($result) > 0){
                    echo "<h2 style='color: red'>Tài khoản đã tồn tại</h2>";
                }else{
                    $sql = "INSERT INTO user_account (UserName, Password, level, Fullname, Email, Phone, Address) 
                    VALUES ('$UserName','$Password','$Fullname', 2,'$Email','$Phone','$Address')";
                    mysqli_query($conn, $sql);
                    echo "<h2>Add thành công</h2>";
                    header("Location: login.php");
                }
            }
        ?>
        <form class="register-form" action="register.php" method="post">
            <label for="full-name">Full Name (*)</label>
            <input type="text" id="full-name" name="full-name" placeholder="Vui lòng nhập dữ liệu" />

            <label for="email">Địa chỉ email (*)</label>
            <input type="email" id="email" name="email" placeholder="Vui lòng nhập dữ liệu" />

            <label for="full-name">Tên đăng nhập (*)</label>
            <input type="text" id="username" name="username" placeholder="Vui lòng nhập UserName" />

            <label for="password">Mật khẩu (*)</label>
            <input type="password" id="password" name="password" placeholder="Vui lòng nhập Password" />

            <label for="confirm-password">Confirm password (*)</label>
            <input type="password" id="confirm-password" name="confirm-password"
                placeholder="Vui lòng nhập lại Password" />

            <label for="phone">Phone</label>
            <input type="text" id="phone" name="phone" placeholder="Vui lòng nhập số điện thoại" />

            <label for="address">Address</label>
            <input type="text" id="address" name="address" placeholder="Vui lòng nhập địa chỉ" />

            <div class="form-actions">
                <button type="submit" class="register-btn" name="register-btn" id="register-btn">ĐĂNG KÝ</button>
                <button type="reset" class="cancel-btn">HỦY</button>
            </div>
        </form>
        <p>Đã có tài khoản? <a href="login.php">ĐĂNG NHẬP</a></p>
    </div>
    <div id="footer"></div>
</body>

</html>