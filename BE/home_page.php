<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Web Tour</title>
    <link rel="stylesheet" href="./Assets/global.css" />
    <link rel="stylesheet" href="./Assets/Css/menu.css">
    <link rel="stylesheet" href="./Assets/Css/homepage.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <?php 
        include("./menu/menu.php");
    ?>
    <?php 
    if (isset($_SESSION["USER"]) && $_SESSION["PASS"]) {
        $user = $_SESSION["USER"];
        $pass = $_SESSION["PASS"];
        $newUser = new User();
        $rs = $newUser->get_user($user, $pass);
        if ($rs) {while($new = $rs->fetch_assoc()){
            $name = $new["FullName"];
            $id = $new["ID_User"];
        }}
        //Tạo session
        $_SESSION["NAME"] = $name;
        $_SESSION["ID_User"] = $id;

        // echo $_SESSION["NAME"];
        // echo $_SESSION["ID_User"];
    }
?>
    <footer>
        <p>&copy; 2024 Tour Finder</p>
    </footer>
</body>
<script src="./Assets/script.js"></script>

</html>