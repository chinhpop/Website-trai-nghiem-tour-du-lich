<!DOCTYPE html>
<html lang="en">

<?php include "Class/Tour.php" ?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Du Lịch Bản Giốc - Pác Bó - Ba Bể - Thái Nguyên</title>
    <link rel="stylesheet" href="./Assets/Css/detail-tour.css" />
    <script>
    // JavaScript to handle tab switching
    function openTab(event, tabName) {
        const tabs = document.querySelectorAll('.tab');
        const contents = document.querySelectorAll('.tab-content');

        // Remove active class from all tabs and hide content
        tabs.forEach(tab => tab.classList.remove('active'));
        contents.forEach(content => content.classList.remove('active'));

        // Add active class to clicked tab and show corresponding content
        event.currentTarget.classList.add('active');
        document.getElementById(tabName).classList.add('active');
    }

    // Default to open the first tab
    document.addEventListener('DOMContentLoaded', () => {
        document.querySelector('.tab').click();
    });
    </script>
</head>

<body>

    <!-- Header -->
    <header>
        <div class="contact-info">
            <span>Email: info@saigontourist.net</span> | <span>Hotline: 1900 1808</span>
        </div>
        <nav>
            <ul>
                <li><a href="#">Trang Chủ</a></li>
                <li><a href="#">Tour Trong Nước</a></li>
                <li><a href="#">Dịch Vụ Du Lịch</a></li>
                <li><a href="#">Liên Hệ</a></li>
            </ul>
        </nav>
    </header>

    <?php 
        $db = new Tour();
        $detail_tour = $db->show_tour();
        if ( $detail_tour ) {while ( $row = $detail_tour->fetch_assoc()){

        
    ?>
    <section class="banner">
        <h1> <?php echo $row["TourName"]; ?></h1>
    </section>

    <!-- Tour Details -->
    <div class="tour-details">
        <div class="tour-image">
            <img src="https://f.hoatieu.vn/data/image/2023/02/10/viet-doan-van-ngan-cam-nhan-ve-bai-tho-tuc-canh-pac-bo.jpg"
                alt="Tour Image">
        </div>
        <div class="tour-info">
            <h2 class="tour-title"><?php echo $row["TourName"]; ?></h2>
            <p class="tour-location"><?php echo $row["location"]; ?></p>
            <p>Thời gian: <?php echo $row["thoigian"]; ?></p>
            <p>Phương tiện: <?php echo $row["phuongtien"]; ?></p>
            <p>Khởi hành <?php echo $row["start_time"]; ?></p>
            <div class="tour-price">Giá từ 9.439.000 VND</div>
            <a href="#" class="btn-book">Đặt Tour Ngay</a>
        </div>
    </div>
    <?php }} ?>
    <!-- New Table Section -->
    <table class="tour-table">
        <thead>
            <tr>
                <th>Khởi Hành</th>
                <th>Mã Tour</th>
                <th>Giá</th>
                <th>Giá Trẻ Em</th>
                <th>Giá Em Bé</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>09/11/2024</td>
                <td>STN084-2024-03163</td>
                <td>9.439.000 VND</td>
                <td>6.700.000 VND</td>
                <td>4.000.000 VND</td>
                <td><button class="btn-buy">Mua Online</button></td>
            </tr>
            <tr>
                <td>23/11/2024</td>
                <td>STN084-2024-03164</td>
                <td>9.439.000 VND</td>
                <td>6.700.000 VND</td>
                <td>4.000.000 VND</td>
                <td><button class="btn-buy">Mua Online</button></td>
            </tr>
            <tr>
                <td>07/12/2024</td>
                <td>STN084-2024-03165</td>
                <td>9.439.000 VND</td>
                <td>6.700.000 VND</td>
                <td>4.000.000 VND</td>
                <td><button class="btn-buy">Mua Online</button></td>
            </tr>
            <tr>
                <td>21/12/2024</td>
                <td>STN084-2024-03166</td>
                <td>9.439.000 VND</td>
                <td>6.700.000 VND</td>
                <td>4.000.000 VND</td>
                <td><button class="btn-buy">Mua Online</button></td>
            </tr>
        </tbody>
    </table>
    <div class="tab-container">
        <div class="tabs">
            <div class="tab active" onclick="openTab(event, 'chuong-trinh')">Chương trình Tour</div>
            <div class="tab" onclick="openTab(event, 'chinh-sach')">Chính sách Tour</div>
            <div class="tab" onclick="openTab(event, 'thu-tuc')">Thủ tục & Visa</div>
        </div>
        <div id="chuong-trinh" class="tab-content active">

            <p>Ngày 1: TP. HCM – HÀ NỘI – CAO BẰNG – BẢN GIỐC (Ăn trưa, chiều)<br>
                Hướng dẫn viên Lữ hành Saigontourist đón quý khách và hỗ trợ làm thủ tục. Khởi hành ra Hà Nội trên
                chuyến bay VN206 lúc 06h00. <br>
                Đáp xuống sân bay Nội Bài, xe đón đoàn khởi hành đi Cao Bằng di chuyển vào thác Bản Giốc nhận phòng.
                Nghỉ đêm tại khách sạn Sài Gòn – Bản Giốc 4*. <br></p>
            <p>Ngày 2: BẢN GIỐC – KHU DI TÍCH PÁC BÓ – CAO BẰNG (Ăn sáng, trưa, chiều)<br>
                Buổi sáng, đoàn đến chiêm ngưỡng cảnh sắc đầy hùng vĩ và thơ mộng của thác Bản Giốc – một trong bốn thác
                nước là đường biên giới tự nhiên giữa các quốc gia lớn nhất thế giới, quý khách tự do trải nghiệm đi bè
                tre ngắm cận cảnh thác (tự túc chi phí). <br>
                Tiếp tục đến Động Ngườm Ngao khám phá vẻ đẹp lung linh của một hang động đá vôi còn nguyên sơ.<br>
                Đoàn khởi hành vào khu di tích Pác Bó – nơi chủ tịch Hồ Chí Minh từng sống, làm việc và lãnh đạo Cách
                mạng trong suốt những năm tháng ở chiến khu Việt Bắc. <br>
                Tham quan suối Lê Nin, núi Các Mác, hang Cốc Bó, bàn đá lịch sử. Viếng mộ anh Kim Đồng. Nghỉ đêm tại Cao
                Bằng.</p>
            <p>Ngày 3: CAO BẰNG – BA BỂ(Ăn sáng, trưa, chiều)<br>
                Đoàn khởi hành về Bắc Kạn, khám phá Vườn Quốc Gia Ba Bể, quý khách lên thuyền du ngoạn dọc theo dòng
                sông Năng, ngắm nhìn cảnh quan và đời sống của người dân tộc Tày, Nùng ở đôi bờ. <br>
                Tham quan động Puông. Đến hồ Ba Bể - viên ngọc trong xanh giữa núi rừng Đông Bắc, thưởng ngoạn phong
                cảnh của một trong 100 hồ nước ngọt đẹp nhất toàn cầu. Tham quan đảo An Mã. Nghỉ đêm tại KS Sài Gòn – Ba
                Bể 3*. <br></p>

            <p>Ngày 4: BA BỂ - THÁI NGUYÊN – TPHCM (Ăn sáng, trưa)<br>
                Buổi sáng, đoàn trả phòng. Khởi hành về Hà Nội. Trên đường đến Thái Nguyên, đoàn dừng chân tham quan Bảo
                tàng văn hóa các dân tộc Việt Nam. <br>
                Ra sân bay Nội Bài để về TPHCM trên chuyến bay VN259 lúc 18h00. Kết thúc chương trình. <br></p>
        </div>
        <div id="chinh-sach" class="tab-content">

            <p>* Vé trẻ em: <br>
                - Trẻ em dưới 2 tuổi: thu 500.000đ/ trẻ. Gia đình tự lo cho bé ăn ngủ<br>
                - Trẻ em từ 2 đến dưới 6 tuổi: : tiêu chuẩn gồm Vé máy bay. Gia đình tự lo cho bé ăn ngủ và phí tham
                quan Hai người lớn chỉ được kèm một trẻ em dưới 6 tuổi. Từ trẻ thứ 2 trở lên, mỗi em đóng bằng giá
                trẻ em từ 6-11 tuổi<br>
                - Trẻ em từ 6 - 11 tuổi: tiêu chuẩn gồm Vé máy bay, ăn uống và tham quan theo chương trình, ngủ chung
                giường với phụ huynh<br>
                - Trẻ em trên 11 tuổi: áp dụng giá và các tiêu chuẩn dịch vụ như người lớn<br>

                * Giá tour bao gồm: <br>
                - Vé máy bay khứ hồi của Vietnam Airlines. <br>
                - Chi phí xe máy lạnh phục vụ theo chương trình.<br>
                - Chi phí khách sạn theo tiêu chuẩn 2 khách/phòng. Lẻ khách ngủ giường phụ hoặc chịu chi phí phụ thu
                phòng đơn:<br>
                - Chi phí ăn – uống theo chương trình.<br>
                - Phí tham quan theo chương trình<br>
                - Chi phí Hướng dẫn viên tiếng Việt.<br>
                * Quà tặng: Nón, nước suối, khăn lạnh<br>

                * Giá tour không bao gồm: <br>
                - Chi phí tham quan - ăn uống ngoài chương trình, giặt ủi, điện thoại và các chi phí cá nhân khác.<br>
                - Chi phí phụ thu phòng đơn: <br>


                THÔNG TIN HƯỚNG DẪN<br>
                * Quy định vé máy bay: Đây là chương trình hợp tác với hãng hàng không Vietnam Airlines nên có một số
                lưu ý:<br>
                - Giá vé máy bay không bao gồm suất ăn/uống trên máy bay.<br>
                - Không được hoàn hoặc hủy vé máy bay. Nếu hủy, vui lòng chịu phạt 100% chi phí vé máy bay.<br>
                - Khi đăng ký vé máy bay, quý khách cung cấp họ và tên, ngày tháng năm sinh (đúng từng ký tự ghi trong
                hộ chiếu hoặc Chứng Minh Nhân Dân).<br>
                - Không được thay đổi thông tin đặt chỗ: họ tên hành khách, chuyến bay, ngày bay, chặng bay, tách đoàn,
                gia hạn vé. <br>
                - Số lượng khách tối thiểu để tổ chức tour: 10 khách/đoàn. <br>
                - Du khách được miễn cước 1 KIỆN (23 kg) hành lý ký gởi và 1 KIỆN (10kg) hành lý xách tay<br>
                - Trường hợp hủy tour do sự cố khách quan như thiên tai, dịch bệnh hoặc do máy bay hoãn - hủy chuyến, Lữ
                hành Saigontourist sẽ không chịu trách nhiệm bồi thường thêm bất kỳ chi phí nào khác ngoài việc hoàn trả
                chi phí những dịch vụ chưa được sử dụng của tour đó (ngoại trừ chi phí vé máy bay)<br>
                * Trường hợp hủy vé landtour, quý khách vui lòng thanh toán các khoản sau:<br>
                - Quý khách chuyển đổi tour sang ngày khác và báo trước ngày khởi hành trước 15 ngày sẽ không chịu phí
                (không áp dụng các tour KS 4-5 sao), nếu trễ hơn sẽ căn cứ theo qui định hủy phạt phía dưới và chỉ được
                chuyển ngày khởi hành tour 1 lần.<br>
                - Hủy vé trong vòng 24 giờ hoặc ngay ngày khởi hành, chịu phạt 100% tiền tour.<br>
                - Hủy vé trước ngày khởi hành từ 2 - 7 ngày, chịu phạt 80% tiền tour.<br>
                - Hủy vé trước ngày khởi hành từ 8 - 14 ngày, chịu phạt 50% tiền tour.<br>
                - Hủy vé trước ngày khởi hành từ 15 ngày trở lên, chịu phạt 30% tiền tour.<br>
                - Sau khi hủy tour, du khách vui lòng đến nhận tiền trong vòng 15 ngày kể từ ngày kết thúc tour. Chúng
                tôi chỉ thanh toán trong khỏang thời gian nói trên.<br>
                * Hành lý và giấy tờ tùy thân: <br>
                - Du khách mang theo giấy Chứng Minh Nhân Dân / Căn Cước Công Dân hoặc Hộ chiếu (còn thời hạn sử dụng).
                Đối với du khách là Việt kiều, Quốc tế nhập cảnh Việt Nam bằng visa rời, vui lòng mang theo visa khi
                đăng ký và khi đi tour.<br>
                - Khách lớn tuổi (từ 70 tuổi trở lên), khách tàn tật tham gia tour, phải có thân nhân đi kèm và cam kết
                đảm bảo đủ sức khỏe khi tham gia tour du lịch.<br>
                - Trẻ em dưới 14 tuổi khi đi tour phải mang theo giấy khai sinh hoặc hộ chiếu. Trẻ em từ 14 tuổi trở lên
                phải mang theo giấy Chứng Minh Nhân Dân.<br>
                - Tất cả giấy tờ tùy thân mang theo đều phải bản chính. <br>
                - Du khách mang theo hành lý gọn nhẹ và phải tự bảo quản hành lý, tiền bạc, tư trang trong suốt thời
                gian đi du lịch. Du khách được miễn cước 1 KIỆN hành lý ký gởi (23kg) và 1 KIỆN hành lý xách tay (10kg).
                <br>
                - Khách Việt Nam ở cùng phòng với khách Quốc tế hoặc Việt kiều yêu cầu phải có giấy hôn thú.<br>
                - Quý khách có mặt tại sân bay trước 3 tiếng so với giờ khởi hành.<br>

                * Ghi chú khác:<br>
                - Công ty xuất hóa đơn cho du khách có nhu cầu (Trong thời hạn 7 ngày sau khi kết thúc chương trình du
                lịch). Du khách được chọn một trong những chương trình khuyến mãi dành cho khách lẻ định kỳ (Nếu
                có).<br>
                - Quý khách có mặt tại điểm đón trước 15 phút. Trong trường hợp đến trễ khi xe đã khởi hành; Không làm
                thủ tục đúng giờ (khi hãng hàng không đã đóng quầy, kết thúc chấp nhận hành khách); Không lên máy bay
                trước giờ đóng cửa lên máy bay, hoặc hủy tour không báo trước vui lòng chịu phí như ‘hủy vé ngay ngày
                khởi hành
            </p>
        </div>
        <div id="thu-tuc" class="tab-content">

            <p>1/ Thời gian nào đẹp nhất để đi tour Đông Bắc?<br>
                Mùa lúa chín tại Hoàng Su Phì, Xín Mần (Hà Giang) thì nên đến vào tháng 9-10, các giai đoạn còn lại cũng
                rất đẹp (tháng 2-3 mùa nước đổ, tháng 7-8 mùa lúa xanh rì), còn đến Hà Giang (vùng Quản Bạ, Đồng Văn,
                Mèo Vạc) vào tháng 10- 11 thì bạn sẽ ngất ngây với mùa hoa Tam Giác Mạch trên cao nguyên, màu hồng phớt
                của hoa rất đẹp khi nắng lên. Mùa xuân vào tháng 1 – 3 là mùa hoa đào, hoa mận nở bạt ngàn<br>

                2/ Tour Hà Giang có đi xe du lịch 45 chỗ được không?<br>
                Tuyến này đi đường đồi núi nên chỉ đi được xe 29C County, không có hầm, Lữ hành Saigontourist chỉ nhận
                tối đa 18 khách trên xe.<br>

                3/ Tôi có thể đi Hà Giang 3 ngày từ Hồ Chí Minh không?<br>
                Vì khoảng cách từ Hà Nội đi Hà Giang hơi xa và để tham quan hết các nơi đặc trưng thì 3 ngày 2 đêm là
                hoàn toàn không đủ thời gian.<br>

                4/ Tour Hà Giang có phần phụ thu khách mang quốc tịch nước ngoài, vậy chi phí này là gì?<br>
                Đây là chi phí cấp giấy phép đi lại ở khu vực biên giới theo quy định của tỉnh Hà Giang. Dù khách là
                Việt Kiều nhưng mang quốc tịch nước ngoài (sử dụng passport// hộ chiếu nước ngoài) thì vẫn phải đóng phí
                này.<br>

                5/ Tour đi Đông Bắc của Lữ hành Saigontourist có được trải nghiệm đi thuyền trên sông Nho Quế không?<br>
                Hiện tại với tour Đông Bắc, Lữ hành Saigontourist sẽ dừng lại để quý khách chiêm ngưỡng cảnh quan của
                dòng Nho Quế.
                Do đường xuống sông chưa xây dựng kiên cố (là một đường mòn, gập gềnh, nhiều dốc) cho nên sẽ tùy tình
                hình từng cụ thể từng đoàn để bố trí cho phù hợp (phần chi phí này thường sẽ không bao gồm trong giá
                tour).<br>

                6/ Tôi muốn đi tour đến Hà Giang và Sapa chung có được không?<br>
                Do Sapa thuộc khu vực Tây Bắc, Hà Giang thuộc vùng Đông Bắc, hai điểm đến này không cùng một cung đường.
                Muốn đi cả Sapa và Hà Giang sẽ cần nhiều thời gian hơn, nên Lữ hành Saigontourist chưa có tour ghép đoàn
                mà sẽ thực hiện theo yêu cầu của quý khách với tuyến Đông Tây Bắc kết hợp.<br>

                7/ Tôi cần lưu ý gì khi đi tham quan Đông Bắc?<br>
                Vì cung đường là đồi núi nên thời gian di chuyển và ngồi xe khá lâu nên quý khách là người lớn tuồi hoặc
                có bệnh về xương khớp nên cân nhắc khi tham gia tour. Và thông thường nên có người thân dưới 60 tuổi đi
                kèm nếu quý khách từ 70 tuổi trở lên<br>

                8/ Các món ăn đặc trưng nào tôi có thể thử khi đến Hà Giang?<br>
                Hà Giang có nhiều món ăn rất hấp dẫn như cháo ấu tẩu, bánh cuốn trứng, xôi ngũ sắc, thắng cố, thịt bò –
                trâu gác bếp, rượu ngô, …<br>

                9/ Hà Giang mùa Tết có lạnh không?<br>
                Nhiệt độ trung bình nơi đây chỉ khoảng từ 20 - 25 độ C vào ban ngày. Ban đêm nhiệt độ hạ xuống thấp,
                khoảng từ 10 - 15 độ C (tùy thực tế từng năm)<br>

                10/ Tôi muốn ngủ đêm tại khách sạn 5 sao ở tour Hà Giang không?<br>
                Vì Hà Giang thuộc vùng núi phía Bắc nên hiện tại chỉ có duy nhất 1 khách sạn 4 sao.<br>

                11/ Các khách sạn trong tour có tốt không?<br>
                Mặc dù là khu vực vùng núi có ít dịch vụ nhưng Lữ hành Saigontourist luôn đặt các khách sạn đủ chuẩn
                phục vụ cho quý khách<br>

                12/ Lữ hành Saigontourist có tour nào có thể ngắm được hoa tam giác mạch và ruộng bậc thang vào mùa lúa
                chín không?<br>
                Có, đó là hành trình đi có Hà Giang và Hoàng Su Phì vào khoảng tháng 9 nhưng ruộng bậc thang ở khu vực
                này sẽ không hùng vỹ như khu vực Tây Bắc và thời điểm này thì hoa tam giác mạch chưa vào mùa rộ. (Mùa
                lúa và hoa sẽ tùy thuộc vào thời tiết của từng năm)<br>

                13/ Tôi muốn đi hết khu vực Đông Bắc thì mất bao lâu?<br>
                Với hành trình 5 ngày 4 đêm, quý khách có thể tham quan được hết các điểm nổi bật của vùng Đông Bắc: Hà
                Giang, Cao Bằng, Bắc Kạn, Lạng Sơn, Thái Nguyên với các địa danh nổi tiếng: Thác Bản Giốc, Hồ Ba Bể,
                ...<br>

                14/ Đến Đông Bắc nên thử món gì?<br>
                Khi đến với khu vực này quý khách đừng ngần ngại thưởng thức ngay một bát thắng dền hay một đĩa bánh
                cuốn trứng hoặc một mâm xôi ngũ sắc thơm lừng. Ngoài ra, còn có 1 số đặc sản khác: cháo ấu tẩu, thắng
                cố, rêu nướng, ...<br>

                15/ Đến Đông Bắc mua gì làm quà?<br>
                Đến Bắc Kạn, quý khách có thể mua miếng Dong Na Rì, lạp xưởng hun khói, thịt heo gác bếp.<br>
                Cao Bằng thì nổi tiếng với hạt dẻ Trùng Khánh.<br>
                Hà Giang có rất nhiều đặc sản đặc trưng của vùng núi mà Quý khách có thể mua về làm quà: rượu ngô, bánh
                tam giác mạch, thịt lợn, trâu gác bếp, chè San Tuyết, …</p>
        </div>
    </div>
    <footer>
        <p>&copy; 2024 Saigontourist | All Rights Reserved</p>
    </footer>

</body>

</html>