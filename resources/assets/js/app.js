import Menu from './menu'
import Prism from 'prismjs'
import 'prismjs/components/prism-php'

let menu = new Menu;

document.addEventListener("DOMContentLoaded", function (event) {
  document.querySelector('.js-toggle').addEventListener('click', menu.toggle)

  Prism.highlightAll();

});
