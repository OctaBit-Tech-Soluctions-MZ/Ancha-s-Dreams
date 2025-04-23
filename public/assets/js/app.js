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

document.addEventListener("DOMContentLoaded", function() {
    let video = document.getElementById("player");
    video.poster = video.getAttribute("data-poster");
});

if (window.innerWidth <= 500) {
    sidebar.classList.add("collapse"); // Esconder sidebar
}

const slideValue = document.querySelector(".sliderValue span");
  const inputSlider = document.querySelector(".range input");

  inputSlider.oninput = () => {
    let value = inputSlider.value;
    slideValue.textContent = value;

    // Porcentagem correta da posição do valor no slider
    let min = inputSlider.min;
    let max = inputSlider.max;
    let percent = ((value - min) / (max - min)) * 100;

    slideValue.style.left = `calc(${percent}% - 22px)`; // ajusta a posição do balão
    slideValue.classList.add("show");
  };

  inputSlider.onblur = () => {
    slideValue.classList.remove("show");
  };
