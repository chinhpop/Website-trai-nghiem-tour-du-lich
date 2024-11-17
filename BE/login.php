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
                $sql = "SELECT * FROM account_user WHERE Username = '$username' AND Password = '$password'";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0){
                    echo "<h2 style='color: green'>Đăng nhập thành công</h2>";
                    header("Location: home_page.php");
                }
            }
            
        ?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./Assets/Css/profile.css" />
    <link rel="stylesheet" href="./Assets/global.css" />
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
<?php 
    include "./Class/Region.php";
    include "./Class/Tour_Region.php";
?>

<body>
    <div class="header">
        <div id="top-header" class="top-header">
            <div class="left-top-header">
                <div class="item-left-top-header">
                    <i class="fa-solid fa-envelope"></i>
                    <li>info@saigontourist.net</li>
                </div>
                <div class="item-left-top-header">
                    <i class="fa-solid fa-phone"></i>
                    <li>Hotline: 1900 1808</li>
                </div>
            </div>
            <div class="right-top-header">
                <div class="item-left-top-header">
                    <i class="fa-solid fa-location-dot"></i>
                    <li>Chọn điểm khởi hành</li>
                </div>
                <div class="item-left-top-header">
                    <i class="fa-solid fa-right-to-bracket"></i>
                    <li><a href="#" class="login">Đăng nhập</a></li>
                </div>
            </div>
        </div>
        <div class="container">
            <nav class="navbar navbar-inverse navbar-absolute">
                <div class="navbar-header">
                    <button class="navbar-toggle" type="button" data-toggle="collapse"
                        data-target=".js-navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Trang Chủ</a>
                </div>
                <div class="collapse navbar-collapse js-navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li class="dropdown mega-dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Tour trong nước <span
                                    class="caret"></span></a>
                            <ul class="dropdown-menu mega-dropdown-menu row">
                                <?php 
                            $region = new Region();
                            $detail_region = $region->show_region();
                            if ($detail_region) {while ($region = $detail_region->fetch_assoc()){
                                ?>
                                <li class="col-sm-3">
                                    <ul>
                                        <li class="dropdown-header"><?php echo $region["region"] ?></li>

                                        <?php 
                                        $tour_region = new Tour_Region();
                                        $detail_tourRegion = $tour_region->get_tourRegion($region["ID_region"]);
                                        if ($detail_tourRegion) {while($row = $detail_tourRegion->fetch_assoc()){
                                            ?>
                                        <li><a
                                                href="List_Tour.php?id_TourRegion=<?php echo $row["ID_TourRegion"] ?>"><?php echo $row["area"] ?></a>
                                        </li>
                                        <?php 
                                    }}
                                    ?>
                                    </ul>
                                </li>
                                <?php
                            }}
                            ?>
                            </ul>
                        </li>
                        <li><a class="navigate-btn" href="#">Tour nước ngoài</a></li>
                        <li><a class="navigate-btn" href="#">Dịch vụ du lịch</a></li>
                        <li><a class="navigate-btn" href="Contact.html">Liên hệ</a></li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
    <div class="login-container">
        <div class="social-login">
            <p>Đăng nhập sử dụng tài khoản mạng xã hội</p>
            <button class="facebook">ĐĂNG NHẬP VỚI FACEBOOK</button>
            <button class="google">ĐĂNG NHẬP VỚI GOOGLE</button>
        </div>
        <div class="separator"></div>
        <div class="login">
            <h2>ĐĂNG NHẬP</h2>
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
        </div>

    </div>
    <div id="footer"></div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="./Assets/script.js"></script>

</html>