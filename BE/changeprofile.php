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
    <link rel="stylesheet" href="./Assets/Css/profile.css" >
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
                    <li><a href="reservation.php" >Đặt chỗ của tôi</a></li>
                    <li><a href="changeprofile.php" class="active" >Thay đổi thông tin</a></li>
                    <li><a href="changepw.php">Đổi mật khẩu</a></li>
                    <li><a href="">Đăng xuất</a></li>
                </ul>
         
            </div>
            <div class="info">
                <div class="my-profile">
                    <ul> <h4>Thông tin cá nhân </h4>
                        <li> <input type="text" id="name" name="name" placeholder="Nhập họ tên"></li>
                        <li> <input type="email" id="email" name="email" placeholder="Nhập email"></li>    
                        <li> <input type="tel" id="phone" name="phone" placeholder="Nhập số điện thoại"></li>
                        <li><select id="gender" name="gender">
                            <option value="male">Nam</option>
                            <option value="female">Nữ</option>
                        </select></li>
                        <li><input type="date" id="brithday" name="brithday" placeholder="Ngày sinh (dd/mm/yyyy)"></li>
                    </ul>
                    <button class="btn-edit">Lưu</button>
                </div>
                <div class="contact">
                    <ul> 
                        <h4>Liên hệ </h4>
                        <li> <input type="text" id="address" name="address" placeholder="Nhập địa chỉ"></li>
                        <li> <input type="text" id="title" name="title" placeholder="Nhập chức danh"></li>
                        <li> <input type="text" id="work-address" name="work-address" placeholder="Nhập địa chỉ cơ quan"></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="footer"></div>
</body>
</html>
