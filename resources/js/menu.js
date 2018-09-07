
const menu = class Menu {

    toggle() {
        event.preventDefault();
        document.querySelector('.js-menu').classList.toggle('hidden')
    }

}

export default menu;