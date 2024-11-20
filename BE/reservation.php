<?php 
    include "./Class/Contact.php";
    include "./Class/Region.php";
    include "./Class/Tour_Region.php";
    include "./Class/User.php";
    include "./Class/Payment.php";
    include "./Class/FormatData.php";
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
    th {
        font-size: 20px;
        /* Tăng kích thước chữ */
        font-weight: bold;
        padding: 10px;
        /* Tăng khoảng cách trong header */
    }

    td {
        padding: 8px;
        text-align: center;
    }

    table,
    th,
    td {
        border: none;
    }
    </style>
    <link rel="stylesheet" href="./Assets/Css/changpw.css">
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
                    <li><a href="profile.php">Hồ sơ</a></li>
                    <li><a href="reservation.php" class="active">Đặt chỗ của tôi</a></li>
                    <li><a href="changeprofile.php">Thay đổi thông tin</a></li>
                    <li><a href="changepw.php">Đổi mật khẩu</a></li>
                    <li><a href="home_page.php">Đăng xuất</a></li>
                </ul>

            </div>
            <div class="info">
                <div class="my-profile">
                    <h4>Đặt chỗ của tôi </h4>
                    <table width="1000" border="1" cellspacing="0" cellpadding="2">
                        <tbody>
                            <tr>
                                <th width="100" scope="col">Mã đặt chỗ</th>
                                <th width="150" scope="col">Ngày đặt</th>
                                <th width="130" scope="col">Mã Tour</th>
                                <th width="138" scope="col">Tổng số chỗ</th>
                                <th width="138" scope="col">Tổng tiền</th>
                            </tr>
                            <?php
                                $id = $_SESSION["ID_User"];
                                $payment = new Payment();
                                $rs = $payment->get_payment($id);
                                if ($rs) {while($row = $rs->fetch_assoc()){
                            ?>
                            <tr>
                                <td><?php echo $row["ID_payment"] ?></td>
                                <td><?php echo $row["Date"] ?></td>
                                <td><?php echo $row["ID_CodeTour"] ?></td>
                                <td><?php echo $row["tong"] ?></td>
                                <td><?php echo formatCurrency($row["price_sum"]) ?></td>
                            </tr>
                            <?php }} ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="footer"></div>
</body>

</html>