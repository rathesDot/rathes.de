import Menu from './menu'
import Prism from 'prismjs'

let menu = new Menu;

document.addEventListener("DOMContentLoaded", function (event) {
  document.querySelector('.js-toggle').addEventListener('click', menu.toggle)

  Prism.highlightAll();

});
