document.addEventListener("DOMContentLoaded", function () {
  const steps = document.querySelectorAll(".step");
  const stepContents = document.querySelectorAll(".step-content");
  const nextBtns = document.querySelectorAll(".next-btn");
  const prevBtns = document.querySelectorAll(".prev-btn");

  // Hàm chuyển đổi bước
  function goToStep(step) {
    steps.forEach((s) => {
      if (parseInt(s.dataset.step) === step) {
        s.classList.add("active");
      } else {
        s.classList.remove("active");
      }
    });

    stepContents.forEach((content) => {
      if (parseInt(content.id.split("-")[1]) === step) {
        content.classList.add("active");
      } else {
        content.classList.remove("active");
      }
    });
  }

  // Sự kiện khi nhấn nút "Tiếp Tục"
  nextBtns.forEach((btn) => {
    btn.addEventListener("click", function () {
      const nextStep = parseInt(btn.dataset.next);
      goToStep(nextStep);
    });
  });

  // Sự kiện khi nhấn nút "Quay Lại"
  prevBtns.forEach((btn) => {
    btn.addEventListener("click", function () {
      const prevStep = parseInt(btn.dataset.prev);
      goToStep(prevStep);
    });
  });
});
