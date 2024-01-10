gsap.registerPlugin(ScrollTrigger);

const sections = [
  ".hero",
  ".info-component",
  ".mission-component",
  ".vision-component",
];

sections.forEach((section) => {
  gsap.from(section, {
    scrollTrigger: {
      trigger: section,
      start: "top 80%",
      end: "bottom top",
      toggleActions: "play none none none",
    },
    opacity: 0,
    duration: 0.7,
  });
});

document.addEventListener("DOMContentLoaded", function () {
  let menuButton = document.getElementById("mobile-menu");
  let menuItems = document.getElementById("drop-items");

  let tabletBreakpoint = 768;

  function adjustMenuDisplay() {
    if (window.innerWidth <= tabletBreakpoint) {
      menuItems.style.display = "none";
    }
  }

  window.addEventListener("resize", adjustMenuDisplay);

  menuButton.addEventListener("click", function () {
    menuItems.style.display =
      menuItems.style.display === "block" ? "none" : "block";
  });

  if (menuButton.style.display === "none") {
    menuItems.style.display = "none";
  }
});
