const toggle = document.getElementById('menutoggle');
  const nav = document.querySelector('nav ul');

  toggle.addEventListener('click', () => {
    nav.classList.toggle('show');
  });