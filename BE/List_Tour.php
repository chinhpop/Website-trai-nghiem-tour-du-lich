<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel Agency</title>
    <link rel="stylesheet" href="./Assets/Css/list-tour.css">
    <link rel="stylesheet" href="./Assets/Css/menu.css">
    <link rel="stylesheet" href="./Assets/global.css">

</head>

<?php 
    include "Class/Tour.php";
    include "Class/FormatData.php"
?>

<body>
    <?php 
        include "./menu/menu.php";
    ?>
    <section id="packages">
        <?php 
            $db = new Tour();
            $detail_tour = $db -> show_tour();
            if ($detail_tour) {while ($row = $detail_tour->fetch_assoc()) {
                ?>
        <div class="package" onclick="handleClick(<?php echo $row['ID_tour'] ?>)">
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

</html>

<script type="text/javascript">
function handleClick(id) {
    window.location.href = "detail_tour.php?id=" + id;
}
</script>