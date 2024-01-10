document.getElementById("leftBtn").addEventListener("click", function () {
  document.getElementById("scrollableDiv").scrollLeft -= 100;
});

document.getElementById("rightBtn").addEventListener("click", function () {
  document.getElementById("scrollableDiv").scrollLeft += 100;
});

gsap.registerPlugin(ScrollTrigger);

const components = [
  ".hero-title",
  ".who-image",
  ".who-are-we",
  ".who-component",
  ".mission-component",
  ".phil-component",
  ".message-component",
  ".hiring-component",
];

components.forEach((component) => {
  gsap.from(component, {
    scrollTrigger: {
      trigger: component,
      start: "top 80%",
      end: "bottom top",
      toggleActions: "play none none none",
    },
    opacity: 0,
    duration: 0.7,
  });
});

const philTimeline = gsap.timeline({
  scrollTrigger: {
    trigger: ".phil-component",
    start: "top center",
    end: "bottom top",
    toggleActions: "play none none none",
  },
});

document.querySelectorAll(".phil-items").forEach((item, i) => {
  philTimeline.from(
    item,
    {
      x: -200,
      opacity: 0,
      duration: 0.5,
      stagger: 0.5,
    },
    "-=0.4"
  );
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
