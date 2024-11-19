<?php 
    include "./Class/Region.php";
    include "./Class/Tour_Region.php";
    include "./Class/User.php";
?>

<?php 
            session_start();
            if (isset($_POST["login-btn"])){ 
                // kiểm tra có remember không
                if (isset($_POST["remember"])){
                    // Tạo session
                    $_SESSION["username"] = $_POST["username"];
                    // Lưu thông tin người dùng vào session
                    $_SESSION["USER"] = $username;
                    $_SESSION["PASS"] = $password;
                }
                $username = $_POST["username"];
                $password = $_POST["password"];
                $user = new User();
                $rs = $user->get_user($username, $password);
                if ($rs){
                    // Lưu thông tin người dùng vào session
                    $_SESSION["USER"] = $username;
                    $_SESSION["PASS"] = $password;
                    echo "<h2 style='color: green'>Đăng nhập thành công</h2>";
                    header("Location: home_page.php?page=home_page");
                }else{
                    $error = "Tên đăng nhập hoặc mật khẩu không đúng.";
                    header("Location: login.php?error=".urldecode($error));
                }
            }
            
        ?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./Assets/global.css" />
    <link rel="stylesheet" href="./Assets/Css/login.css" />
    <link rel="stylesheet" href="./Assets/Css/menu-login.css">
    <title>Đăng Nhập</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script type="text/javascript" src="./Assets/script.js"></script>
    <script>
    document.querySelector(".login-form").addEventListener("submit", function(event) {
        // Lấy các giá trị nhập vào
        const username = document.getElementById("username").value.trim();
        const password = document.getElementById("password").value.trim();
        let hasError = false;

        // Xóa các thông báo lỗi cũ
        document.querySelectorAll(".error-message").forEach(function(error) {
            error.remove();
        });

        // Kiểm tra nếu tên đăng nhập để trống
        if (username === "") {
            const error = document.createElement("p");
            error.className = "error-message";
            error.style.color = "red";
            error.textContent = "Tên đăng nhập không được để trống.";
            document.getElementById("username").parentElement.appendChild(error);
            hasError = true;
        }

        // Kiểm tra nếu mật khẩu để trống
        if (password === "") {
            const error = document.createElement("p");
            error.className = "error-message";
            error.style.color = "red";
            error.textContent = "Mật khẩu không được để trống.";
            document.getElementById("password").parentElement.appendChild(error);
            hasError = true;
        }

        // Ngăn không cho form gửi đi nếu có lỗi
        if (hasError) {
            event.preventDefault();
        }
    });
    </script>
</head>

<body>
    <?php include "./menu/menu-login.php" ?>
    <div class="login-container">
        <div class="social-login">
            <p>Đăng nhập sử dụng tài khoản mạng xã hội</p>
            <button class="facebook">ĐĂNG NHẬP VỚI FACEBOOK</button>
            <button class="google">ĐĂNG NHẬP VỚI GOOGLE</button>
        </div>
        <div class="separator"></div>
        <div class="login">
            <h2>ĐĂNG NHẬP</h2>
            <?php 
                if (isset($_GET["error"])){
                    ?>
            <h2 style="color:red"><?php echo $_GET["error"] ?></h2>
            <?php
            }
            ?>
            <form class="login-form" action="login.php" method="post">
                <div class="form-group">
                    <input type="text" id="username" name="username" class="form-input" required placeholder=" " />
                    <label for="username" class="form-label">Tên Đăng Nhập</label>
                </div>
                <div class="form-group">
                    <input type="password" id="password" name="password" class="form-input" required placeholder=" " />
                    <label for="password" class="form-label">Mật Khẩu</label>
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
        </div>

    </div>
    <div id="footer"></div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="./Assets/script.js"></script>

</html>