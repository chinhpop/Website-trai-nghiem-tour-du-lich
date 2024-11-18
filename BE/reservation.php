<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        ul {
            list-style-type: none;
            padding-left: 0;
        }

        li {
            margin-bottom: 10px;
        }

    th {
        font-size: 20px; /* Tăng kích thước chữ */
        font-weight: bold;
        padding: 10px; /* Tăng khoảng cách trong header */
    }

    td {
        padding: 8px;
        text-align: center;
    }
    table, th, td {
        border: none;
    }
    </style>
    <link rel="stylesheet" href="./Assets/Css/changpw.css">
</head>
<body>
    <div class="header"></div>
    <div class="container">
        <div class="title"> 
        <h1>Đặt chỗ của tôi</h1></div>
        <div class=" main-container">
            <div class="sidebar">
                <h2>Hồ sơ của tôi</h2>
                <ul>
                    <li><a href="profile.php" >Hồ sơ</a></li>
                    <li><a href="reservation.php" class="active">Đặt chỗ của tôi</a></li>
                    <li><a href="changeprofile.php" >Thay đổi thông tin</a></li>
                    <li><a href="changepw.php"  >Đổi mật khẩu</a></li>
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
                            <th width="130" scope="col">Ngày hết hạn</th>
                            <th width="138" scope="col">Tổng số chỗ</th>
                            <th width="138" scope="col">Tổng tiền</th>
                            <th width="138" scope="col">Trạng thái</th>
                          </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="footer"></div>
</body>
</html>