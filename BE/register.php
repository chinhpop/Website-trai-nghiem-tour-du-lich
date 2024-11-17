<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>ĐĂNG KÍ</title>
    <link rel="stylesheet" href="./Assets/global.css">
    <link rel="stylesheet" href="./Assets/Css/register.css" />
    <link rel="stylesheet" href="./Assets/Css/menu-login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
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
                    <li><a href="#">Đăng nhập</a></li>
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
        <div class="login">
            <h2>ĐĂNG KÝ</h2>
            <form class="register-form" action="login.php" method="post">
                <div class="form-group">
                    <input type="text" id="full-name" name="full-name" class="form-input" required placeholder=" " />
                    <label for="username" class="form-label">Nhập Họ và Tên:</label>
                </div>
                <div class="form-group">
                    <input type="text" id="username" name="username" class="form-input" required placeholder=" " />
                    <label for="username" class="form-label">Tên Đăng Nhập</label>
                </div>
                <div class="form-group">
                    <input type="password" id="password" name="password" class="form-input" required placeholder=" " />
                    <label for="password" class="form-label">Mật Khẩu:</label>
                </div>
                <div class="form-group">
                    <input type="password" id="re-password" name="re-password" class="form-input" required
                        placeholder=" " />
                    <label for="re-password" class="form-label">Nhập lại mật khẩu:</label>
                </div>
                <div class="form-group">
                    <input type="tel" id="phone" name="phone" class="form-input" required placeholder=" " />
                    <label for="phone" class="form-label">Số điện thoại:</label>
                </div>

                <div class="form-group">
                    <input type="text" id="address" name="address" class="form-input" required placeholder=" " />
                    <label for="address" class="form-label">Địa Chỉ:</label>
                </div>

                <div class="form-actions">
                    <button type="submit" class="register-btn" name="register-btn" id="register-btn">ĐĂNG KÝ</button>
                    <button type="reset" class="cancel-btn">HỦY</button>
                </div>
            </form>
            <div class="register">
                <span>Đã có tài khoản? <a href="login.php">ĐĂNG NHẬP</a></span>
            </div>
        </div>
    </div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript" src="./Assets/script.js"></script>

</html>