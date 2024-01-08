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
    duration: 1,
  });
});
