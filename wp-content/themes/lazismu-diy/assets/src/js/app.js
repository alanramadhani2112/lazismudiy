import '../css/app.css'

const menuToggle = document.querySelector('[data-menu-toggle]')
const menu = document.querySelector('[data-menu]')

if (menuToggle && menu) {
  menuToggle.addEventListener('click', () => {
    const isOpen = menuToggle.getAttribute('aria-expanded') === 'true'

    menuToggle.setAttribute('aria-expanded', String(!isOpen))
    menu.classList.toggle('hidden', isOpen)
  })
}
