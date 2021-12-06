let mobileMenu = document.getElementById('mobile-menu')
let mobileHamburgerIcon = document.getElementById('hamburger-mobile-menu')
let mobileCrossIcon = document.getElementById('cross-mobile-menu')

document.getElementById('btn-mobile-menu').onclick = function () {
    mobileHamburgerIcon.classList.toggle('hidden')
    mobileCrossIcon.classList.toggle('hidden')
    mobileMenu.classList.toggle('hidden')

    // Close open dropdown menus on closing the mobile menu
    let dropdown = document.getElementById('nav-mobile-dropdown')
    if (dropdown && !dropdown.classList.contains('hidden')) {
        dropdown.classList.toggle('hidden')
        document.getElementById('ico-nav-mobile-dropdown').classList.toggle('hidden')
        document.getElementById('ico-nav-mobile-dropup').classList.toggle('hidden')
    }
}
