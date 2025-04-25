window.onload = function() {
    document.getElementById("loader").classList.add("hidden");
};

function submitWithCheck(fieldId) {
    // Desmarca ambos primeiro
    document.getElementById('check').checked = false;
    document.getElementById('cancel').checked = false;

    // Marca o selecionado
    document.getElementById(fieldId).checked = true;

    // Submete o formulário
    document.getElementById('statusForm').submit();
}

document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll(".set-bg").forEach(function (el) {
        let bg = el.getAttribute("data-setbg");
        if (bg) {
            el.style.backgroundImage = `url(${bg})`;
        }
    });
});

if (window.innerWidth <= 500) {
    sidebar.classList.add("collapse"); // Esconder sidebar
}