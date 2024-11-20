<?php 
    include "Class/FormatData.php";
    include "./Class/Region.php";
    include "./Class/Tour_Region.php";
    include "./Class/User.php";
    include "Class/Tour_Program.php";
    include "Class/Tour_Policy.php";
    include "Class/Tour_Visa.php";
    include "Class/Tour_Schedule.php";
    include "Class/Tour_Price.php";
    include "Class/Tour_Code.php";
    include "Class/Tour_Detail.php";
    include "Class/Tour.php";
    session_start();
?>

<?php 
    $id = $_GET["id"]; 
    $tour=new Tour(); $rs=$tour->get_tourByID($id);
    if ($rs){
    $row = $rs->fetch_assoc();
    $image = $row["image"];
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Du Lịch Bản Giốc - Pác Bó - Ba Bể - Thái Nguyên</title>
    <link rel="stylesheet" href="./Assets/global.css">
    <link rel="stylesheet" href="./Assets/CSS/menu-login.css">
    <link rel="stylesheet" href="./Assets/Css/detail-tour.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script>
    // JavaScript to handle tab switching
    function openTab(event, tabName) {
        const tabs = document.querySelectorAll(".tab");
        const contents = document.querySelectorAll(".tab-content");

        // Remove active class from all tabs and hide content
        tabs.forEach((tab) => tab.classList.remove("active"));
        contents.forEach((content) => content.classList.remove("active"));

        // Add active class to clicked tab and show corresponding content
        event.currentTarget.classList.add("active");
        document.getElementById(tabName).classList.add("active");
    }

    // Default to open the first tab
    document.addEventListener("DOMContentLoaded", () => {
        document.querySelector(".tab").click();
    });
    </script>
    <style>
    .header-image {
        width: 100%;
        height: 350px;
        background-image: url("<?php echo $image ?>");
        background-position: center;
        background-size: cover;
        position: relative;
        display: flex;
        justify-content: center;
        align-items: center;
        margin-bottom: 30px;
    }

    .header-image h1 {
        color: white;
        font-size: 24px;
        font-weight: bold;
        text-transform: uppercase;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.6);
        position: relative;
        z-index: 2;
        padding-top: 100px;
        margin: 0;
    }

    .header-image::after {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.4);
        z-index: 1;
    }
    </style>
</head>

