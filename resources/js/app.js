import Menu from './menu'
import Prism from 'prismjs'

let menu = new Menu;

document.addEventListener("DOMContentLoaded", function (event) {
  document.querySelector('.js-toggle').addEventListener('click', menu.toggle)

  Prism.highlightAll();

});


window.addEventListener("load", function () {
  window.cookieconsent.initialise({
    "palette": {
      "popup": {
        "background": "#383b75"
      },
      "button": {
        "background": "#f1d600"
      }
    },
    "theme": "edgeless",
    "content": {
      "dismiss": "OK",
      "href": "https://rathes.de/imprint"
    }
  })
});