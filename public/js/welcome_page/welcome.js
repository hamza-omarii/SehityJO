const icon = document.querySelector("#back-to-top");

window.onscroll = () => {
    if (window.scrollY > 500) {
        icon.style.visibility = "visible";
    } else {
        icon.style.visibility = "hidden";
    }
};

document.body.addEventListener("click", (e) => {
    if (e.target.classList.contains("back-to-top")) {
        window.scrollTo({
            top: 0,
            behavior: "smooth",
        });
    }
});
