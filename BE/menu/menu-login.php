<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../Assets/Css/menu-login.css">
</head>

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
                            ?>
                <div class="item-left-top-header">
                    <span class="info"><a href="#">Xin Chào, <?php echo $name ?></a></span>
                    <span class="exit"><a href="#">Đăng xuất</a></span>
                </div>
                <?php
                        }else{
                            ?>
                <div class="item-left-top-header">
                    <i class="fa-solid fa-right-to-bracket"></i>
                    <li><a href="./login.php" class="login">Đăng nhập</a></li>
                </div>
                <?php
                        }
                    ?>
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
                        <li class="dropdown mega-dropdown"><a class="dropdown-toggle" href="#">Dịch vụ du lịch</a></li>
                        <li class="dropdown mega-dropdown"><a class="dropdown-toggle" href="./Contact_Page.php">Liên
                                hệ</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
</body>

</html>