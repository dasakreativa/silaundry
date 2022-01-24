const MetisMenu = require('metismenujs');
let target      = document.getElementById('menu');

if(target) {
  const mm = new MetisMenu('#menu');
}

require('perfect-scrollbar/dist/perfect-scrollbar');

// Toggler Here
// Button Toggler Sidebar
let button = document.querySelectorAll("[data-trigger=\"sidebar-toggler\"]");
if(button.length > 0) {
  for(let index = 0; index < button.length; index++) {
    button[index].addEventListener('click', (e) => {
      let target = document.querySelector('body');
      target.classList.toggle('trigger');
    });
  }
}
