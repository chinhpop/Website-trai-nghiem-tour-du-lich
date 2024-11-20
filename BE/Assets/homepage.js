let slideIndex = 0; // Chỉ số slide hiện tại
const slidesToShow = 3; // Số lượng slide hiển thị cùng một lúc

// Hiển thị slide đầu tiên
showSlides(slideIndex);

// Chuyển slide theo hướng
function changeSlide(n) {
  showSlides((slideIndex += n));
}

// Chuyển đến slide cụ thể
function currentSlide(n) {
  slideIndex = n * slidesToShow; // Cập nhật slideIndex với chỉ số của dot
  showSlides(slideIndex);
}

function showSlides(n) {
  const slides = document.querySelectorAll(".slide");
  const dots = document.querySelectorAll(".dot");

  // Tính toán lại chỉ số slide
  if (n >= slides.length) slideIndex = 0;
  if (n < 0) slideIndex = slides.length - (slides.length % slidesToShow); // Đảm bảo không âm

  // Ẩn tất cả các slide
  slides.forEach((slide) => {
    slide.style.display = "none"; // Ẩn slide
  });
  dots.forEach((dot) => dot.classList.remove("active"));

  // Hiển thị 3 slide đồng thời
  for (let i = 0; i < slidesToShow; i++) {
    const current = (slideIndex + i) % slides.length; // Lặp lại khi vượt qua giới hạn
    if (slides[current]) {
      slides[current].style.display = "block"; // Hiển thị slide
    }
  }

  // Kích hoạt dot tương ứng với slide đầu tiên trong nhóm 3 slide
  const activeDotIndex = Math.floor(slideIndex / slidesToShow); // Tính toán chỉ số dot tương ứng
  if (dots[activeDotIndex]) {
    dots[activeDotIndex].classList.add("active");
  }
}

// Tự động chuyển slide sau mỗi 5 giây
setInterval(() => changeSlide(1), 5000);
