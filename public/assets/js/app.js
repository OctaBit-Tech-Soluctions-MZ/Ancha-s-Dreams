// var sidebarToggleTop = document.querySelectorAll('.sidebarToggleTopPainel');

// window.onload = function() {
//     document.getElementById("loader").classList.add("hidden");
// };

function submitWithCheck(fieldId) {
    // Desmarca ambos primeiro
    document.getElementById('check').checked = false;
    document.getElementById('cancel').checked = false;

    // Marca o selecionado
    document.getElementById(fieldId).checked = true;

    // Submete o formulário
    document.getElementById('statusForm').submit();
}

const swiper = new Swiper('.swiper', {
  // Optional parameters
  direction: 'vertical',
  loop: true,

  // If we need pagination
  pagination: {
    el: '.swiper-pagination',
  },

  // Navigation arrows
  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  },

  // And if we need scrollbar
  scrollbar: {
    el: '.swiper-scrollbar',
  },
});


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

document.addEventListener('scroll', function () {
    const stickyNav = document.getElementById('stickyNav');
    if(stickyNav =! null){
        if (window.scrollY > 1500) { // depois de rolar 500px
            stickyNav.classList.remove('d-none');
            stickyNav.classList.add('fixed-bottom');
        } else {
            stickyNav.classList.add('d-none');
            stickyNav.classList.remove('fixed-bottom');
        }
    }
});

function show_video_form() {
    const switchInput = document.getElementById('introSwitch');
    const videoForm = document.getElementById('videoForm');
    videoForm.style.display = switchInput.checked ? 'block' : 'none'; 
}