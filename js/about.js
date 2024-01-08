document.getElementById("leftBtn").addEventListener("click", function () {
  document.getElementById("scrollableDiv").scrollLeft -= 300;
});

document.getElementById("rightBtn").addEventListener("click", function () {
  document.getElementById("scrollableDiv").scrollLeft += 300;
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
    duration: 1,
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
