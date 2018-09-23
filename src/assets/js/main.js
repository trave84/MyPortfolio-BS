document.addEventListener('DOMContentLoaded', () => {
  const current = document.getElementById('current-item');current.addEventListener('click', function() {
    current.parentNode.classList.toggle('exp');
  });

  const menu = document.getElementById('menu');
  menu.addEventListener('mouseleave', function() {
    menu.classList.remove('exp');
  });
});