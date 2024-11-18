// Lấy tất cả các bước
const steps = document.querySelectorAll(".step");
const stepContents = document.querySelectorAll(".step-content");
const nextButtons = document.querySelectorAll(".next-btn");
const prevButtons = document.querySelectorAll(".prev-btn");

// Hàm để hiển thị bước
function showStep(stepIndex) {
  // Ẩn tất cả các bước
  stepContents.forEach((content, index) => {
    if (index === stepIndex - 1) {
      content.classList.add("active");
    } else {
      content.classList.remove("active");
    }
  });

  // Cập nhật trạng thái của các bước trong thanh tiến trình
  steps.forEach((step, index) => {
    if (index < stepIndex) {
      step.classList.add("active");
    } else {
      step.classList.remove("active");
    }
  });
}

// Gắn sự kiện cho nút "Tiếp Tục"
nextButtons.forEach((button) => {
  button.addEventListener("click", () => {
    const nextStep = parseInt(button.getAttribute("data-next"));
    showStep(nextStep);
  });
});

// Gắn sự kiện cho nút "Quay Lại"
prevButtons.forEach((button) => {
  button.addEventListener("click", () => {
    const prevStep = parseInt(button.getAttribute("data-prev"));
    showStep(prevStep);
  });
});

// Hiển thị bước đầu tiên
showStep(1);
