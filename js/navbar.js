
/* modo oscuro y claro */
const body = document.querySelector('body');
const sidebar = body.querySelector('nav');
const toggle = body.querySelector('.toggle');
const modeSwitch = body.querySelector('.toggle-switch');
const modeText = body.querySelector('.mode-text');

// Obtener el modo almacenado en localStorage
const savedMode = localStorage.getItem('mode');

// Si hay un modo almacenado, establecerlo en el body
if (savedMode) {
  body.classList.add(savedMode);
  
  if (savedMode === 'dark') {
    modeText.innerText = 'Modo claro';
  } else {
    modeText.innerText = 'Modo oscuro';
  }
}

toggle.addEventListener('click', () => {
  sidebar.classList.toggle('close');
});

modeSwitch.addEventListener('click', () => {
  body.classList.toggle('dark');
  
  if (body.classList.contains('dark')) {
    modeText.innerText = 'Modo claro';
    
    // Guardar el modo en localStorage
    localStorage.setItem('mode', 'dark');
  } else {
    modeText.innerText = 'Modo oscuro';
    
    // Guardar el modo en localStorage
    localStorage.setItem('mode', 'light');
  }
});
/* ------------------------------------------ */


/* sedplazar el menu */
const arrow = document.querySelector('.arrow');
        const subMenu = document.querySelector('.sub-menu');

        arrow.addEventListener('click', function () {
            arrow.classList.toggle('active');
            subMenu.classList.toggle('active');
        });

        document.addEventListener('click', function (e) {
            if (!e.target.closest('.nav-link')) {
                arrow.classList.remove('active');
                subMenu.classList.remove('active');
            }
        });