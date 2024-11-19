<?php 
    include "./Class/Contact.php";
    include "./Class/Region.php";
    include "./Class/Tour_Region.php";
    include "./Class/User.php";
    session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./Assets/global.css">
    <link rel="stylesheet" href="./Assets/Css/menu-login.css">
    <link rel="stylesheet" href="./Assets/Css/profile.css">
    <style>
    .btn-edit {
        display: inline-block;
        margin-top: 10px;
        padding: 8px 15px;
        background-color: #007bff;
        color: #fff;
        text-decoration: none;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 14px;
    }

    .btn-edit:hover {
        background-color: #0056b3;
    }
    </style>
</head>

<body>
    <?php include "./menu/menu-login.php" ?>
    <div class="header-image">
        <div>
            <h1>Hồ Sơ của tôi</h1>
            <div class="line"></div>
        </div>
    </div>
    <div class="container">
        <div class=" main-container">
            <div class="sidebar">
                <h2>Hồ sơ của tôi</h2>
                <ul>
                    <li><a href="profile.php" class="active">Hồ sơ</a></li>
                    <li><a href="reservation.php">Đặt chỗ của tôi</a></li>
                    <li><a href="changeprofile.php">Thay đổi thông tin</a></li>
                    <li><a href="changepw.php">Đổi mật khẩu</a></li>
                    <li>
                        <form method="post" action="xuly.php">
                            <input type="submit" name="btn-exit" id="btn-exit" value="Đăng Xuất"></input>
                        </form>
                    </li>
                </ul>

            </div>
            <?php 
                if (isset($_SESSION["ID_User"])){
                    $user = new User();
                    $username = $_SESSION["USER"];
                    $password = $_SESSION["PASS"];
                    $rs = $user->get_user($username, $password);
                    if ($rs){
                        $row = $rs->fetch_assoc();
                        ?>
            <div class="info">
                <div class="my-profile">
                    <ul>
                        <h4>Thông tin cá nhân </h4>
                        <li>
                            <p>Họ tên: <?php echo $row["FullName"] ?></p>
                        </li>
                        <li>
                            <p>Email: <?php echo $row["Email"] ?></p>
                        </li>
                        <li>
                            <p>SĐT: <?php echo $row["Phone"] ?></p>
                        </li>
                        <li>
                            <p>Giới tính: <?php echo $row["gender"] ?></p>
                        </li>
                        <li>
                            <p>Ngày sinh: <?php echo $row["DOB"] ?></p>
                        </li>
                    </ul>
                    <button class="btn-edit" id="btn-edit">Chỉnh sửa hồ sơ</button>
                </div>
                <div class="contact">
                    <ul>
                        <h4> Liên hệ </h4>
                        <li>
                            <p> Địa chỉ: <?php echo $row["Address"] ?></p>
                        </li>
                        <li>
                            <p> Chức danh: </p>
                        </li>
                        <li>
                            <p> Địa chỉ cơ quan:</p>
                        </li>
                    </ul>
                </div>
            </div>
            <?php
                    }
                }
            ?>
        </div>
    </div>
    <div class="footer"></div>
</body>

<script>
document.getElementById("btn-edit").addEventListener('click', function() {
    window.location.href = 'changeprofile.php';
});
</script>

</html>