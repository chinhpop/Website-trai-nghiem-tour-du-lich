<?php 
    include "./Class/Contact.php";
    include "./Class/Region.php";
    include "./Class/Tour_Region.php";
    include "./Class/User.php";
    session_start();
?>

<?php 
    if (isset($_SESSION["ID_User"])) {
        if(isset($_POST["btn-edit"])){
            $id_user = $_SESSION["ID_User"];
            $password = $_POST["password"];
            $newPassword = $_POST["new-password"];
            $newUser = new User();
            $rs = $newUser->get_userByID($id_user);
            if ($rs) {
                $row = $rs->fetch_assoc();
                $oldPassword = $row["Password"];
                if ($oldPassword != $password && $oldPassword != "" || $newPassword!="") {
                    echo "<script>alert('Mật khẩu không khớp!');</script>";
                }
                $update = $newUser->update_pw($id_user, $newPassword);
                if ($update) {
                    //update session
                    $_SESSION["PASS"]=$newPassword;
                    echo "<script>alert('Update Thành Công!');</script>";
                }else{
                    echo "<script>alert('Update thất bại!');</script>";
                }
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
    .btn-edit {
        display: inline-block;
        margin-top: 10px;
        padding: 8px 15px;
        background-color: #007bff;
        text-decoration: none;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 14px;
    }

    .btn-edit:hover {
        background-color: #0056b3;
    }

    .error {
        color: red;
        font-size: 14px;
    }

    .success {
        color: green;
        font-size: 14px;
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
                    <li><a href="reservation.php">Đặt chỗ của tôi</a></li>
                    <li><a href="changeprofile.php">Thay đổi thông tin</a></li>
                    <li><a href="changepw.php" class="active">Đổi mật khẩu</a></li>
                    <li><a href="home_page.php">Đăng xuất</a></li>
                </ul>

            </div>
            <div class="info">
                <form action="changepw.php" method="post" id="passwordForm">
                    <div class="my-profile">
                        <ul>
                            <h4>Thay đổi mật khẩu </h4>
                            <li> <input type="password" id="password" name="password" placeholder="Mật khẩu cũ(*) ">
                            </li>
                            <li> <input type="password" id="new-password" name="new-password"
                                    placeholder="Mật khẩu mới(*)"></li>
                            <li> <input type="password" id="re-new-password" name="re-new-password"
                                    placeholder=" Xác nhận mật khẩu mới(*)">
                            </li>
                        </ul>
                        <input type="submit" class="btn-edit" id="btn-edit" style="color: #fff;"
                            value="Thay đổi"></input>
                        <p id="message"></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="footer"></div>
</body>
<script>
document.getElementById("passwordForm").addEventListener("submit", function(event) {
    event.preventDefault(); // Ngăn form gửi đi

    // Lấy giá trị của mật khẩu và xác nhận mật khẩu
    const password = document.getElementById("new-password").value;
    const confirmPassword = document.getElementById("re-new-password").value;
    const message = document.getElementById("message");

    // Kiểm tra mật khẩu
    if (password === confirmPassword) {
        message.textContent = "Mật khẩu khớp!";
        message.className = "success";
        this.submit(); //Gửi form
    } else {
        message.textContent = "Mật khẩu và xác nhận mật khẩu không khớp!";
        message.className = "error";
    }
});
</script>

</html>