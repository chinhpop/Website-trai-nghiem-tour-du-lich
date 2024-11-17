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
    <link rel="stylesheet" href="./Assets/Css/changpw.css">
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
                    <li><a href="profile.php" >Hồ sơ</a></li>
                    <li><a href="reservation.php">Đặt chỗ của tôi</a></li>
                    <li><a href="changeprofile.php" >Thay đổi thông tin</a></li>
                    <li><a href="changpw.php" class="active" >Đổi mật khẩu</a></li>
                    <li><a href="home_page.php">Đăng xuất</a></li>
                </ul>
         
            </div>
            <div class="info">
                <div class="my-profile">
                    <ul> <h4>Thay đổi mật khẩu </h4>
                        <li> <input type="text" id="name" name="name" placeholder="Mật khẩu cũ(*) "></li>
                        <li> <input type="email" id="email" name="email" placeholder="Mật khẩu mới(*)"></li>    
                        <li> <input type="tel" id="phone" name="phone" placeholder=" Xác nhận mật khẩu mới(*)"></li>
                    </ul>
                    <button class="btn-edit">Thay đổi</button>
                </div>
            </div>
        </div>
    </div>
    <div class="footer"></div>
</body>
</html>
