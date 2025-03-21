const menu = document.querySelector('.menu');
const toggle = document.querySelector('.menu-toggle');

toggle.addEventListener('click', () => {
  menu.classList.toggle('menu-open');
  toggle.classList.toggle('menu-toggle-open');
});
