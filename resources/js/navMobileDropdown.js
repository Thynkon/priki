let dropdown = document.getElementById('nav-mobile-dropdown')
let icoDropDown = document.getElementById('ico-nav-mobile-dropdown')
let icoDropUp = document.getElementById('ico-nav-mobile-dropup')

document.getElementById('btn-nav-mobile-dropdown').onclick = function () {
    dropdown.classList.toggle('hidden')
    icoDropDown.classList.toggle('hidden')
    icoDropUp.classList.toggle('hidden')
}
