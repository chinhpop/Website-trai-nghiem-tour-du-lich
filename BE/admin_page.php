<?php
// Kết nối cơ sở dữ liệu
include "./Class/Payment.php";
include "./Class/User.php";
session_start();
?>

<?php 
    // Lấy danh sách thanh toán
    if (isset($_POST["approve"])){
        $id_payment = $_POST["id_payment"];
        $status = 1;
        $payment = new Payment();
        $rs = $payment->update_payment($status, $id_payment);
        if ($rs){
            echo "<script>alert('Duyệt thành công'".$id_payment.")</script>";
        }
        else{
            echo "<script>alert('Duyệt không thành công')</script>";
        }
    }
    if (isset($_POST["delete"])){
        $id_payment = $_POST["id_payment"];
        $payment = new Payment();
        $rs = $payment->delete_payment( $id_payment);
        if ($rs){
            echo "<script>alert('Xóa thành công')</script>";
        }else{
            echo "<script>alert('Xóa không thành công')</script>";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./Assets/global.css">
    <link rel="stylesheet" href="./Assets/css/admin.css">
    <link rel="stylesheet" href="./Assets/Css/menu-login.css">
    <title>Admin - Duyệt Thanh Toán</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <div id="top-header" class="top-header">
        <div class="left-top-header">
            <div class="item-left-top-header">
                <i class="fa-solid fa-envelope"></i>
                <li>info@saigontourist.net</li>
            </div>
            <div class="item-left-top-header">
                <i class="fa-solid fa-phone"></i>
                <li>Hotline: 1900 1808</li>
            </div>
        </div>
        <div class="right-top-header">
            <div class="item-left-top-header">
                <i class="fa-solid fa-location-dot"></i>
                <li>Chọn điểm khởi hành</li>
            </div>
            <?php
                        if (isset($_SESSION["USER"])) {
                            $user = $_SESSION["USER"];
                            $pass = $_SESSION["PASS"];
                            $newUser = new User();
                            $rs = $newUser->get_user($user, $pass);
                            if ($rs) {while($new = $rs->fetch_assoc()){
                                $name = $new["FullName"];
                                $id = $new["ID_User"];
                            }}
                            ?>
            <div class="item-left-top-header">
                <span class="info"><a href="#">Xin Chào, <?php echo $name ?></a></span>
                <span class="exit"><a href="./loggout.php">Đăng xuất</a></span>
            </div>
            <?php
                        }else{
                            ?>
            <div class="item-left-top-header">
                <i class="fa-solid fa-right-to-bracket"></i>
                <li><a href="./login.php" class="login">Đăng nhập</a></li>
            </div>
            <?php
                        }
                    ?>
        </div>
    </div>

    <h1 style="font-size: 24px; margin-top: 20px;">Quản lý thanh toán</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên Tour</th>
                <th>Ngày Đặt</th>
                <th>Số trẻ em</th>
                <th>Số em bé</th>
                <th>Tổng tiền</th>
                <th>Phương thức thanh toán</th>
                <th>Trạng thái</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $admin = new Payment();
            $result = $admin->show_payment();
            if ($result) {
                while ($row = $result->fetch_assoc()) {
                    ?>
            <tr>
                <td><?php echo $row['ID_payment']; ?></td>
                <td><?php echo $row['ID_CodeTour']; ?></td>
                <td><?php echo $row['Date']; ?></td>
                <td><?php echo $row['tong']; ?></td>
                <td><?php echo number_format($row['price_sum'], 0, ',', '.'); ?> VND</td>
                <td>Chuyển Khoản</td>
                <td><?php echo $row['status'] == 1 ? 'Đã duyệt' : 'Chưa duyệt'; ?></td>
                <td>
                    <?php if ($row['status'] == 0) { ?>
                    <form action="admin_page.php" method="post" style="display: inline-block;">
                        <input type="hidden" name="id_payment" id="id_payment"
                            value="<?php echo $row['ID_payment']; ?>">
                        <button type="submit" name="approve" id="approve" class="btn btn-approve">Duyệt</button>
                    </form>
                    <?php } ?>
                    <form action="admin_page.php" method="POST" style="display: inline-block;">
                        <input type="hidden" name="id_payment" value="<?php echo $row['ID_payment']; ?>">
                        <button type="submit" name="delete" id="delete" class="btn btn-delete">Xóa</button>
                    </form>
                </td>
            </tr>
            <?php
                }
            } else {
                echo "<tr><td colspan='9'>Không có thanh toán nào.</td></tr>";
            }
            ?>
        </tbody>
    </table>
</body>

</html>