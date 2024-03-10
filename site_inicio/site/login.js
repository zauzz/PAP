
const signUpBtnLink = document.querySelector('.signUpBtn-link');
const wrapper = document.querySelector('.wrapper');
signUpBtnLink.addEventListener('click', () => {
    wrapper.classList.toggle('active');
});

document.addEventListener("DOMContentLoaded", function() {
    const signInBtnLink = document.querySelector('.signInBtn-link');
    signInBtnLink.addEventListener('click', function(event) {
      event.preventDefault(); // Impede o comportamento padrão do link (neste caso, redirecionar para "#")
      location.reload(); // Recarrega a página
    });
  });

window.onscroll = () => {
    navbar.classList.remove('active');
    searchForm.classList.remove('active');
    cartItem.classList.remove('active');
}






