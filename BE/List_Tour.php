<?php 
    include "Class/Tour.php";
    include "Class/FormatData.php";
    include "./Class/Region.php";
    include "./Class/Tour_Region.php";
    include "./Class/User.php";
    session_start();
?>

<?php 
        $id_tour = $_GET["id_TourRegion"];
        $tour_region = new Tour_Region();
        $rs  = $tour_region->get_tourName($id_tour);
        if ($rs){
            $row = $rs->fetch_assoc();
            $image = $row["image"];
        }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel Agency</title>
    <link rel="stylesheet" href="./Assets/Css/list-tour.css">
    <link rel="stylesheet" href="./Assets/Css/menu.css">
    <link rel="stylesheet" href="./Assets/global.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
    /* Header Image */
    .header-image {
        width: 100%;
        height: 350px;
        background-image: url("./Assets/Image/<?php echo $image ?>");
        background-position: center;
        background-size: cover;
        position: relative;
        display: flex;
        justify-content: center;
        align-items: center;
        margin-bottom: 30px;
    }

    .header-image h1 {
        color: white;
        font-size: 24px;
        font-weight: bold;
        text-transform: uppercase;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.6);
        position: relative;
        z-index: 2;
        padding-top: 100px;
        margin: 0;
    }

    .header-image::after {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.4);
        z-index: 1;
    }

    /* Tìm kiếm */
    .header-search {
        background-color: #ffffff;
        padding: 10px 20px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    h1 {
        margin: 0;
        font-size: 24px;
    }

    .search-bar {
        display: flex;
        gap: 10px;
        margin-top: 10px;
    }

    .search-bar input,
    .search-bar select,
    .search-bar button {
        padding: 10px;
        font-size: 16px;
    }

    .group-search {
        position: relative;
    }

    .group-search i {
        position: absolute;
        right: 5px;
        margin-top: 12px;
    }
    </style>
</head>

<body>
    <?php include "./menu/menu-login.php" ?>
    <div class="header-image">
        <div>
            <?php 
                $id_tour = $_GET["id_TourRegion"];
                $tour_region = new Tour_Region();
                $rs  = $tour_region->get_tourName($id_tour);
                if ($rs){
                    $row = $rs->fetch_assoc();
                    ?>

            <h1><?php echo $row["area"] ?></h1>
            <div class="line"></div>
            <?php
                }
            ?>
        </div>
    </div>
    <div class="header-search">
        <div class="search-bar">
            <div class="group-search">
                <input type="text" id="search" placeholder="Tìm kiếm tour:... " />
                <i class="fa-solid fa-magnifying-glass"></i>
            </div>
            <input type="text" placeholder="Từ ngày" />
            <input type="text" placeholder="Đến ngày" />
            <select>
                <option>Trong nước</option>
                <option>Nước ngoài</option>
            </select>
            <button>Tìm kiếm</button>
        </div>
    </div>
    <section id="packages">
        <?php 
            $db = new Tour();
            $detail_tour = $db -> get_tour($id_tour);
            if ($detail_tour) {while ($row = $detail_tour->fetch_assoc()) {
                ?>
        <div class="package" onclick="handleClick(<?php echo $row['ID_tour'] ?>, <?php echo $id_tour ?>)">
            <div class="package-img">
                <img src="<?php echo $row["image"] ?>" alt="<?php echo $row["TourName"] ?>">
                <div class="tour-price">Giá từ: <br> <?php echo formatCurrency($row["tour_price"]) ?></div>
            </div>
            <h2><?php echo $row["TourName"] ?></h2>
            <p>Thời gian: <?php echo $row["thoigian"] ?></p>
            <p><?php echo $row["start_location"] ." - ".$row["end_location"]?></p>
            <button>Book now</button>
        </div>
        <?php
            }}
        ?>
    </section>
    <footer>
        <p>&copy; 2024 Tour Finder</p>
    </footer>
</body>
<script src="./Assets/script.js"></script>

</html>

<script>
const tours = document.querySelectorAll(".package");

// Hàm lọc theo từ khóa
function filterTours(keyword) {
    tours.forEach((tour) => {
        const title = tour.querySelector("h2").innerText.toLowerCase();
        if (title.includes(keyword.toLowerCase())) {
            tour.style.display = "block";
        } else {
            tour.style.display = "none";
        }
    });
}

// Ví dụ sự kiện khi nhập từ khóa tìm kiếm
document
    .querySelector(".search-bar .group-search input")
    .addEventListener("input", (event) => {
        filterTours(event.target.value);
    });

function handleClick(id, id_TourRegion) {
    window.location.href = "detail.php?id=" + id + "&id_TourRegion=" + id_TourRegion;
}
</script>