<body>
    <?php include "./menu/menu-login.php" ?>
    <div class="header-image">
        <div>
            <?php 
                $id_tour = $_GET["id_TourRegion"];
                $tour_region = new Tour_Region();
                $rs  = $tour_region->get_tourName($id_tour);
                if ($rs){
                    $row = $rs->fetch_assoc();
                    ?>

            <h1><?php echo $row["area"] ?></h1>
            <div class="line"></div>
            <?php
                }
            ?>
        </div>
    </div>

    <!-- Main Content -->
    <main class="container">
        <!-- Left Section -->
        <section class="main-content">
            <?php 
                $db = new Tour();
                $detail_tour = $db->get_tour($id);
                if ( $detail_tour ) { 
                    $row = $detail_tour->fetch_assoc();
                    $depart = $row["depart"];
                    $time = $row["thoigian"];
            ?>
            <div class="tour-info">
                <div class="info-left">
                    <p><strong>Thời gian:</strong> <?php echo $row["thoigian"]; ?></p>
                    <p><strong>Điểm xuất phát:</strong><?php echo $row["start_location"]?></p>
                </div>
                <div class="info-right">
                    <p><strong>Phương tiện: </strong> <?php echo $row["phuongtien"]; ?></p>
                    <p><strong>Điểm đến:</strong>
                        <?php echo $row["end_location"]; ?>
                    </p>
                </div>
            </div>
            <?php } ?>
            <table class="tour-table">
                <thead>
                    <tr>
                        <th>Khởi Hành</th>
                        <th>Mã Tour</th>
                        <th>Giá</th>
                        <th>Giá Trẻ Em</th>
                        <th>Giá Em Bé</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $db = new Tour_Detail();
                    $detail_tour = $db->get_detail_tourID($id);
                    if ( $detail_tour ) {
                        $row = $detail_tour->fetch_assoc();
                        ?>
                    <tr>
                        <td><?php echo $row["start_depart"] ?></td>
                        <td><?php echo $row["Code_Tour"] ?></td>
                        <td><?php echo formatCurrency($row["adult_price"]) ?></td>
                        <td><?php echo formatCurrency($row["child_price"]) ?></td>
                        <td><?php echo formatCurrency($row["baby_price"]) ?></td>
                        <td><button class="btn-buy" name="btn-buy" id="btn-buy"><a
                                    href="payment.php?id=<?php echo $id ?>">Mua
                                    Online</a></button>
                        </td>
                    </tr>
                    <?php
                    }
                ?>
                </tbody>
            </table>

            <div class="tour-highlights">
                <h2>THỜI GIAN KHỞI HÀNH</h2>
                <h3><b>Khởi hành</b> <?php echo $depart ?></h3>

            </div>
        </section>

        <!-- Right Section -->
        <aside class="right-section">
            <div class="customer-support">
                <h3>Hỗ trợ khách hàng</h3>
                <p><strong>Hotline:</strong> 1900 1808</p>
                <p><strong>Email:</strong>tranngocphuoc.2000vta@gmail.com
                </p>
                <button class="callback-btn">Bạn muốn được gọi lại?</button>
            </div>

            <div class="why-buy-online">
                <h3>Vì sao nên mua tour online?</h3>
                <ul>
                    <li>An toàn - Bảo mật</li>
                    <li>Tiện lợi, tiết kiệm thời gian</li>
                    <li>Không tính phí giao dịch</li>
                    <li>Giao dịch bảo đảm</li>
                    <li>Nhận thêm ưu đãi</li>
                </ul>
            </div>
        </aside>
    </main>
    <div class="tab-container">
        <div class="tabs">
            <div class="tab active" onclick="openTab(event, 'chuong-trinh')">
                Chương trình Tour
            </div>
            <div class="tab" onclick="openTab(event, 'chinh-sach')">
                Chính sách Tour
            </div>
            <div class="tab" onclick="openTab(event, 'thu-tuc')">
                Thủ tục & Visa
            </div>
        </div>
        <div id="chuong-trinh" class="tab-content active">
            <?php 
        $db = new Tour_Program();
        $tour_program = $db->get_program($id);
        if ( mysqli_num_rows($tour_program) > 0 ) {while ( $row = $tour_program ->fetch_assoc()){
                echo "<p>". "<b>" . $row["date_program"]. "</b>" . ": " .$row["program_name"] . "</p>";
                echo "</br>";
                echo "<p>". $row["activity"]."</p>";
            echo "</br>";
            }}?>
        </div>
        <div id="chinh-sach" class="tab-content">
            <?php 
                $db = new Tour_Policy();
                $id_tourRegion = $_GET["id_TourRegion"];
                $detail_policy = $db->get_policy($id_tourRegion);
                if ( $detail_policy ) {while($row = $detail_policy -> fetch_assoc()){
                    echo "<p>" . nl2br($row["price_policy"]). "</p>";
                }} 
            ?>
        </div>
        <div id="thu-tuc" class="tab-content">
            <?php 
                $db = new Tour_Visa();
                $detail_visa = $db->get_visa($id_tourRegion);
                if ( $detail_visa ) {while($row = $detail_visa -> fetch_assoc()){
                    echo "<p>". "<strong>" . nl2br( $row["question"]). "</strong>" . "</p>";
                    echo "<p>". nl2br($row["Content"]). "</p>";
                    echo "</br>";
                }}
            ?>
        </div>
    </div>
    <footer>
        <p>&copy; 2024@Experience-Tourist | All Rights Reserved</p>
    </footer>
</body>

<script src="./Assets/script.js"></script>
<script>
$(document).ready(function() {
    $(".dropdown").hover(
        function() {
            $(".dropdown-menu", this)
                .not(".in .dropdown-menu")
                .stop(true, true)
                .slideDown("400");
            $(this).toggleClass("open");
        },
        function() {
            $(".dropdown-menu", this)
                .not(".in .dropdown-menu")
                .stop(true, true)
                .slideUp("400");
            $(this).toggleClass("open");
        }
    );
    // Khi di chuột vào "Tour trong nước"
    $(".dropdown-toggle").hover(
        function() {
            $(this).css("color", "#ff5733"); // Màu cam khi di chuột vào
            $(this).css("background-color", "transparent");
        },
        function() {
            $(this).css("color", ""); // Trở về màu gốc khi không di chuột nữa
        }
    );
});
</script>

</html>