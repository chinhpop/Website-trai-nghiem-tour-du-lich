$(document).ready(function () {
  // Khi di chuột vào "Tour trong nước"
  $(".mega-dropdown").hover(
    function () {
      $(".mega-dropdown-menu", this).stop(true, true).slideDown("400");
      $(this).find("a.dropdown-toggle").css("transition", "0.3s ease-in-out"); // Đ��i màu cam
      $(this).find("a.dropdown-toggle").css("color", "#ff5733"); // Đổi màu cam
      $(this).find("a.dropdown-toggle").css("text-decoration-color", "#ff5733");
    },
    function () {
      $(".mega-dropdown-menu", this).stop(true, true).slideUp("400");
      $(this).find("a.dropdown-toggle").css("color", ""); // Trở về màu gốc
      $(this).find("a.dropdown-toggle").css("text-decoration-color", "");
    }
  );
  $(".item-left-top-header").hover(
    function () {
      $(this).find("i").css("color", "orange");
      $(this).find("li").css("color", "orange");
    },
    function () {
      $(this).find("i").css("color", "");
      $(this).find("li").css("color", "");
    }
  );
});
