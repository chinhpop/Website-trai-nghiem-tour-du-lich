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
    <link rel="stylesheet" href="./Assets/Css/profile.css">
</head>
<body>
    <div class="header"></div>
    <div class="container">
        <div class="title"> 
        <h1>Hồ sơ của tôi</h1></div>
        <div class=" main-container">
            <div class="sidebar">
                <h2>Hồ sơ của tôi</h2>
                <ul>
                    <li><a href="profile.php" class="active">Hồ sơ</a></li>
                    <li><a href="reservation.php">Đặt chỗ của tôi</a></li>
                    <li><a href="changeprofile.php">Thay đổi thông tin</a></li>
                    <li><a href="changpw.php">Đổi mật khẩu</a></li>
                    <li><a href="home_page.php">Đăng xuất</a></li>
                </ul>
         
            </div>
            <div class="info">
                <div class="my-profile">
                    <ul> <h4>Thông tin cá nhân </h4>
                        <li><p>Họ tên</p></li>
                        <li><p>Email</p></li>    
                        <li><p>SĐT </p></li>
                        <li><p>Giới tính</p></li>
                        <li><p>Ngày sinh</p></li>
                    </ul>
                    <button class="btn-edit">Chỉnh sửa hồ sơ</button>
                </div>
                <div class="contact">
                    <ul> 
                        <h4>Liên hệ </h4>
                        <li><p> Địa chỉ </p></li>
                        <li><p> Chức danh </p></li>
                        <li><p> Địa chỉ cơ quan</p></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="footer"></div>
</body>
</html>
