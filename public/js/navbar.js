/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!********************************!*\
  !*** ./resources/js/navbar.js ***!
  \********************************/
var mobileMenu = document.getElementById('mobile-menu');
var mobileHamburgerIcon = document.getElementById('hamburger-mobile-menu');
var mobileCrossIcon = document.getElementById('cross-mobile-menu');

document.getElementById('btn-mobile-menu').onclick = function () {
  mobileHamburgerIcon.classList.toggle('hidden');
  mobileCrossIcon.classList.toggle('hidden');
  mobileMenu.classList.toggle('hidden'); // Close open dropdown menus on closing the mobile menu

  var dropdown = document.getElementById('nav-mobile-dropdown');

  if (dropdown && !dropdown.classList.contains('hidden')) {
    dropdown.classList.toggle('hidden');
    document.getElementById('ico-nav-mobile-dropdown').classList.toggle('hidden');
    document.getElementById('ico-nav-mobile-dropup').classList.toggle('hidden');
  }
};
/******/ })()
;