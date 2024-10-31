<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="Assets/Css/login.css" />
    <title>Đăng Nhập</title>
    <script>
    let lastScrollY = window.scrollY;
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
            subheader.style.transform = "translateY(0)";
            mainheader.style.position = "relative";
            mainheader.classList.remove("scrolled");
        }

        lastScrollY = window.scrollY;
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
            </div>
        </div>
        <div id="mainheader" class="mainheader">
            <div class="logo">
                <img src="logo.png" alt="Saigontourist" />
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
    <div class="login-container">
        <h2>ĐĂNG NHẬP</h2>
        <div class="social-login">
            <button class="facebook">ĐĂNG NHẬP VỚI FACEBOOK</button>
            <button class="google">ĐĂNG NHẬP VỚI GOOGLE</button>
        </div>
        <form class="login-form" action="login.php" method="post">
            <div class="input-group">
                <label for="user">Tên đăng nhập</label>
                <input type="text" id="username" name="username" placeholder="Vui lòng nhập dữ liệu" />
            </div>
            <div class="input-group">
                <label for="password">Mật khẩu</label>
                <input type="password" id="password" name="password" placeholder="Vui lòng nhập dữ liệu" />
            </div>
            <div class="remember">
                <input type="checkbox" id="remember" name="remember" />
                <label for="remember">Ghi nhớ</label>
            </div>
            <div class="forgot-password">
                <a href="#">QUÊN MẬT KHẨU?</a>
            </div>
            <div class="buttons">
                <button class="login-btn" id="login-btn" name="login-btn">ĐĂNG NHẬP</button>
                <button class="cancel-btn">HỦY</button>
            </div>
        </form>
        <div class="register">
            <span>Chưa có tài khoản <a href="register.php">ĐĂNG KÝ</a></span>
        </div>
        <?php 
            include "Connection/connect.php";
            session_start();
            if (isset($_POST["login-btn"])){ 
                // kiểm tra có remember không
                if (isset($_POST["remember"])){
                    // Tạo session
                    $_SESSION["username"] = $_POST["username"];
                }
                $username = $_POST["username"];
                $password = $_POST["password"];
                $sql = "SELECT * FROM user_account WHERE Username = '$username' AND Password = '$password'";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0){
                    echo "<h2 style='color: green'>Đăng nhập thành công</h2>";
                }
            }
            
        ?>
    </div>
    <div id="footer"></div>
</body>

</html>