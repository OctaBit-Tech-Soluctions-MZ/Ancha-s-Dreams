window.onload = function() {
    document.getElementById("loader").classList.add("hidden");
};

document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll(".set-bg").forEach(function (el) {
        let bg = el.getAttribute("data-setbg");
        if (bg) {
            el.style.backgroundImage = `url(${bg})`;
        }
    });
});

document.addEventListener("DOMContentLoaded", function() {
    let video = document.getElementById("player");
    video.poster = video.getAttribute("data-poster");
});

if (window.innerWidth <= 500) {
    sidebar.classList.add("collapse"); // Esconder sidebar
}