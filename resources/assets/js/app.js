import Menu from './menu'

let menu = new Menu;

document.addEventListener("DOMContentLoaded", function(event) {
    console.log("DOM fully loaded and parsed");
    document.querySelector('.js-toggle').addEventListener('click', menu.toggle)
  });