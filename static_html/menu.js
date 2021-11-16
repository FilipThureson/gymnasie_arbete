const hamburger = document.querySelector(".hamburger");
const navLinks = document.querySelector("#nav-links");
const links = document.querySelectorAll("#nav-links li");
const icon = document.querySelector("#icon");

hamburger.addEventListener("click", () => {
  navLinks.classList.toggle("open");
  links.forEach(link => {
    link.classList.toggle("fade");
  });
 
    icon.classList.toggle("icon");
  
});