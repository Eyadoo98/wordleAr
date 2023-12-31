const moon = document.querySelector("#moon");
const body = document.querySelector("body");

moon.addEventListener("click", () => {
    body.classList.toggle("dark");
});