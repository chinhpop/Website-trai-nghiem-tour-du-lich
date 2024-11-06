<!DOCTYPE html>
<html lang="en">

<?php 
    include "Class/Tour.php";
    include "Class/Tour_Program.php";
    include "Class/Tour_Policy.php";
    include "Class/Tour_Visa.php";
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Du Lịch Bản Giốc - Pác Bó - Ba Bể - Thái Nguyên</title>
    <link rel="stylesheet" href="./Assets/Css/detail-tour.css" />
    <script>
    // JavaScript to handle tab switching
    // JavaScript to handle tab switching
    // JavaScript to handle tab switching
    function openTab(event, tabName) {
        const tabs = document.querySelectorAll('.tab');
        const contents = document.querySelectorAll('.tab-content');

        // Remove active class from all tabs and hide content
        tabs.forEach(tab => tab.classList.remove('active'));
        contents.forEach(content => {
            content.classList.remove('active');
            content.style.display = 'none'; // Ensure all tab contents are hidden
        });

        // Add active class to clicked tab and show corresponding content
        event.currentTarget.classList.add('active');
        const activeContent = document.getElementById(tabName);
        activeContent.classList.add('active');
        activeContent.style.display = 'block'; // Ensure active tab content is displayed
    }

    // Default to open the first tab
    document.addEventListener('DOMContentLoaded', () => {
        document.querySelector('.tab').click();
    });
    </script>
</head>

<body>

    <!-- Header -->
    <header>
        <div class="contact-info">
            <span>Email: info@saigontourist.net</span> | <span>Hotline: 1900 1808</span>
        </div>
        <nav>
            <ul>
                <li><a href="#">Trang Chủ</a></li>
                <li><a href="#">Tour Trong Nước</a></li>
                <li><a href="#">Dịch Vụ Du Lịch</a></li>
                <li><a href="#">Liên Hệ</a></li>
            </ul>
        </nav>
    </header>

    <?php 
        $db = new Tour();
        $detail_tour = $db->show_tour();
        if ( $detail_tour ) {while ( $row = $detail_tour->fetch_assoc()){

        
    ?>
    <section class="banner">
        <h1> <?php echo $row["TourName"]; ?></h1>
    </section>

    <!-- Tour Details -->
    <div class="tour-details">
        <div class="tour-image">
            <img src="https://f.hoatieu.vn/data/image/2023/02/10/viet-doan-van-ngan-cam-nhan-ve-bai-tho-tuc-canh-pac-bo.jpg"
                alt="Tour Image">
        </div>
        <div class="tour-info">
            <h2 class="tour-title"><?php echo $row["TourName"]; ?></h2>
            <p class="tour-location"><?php echo $row["location"]; ?></p>
            <p>Thời gian: <?php echo $row["thoigian"]; ?></p>
            <p>Phương tiện: <?php echo $row["phuongtien"]; ?></p>
            <p>Khởi hành <?php echo $row["start_time"]; ?></p>
            <div class="tour-price">Giá từ 9.439.000 VND</div>
            <a href="#" class="btn-book">Đặt Tour Ngay</a>
        </div>
    </div>
    <?php }} ?>
    <!-- New Table Section -->
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
            <tr>
                <td>09/11/2024</td>
                <td>STN084-2024-03163</td>
                <td>9.439.000 VND</td>
                <td>6.700.000 VND</td>
                <td>4.000.000 VND</td>
                <td><button class="btn-buy">Mua Online</button></td>
            </tr>
            <tr>
                <td>23/11/2024</td>
                <td>STN084-2024-03164</td>
                <td>9.439.000 VND</td>
                <td>6.700.000 VND</td>
                <td>4.000.000 VND</td>
                <td><button class="btn-buy">Mua Online</button></td>
            </tr>
            <tr>
                <td>07/12/2024</td>
                <td>STN084-2024-03165</td>
                <td>9.439.000 VND</td>
                <td>6.700.000 VND</td>
                <td>4.000.000 VND</td>
                <td><button class="btn-buy">Mua Online</button></td>
            </tr>
            <tr>
                <td>21/12/2024</td>
                <td>STN084-2024-03166</td>
                <td>9.439.000 VND</td>
                <td>6.700.000 VND</td>
                <td>4.000.000 VND</td>
                <td><button class="btn-buy">Mua Online</button></td>
            </tr>
        </tbody>
    </table>
    <div class="tab-container">
        <div class="tabs">
            <div class="tab active" onclick="openTab(event, 'chuong-trinh')">Chương trình Tour</div>
            <div class="tab" onclick="openTab(event, 'chinh-sach')">Chính sách Tour</div>
            <div class="tab" onclick="openTab(event, 'thu-tuc')">Thủ tục & Visa</div>
        </div>

        <div id="chuong-trinh" class="tab-content active">
            <?php 
        $db = new Tour_Program();
        $tour_program = $db->show_program();
        if ( mysqli_num_rows($tour_program) > 0 ) {while ( $row = $tour_program ->fetch_assoc()){
                echo "<p>". "<strong>" . $row["date_program"]. "</strong>" . ": " .$row["program_name"] . "</p>";
                echo "</br>";
                echo "<p?>". $row["activity"]."</p>";
            echo "</br>";
            }}?>
        </div>
        <div id="chinh-sach" class="tab-content">
            <?php 
                $db = new Tour_Policy();
                $detail_policy = $db->show_policy();
                if ( $detail_policy ) {while($row = $detail_policy -> fetch_assoc()){
                    echo "<p>" . nl2br($row["price_policy"]). "</p>";
                }}
            ?>
        </div>
        <div id="thu-tuc" class="tab-content">
            <?php 
                $db = new Tour_Visa();
                $detail_visa = $db->show_visa();
                if ( $detail_visa ) {while($row = $detail_visa -> fetch_assoc()){
                    echo "<p>". "<strong>" . nl2br( $row["question"]). "</strong>" . "</p>";
                    echo "<p>". nl2br($row["Content"]). "</p>";
                    echo "</br>";
                }}
            ?>
        </div>
    </div>
    <footer>
        <p>&copy; 2024 Saigontourist | All Rights Reserved</p>
    </footer>

</body>

</html>