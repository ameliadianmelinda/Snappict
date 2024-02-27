document.addEventListener("DOMContentLoaded", () => {
  const dropdowns = document.querySelectorAll(".dropdown");

  dropdowns.forEach((dropdown) => {
    const dropbtn = dropdown.querySelector(".dropbtn");

    dropbtn.addEventListener("click", (event) => {
      event.stopPropagation();
      dropdown.classList.toggle("active");
    });
  });

  document.addEventListener("click", (event) => {
    dropdowns.forEach((dropdown) => {
      if (!dropdown.contains(event.target)) {
        dropdown.classList.remove("active");
      }
    });
  });
});
