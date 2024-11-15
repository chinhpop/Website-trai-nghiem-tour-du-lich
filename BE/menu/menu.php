<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Web Tour</title>
    <link rel="stylesheet" href="../Assets/global.css" />
    <link rel="stylesheet" href="../Assets/Css/menu.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<?php 
    include("Class/Tour_Region.php");
    include("Class/Region.php");
?>

<body>
    <header>
        <div class="hero">
            <div class="top-header">
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
        </div>
    </header>
    <div class="container">
        <nav class="navbar navbar-inverse navbar-absolute">
            <div class="navbar-header">
                <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".js-navbar-collapse">
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
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function() {
    // Khi di chuột vào "Tour trong nước"
    $(".mega-dropdown").hover(
        function() {
            $(".mega-dropdown-menu", this).stop(true, true).slideDown("400");
            $(this).find("a.dropdown-toggle").css("color", "#ff5733"); // Đổi màu cam
            $(this)
                .find("a.dropdown-toggle")
                .css("text-decoration-color", "#ff5733");
        },
        function() {
            $(".mega-dropdown-menu", this).stop(true, true).slideUp("400");
            $(this).find("a.dropdown-toggle").css("color", ""); // Trở về màu gốc
            $(this).find("a.dropdown-toggle").css("text-decoration-color", "");
        }
    );
    $(".item-left-top-header").hover(
        function() {
            $(this).find("i").css("color", "orange");
            $(this).find("li").css("color", "orange");
        },
        function() {
            $(this).find("i").css("color", "");
            $(this).find("li").css("color", "");
        }
    );
});
</script>

</html>