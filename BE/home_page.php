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
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Web Tour</title>
    <link rel="stylesheet" href="./Assets/global.css" />
    <link rel="stylesheet" href="./Assets/Css/menu.css">
    <link rel="stylesheet" href="./Assets/Css/homepage.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <?php 
        include("./menu/menu.php");
    ?>
    <?php 
    if (isset($_SESSION["USER"]) && $_SESSION["PASS"]) {
        $user = $_SESSION["USER"];
        $pass = $_SESSION["PASS"];
        $newUser = new User();
        $rs = $newUser->get_user($user, $pass);
        if ($rs) {while($new = $rs->fetch_assoc()){
            $name = $new["FullName"];
            $id = $new["ID_User"];
        }}
        //Tạo session
        $_SESSION["NAME"] = $name;
        $_SESSION["ID_User"] = $id;
    }
    ?>
    <div class="slideshow-container">
        <?php 
                $db = new Tour();
                $detail_tour = $db->show_tour();
                if ( $detail_tour ) { while($row = $detail_tour->fetch_assoc()){
            ?>
        <div class="slide fade">
            <img src="<?php echo $row["image"] ?>" alt="<?php echo $row["TourName"] ?>" />
            <div class="caption"><?php echo $row["TourName"] ?></div>
            <?php 
                $db2 = new Tour_Price();
                $priceTour = $db2->get_price($row["ID_tour"]);
                if ($priceTour) {
                    $price = $priceTour->fetch_assoc();
            ?>
            <div class="price"><?php echo formatCurrency($price["adult_price"]) ?></div>
            <?php } ?>


        </div>
        <?php }};?>
        <a class="prev" onclick="changeSlide(-1)">&#10094;</a>
        <a class="next" onclick="changeSlide(1)">&#10095;</a>
    </div>

    <div class="dots-container">
        <span class="dot" onclick="currentSlide(0)"></span>
        <span class="dot" onclick="currentSlide(1)"></span>
        <span class="dot" onclick="currentSlide(2)"></span>
        <span class="dot" onclick="currentSlide(3)"></span>
        <span class="dot" onclick="currentSlide(4)"></span>
    </div>

    <div class="banner-container">
        <div class="large-banner">
            <img src="https://www.justrunlah.com/wp-content/uploads/2016/12/Travel-the-world.jpg" alt="Large Banner" />
        </div>
        <div class="banner-row">
            <div class="medium-banner">
                <img src="https://static.india.com/wp-content/uploads/2022/12/travel-trends.jpg" alt="Medium Banner" />
            </div>
            <div class="small-banners">
                <img src="https://th.bing.com/th/id/OIP.PV6Dz_FxeBe2f79afYoqzwHaE8?rs=1&pid=ImgDetMain"
                    alt="Small Banner" />
            </div>
        </div>
    </div>

    <div class="features">
        <div class="feature">
            <img src="https://via.placeholder.com/50" alt="Icon" />
            <h3>Giá Tốt - Nhiều Ưu Đãi</h3>
            <p>Ưu đãi và quà tặng hấp dẫn khi mua tour online</p>
        </div>
        <div class="feature">
            <img src="https://via.placeholder.com/50" alt="Icon" />
            <h3>Thanh Toán An Toàn</h3>
            <p>Được bảo mật bởi tổ chức quốc tế Global Sign</p>
        </div>
        <div class="feature">
            <img src="https://via.placeholder.com/50" alt="Icon" />
            <h3>Tư Vấn Miễn Phí</h3>
            <p>Hỗ trợ tư vấn online miễn phí</p>
        </div>
        <div class="feature">
            <img src="https://via.placeholder.com/50" alt="Icon" />
            <h3>Thương Hiệu Uy Tín</h3>
            <p>Thương hiệu lữ hành hàng đầu Việt Nam</p>
        </div>
    </div>

    <footer>
        <div class="footer-column">
            <div class="logo">
                <img src="https://th.bing.com/th/id/OIP.Ls9zZM14tyIjEVGBWacheQHaHa?rs=1&pid=ImgDetMain" alt="Logo" />
            </div>
            <br />
            <p>Lữ hành, thương hiệu hàng đầu Việt Nam. Thương hiệu quốc gia</p>
        </div>
        <div class="footer-column">
            <h4>DỊCH VỤ</h4>
            <ul>
                <li><a href="#">Tour trong nước</a></li>
                <li><a href="#">Tour nước ngoài</a></li>
                <li><a href="#">Dịch vụ du lịch</a></li>
                <li><a href="#">Vé máy bay</a></li>
                <li><a href="#">Thuê xe</a></li>
            </ul>
        </div>
        <div class="footer-column">
            <h4>CHĂM SÓC KHÁCH HÀNG</h4>
            <ul>
                <li><a href="#">Thẻ khách hàng</a></li>
                <li><a href="#">Tải App</a></li>
                <li><a href="#">Travel Voucher</a></li>
                <li><a href="#">Bảo hiểm Du lịch</a></li>
            </ul>
        </div>
        <div class="footer-column">
            <h4>LIÊN HỆ</h4>
            <ul>
                <li><a href="#">Giới thiệu</a></li>
                <li><a href="#">Liên hệ</a></li>
                <li><a href="#">Chi nhánh</a></li>
                <li><a href="#">Quy định bảo vệ</a></li>
            </ul>
        </div>
    </footer>

    <script src="./Assets/homepage.js"></script>
    <footer>
        <p>&copy; 2024@Experience-Tourist | All Rights Reserved</p>
    </footer>
    <script src="./Assets/script.js"></script>
</body>

</html>