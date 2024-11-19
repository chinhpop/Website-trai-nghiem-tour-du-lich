<?php 
    include "./Class/Contact.php";
    include "./Class/Region.php";
    include "./Class/Tour_Region.php";
    include "./Class/User.php";
    session_start();
?>

<?php 
    if (isset($_SESSION["ID_User"])){
        if (isset($_POST["btn-submit"])){
            $name = $_POST["name"];
            $phone = $_POST["phone"];
            $address = $_POST["address"] ;
            $email = $_POST["email"];
            $message = $_POST["message"];
            $id_user = $_SESSION["ID_User"];
            $newContact = new Contact();
            $detail_contact = $newContact->insert_contact($name,$phone,$address,$email,$message, $id_user);
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Liên hệ</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />
    <link rel="stylesheet" href="./Assets/Css/contact_page.css" />
    <link rel="stylesheet" href="./Assets/global.css">
    <link rel="stylesheet" href="./Assets/Css/menu-login.css">
</head>

<body>
    <!-- Header Image -->
    <?php include "./menu/menu-login.php" ?>
    <div class="header-image">
        <div>
            <h1>Liên hệ với chúng tôi</h1>
            <div class="line"></div>
        </div>
    </div>

    <!-- Contact Container -->
    <div class="contact-container">
        <!-- Contact Information -->
        <div class="contact-info">
            <h2>Thông tin liên hệ</h2>
            <div class="contact-item">
                <i class="fas fa-map-marker-alt"></i>
                <span>02 Võ Oanh, Bình Thạnh, TP.HCM</span>
            </div>
            <div class="contact-item">
                <i class="fas fa-phone"></i>
                <span>Hotline: 1988 9988</span>
            </div>
            <div class="contact-item">
                <i class="fas fa-envelope"></i>
                <span>info@trainghiemtourdulich.com</span>
            </div>
            <a href="#" class="branch-link">Xem địa chỉ các Văn phòng Chi nhánh</a>
        </div>

        <!-- Contact Form -->
        <div class="contact-form">
            <form action="Contact_Page.php" method="post" onsubmit="return validateCaptcha()">
                <input type="text" name="name" id="name" placeholder="Họ & Tên" required />
                <input type="text" name="phone" id="phone" placeholder="Điện thoại" required />
                <input type="text" name="address" id="address" placeholder="Địa chỉ" required />
                <input type="email" name="email" id="email" placeholder="Email" required />
                <textarea name="message" id="message" placeholder="Nội dung" required></textarea>
                <div class="captcha-container">
                    <div id="captcha" class="captcha-display">BBMVeo</div>
                    <input type="text" id="captchaInput" placeholder="Nhập mã Captcha" required />
                    <i class="fas fa-rotate-right captcha-refresh" onclick="generateCaptcha()"></i>
                </div>
                <button type="submit" id="btn-submit" name="btn-submit">Gửi</button>
            </form>
        </div>
    </div>

    <!-- Map Section -->
    <div class="map-container">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.1391672544044!2d106.7082309154101!3d10.803663092307763!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x317528d10362ec07%3A0x6f6bfb21d09a640c!2zMDIgVsO1IE9hbmg!5e0!3m2!1sen!2sus!4v1697505432103!5m2!1sen!2sus"
            allowfullscreen="" loading="lazy"></iframe>
    </div>

    <script>
    let captchaCode = "";

    function generateCaptcha() {
        const chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
        captchaCode = Array.from({
            length: 6
        }, () => chars.charAt(Math.floor(Math.random() * chars.length))).join("");
        document.getElementById("captcha").textContent = captchaCode;
    }

    function validateCaptcha() {
        const input = document.getElementById("captchaInput").value.trim();
        if (input === captchaCode) {
            alert("Gửi thành công!");
            return true;
        } else {
            alert("Mã Captcha không chính xác. Vui lòng thử lại!");
            return false;
        }
    }

    window.onload = generateCaptcha;
    </script>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="./Assets/script.js"></script>

</html>