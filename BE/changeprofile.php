<?php 
    include "./Class/Contact.php";
    include "./Class/Region.php";
    include "./Class/Tour_Region.php";
    include "./Class/User.php";
    session_start();
?>

<?php 
    if (isset($_SESSION["ID_User"])) {
        if (isset($_POST["btn-save"])){
            $name = $_POST["name"];
            $phone = $_POST["phone"];
            $address = $_POST["address"];
            $email = $_POST["email"];
            $gender = $_POST["gender"];
            $dob = $_POST["brithday"];
            $id_user = $_SESSION["ID_User"];
            $user_update = new User();
            $rs = $user_update->update_user($id_user, $name, $gender, $email, $phone, $address, $dob);
            if ($rs) {
                echo "<script>alert('Cập nhật thành công!');</script>";
                header("Location: profile.php");
            }
            else{
                echo "<script>alert('Cập nhật không thành công!');</script>";
            }
        }
    }
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
    .btn-save {
        display: inline-block;
        margin-top: 30px;
        margin-right: 500px;
        padding: 8px 15px;
        background-color: #007bff;
        text-decoration: none;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 14px;
    }

    .btn-save:hover {
        background-color: #0056b3;
    }
    </style>
    <link rel="stylesheet" href="./Assets/Css/profile.css">
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
                    <li><a href="reservation.php">Đặt chỗ của tôi</a></li>
                    <li><a href="changeprofile.php" class="active">Thay đổi thông tin</a></li>
                    <li><a href="changepw.php">Đổi mật khẩu</a></li>
                    <li><a href="">Đăng xuất</a></li>
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
            <form action="changeprofile.php" method="post">
                <div class="info">
                    <div class="my-profile">
                        <ul>
                            <h4>Thông tin cá nhân </h4>
                            <li> <input type="text" id="name" name="name" placeholder="Nhập họ tên"
                                    value="<?php echo $row["FullName"] ?>"></li>
                            <li> <input type="email" id="email" name="email" placeholder="Nhập email"
                                    value="<?php echo $row["Email"] ?>"></li>
                            <li> <input type="tel" id="phone" name="phone" placeholder="Nhập số điện thoại"
                                    value="<?php echo $row["Phone"] ?>"></li>
                            <li><select id="gender" name="gender">
                                    <option value="Nam" <?php if ($row["gender"] == "Nam") echo "selected"  ?>>Nam
                                    </option>
                                    <option value="Nữ" <?php if ($row["gender"] == "Nữ") echo "selected"  ?>>Nữ
                                    </option>
                                </select></li>
                            <li><input type="date" id="brithday" name="brithday" placeholder="Ngày sinh (dd/mm/yyyy)"
                                    value="<?php echo $row["DOB"] ?>"></li>
                        </ul>
                    </div>
                    <div class="contact">
                        <ul>
                            <h4>Liên hệ </h4>
                            <li> <input type="text" id="address" name="address" placeholder="Nhập địa chỉ"
                                    value="<?php echo $row["Address"] ?>"></li>
                            <li> <input type="text" id="title" name="title" placeholder="Nhập chức danh"></li>
                            <li> <input type="text" id="work-address" name="work-address"
                                    placeholder="Nhập địa chỉ cơ quan"></li>
                        </ul>
                    </div>
                    <input type="submit" class="btn-save" name="btn-save" style="color: #fff;" value="Save"></input>
                </div>

            </form>
            <?php
                    }
                }
            ?>
        </div>
    </div>
    <div class="footer"></div>
</body>

</html>