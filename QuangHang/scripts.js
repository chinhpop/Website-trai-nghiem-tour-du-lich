// scripts.js
document.addEventListener("DOMContentLoaded", (event) => {
  window.addEventListener("click", (event) => {
    if (!event.target.matches(".navigate-btn")) {
      const dropdowns = document.querySelectorAll(".dropdown-content");
      dropdowns.forEach((dropdown) => {
        dropdown.style.display = "none";
      });
    }
  });
});
