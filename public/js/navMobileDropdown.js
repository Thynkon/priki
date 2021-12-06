/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!*******************************************!*\
  !*** ./resources/js/navMobileDropdown.js ***!
  \*******************************************/
var dropdown = document.getElementById('nav-mobile-dropdown');
var icoDropDown = document.getElementById('ico-nav-mobile-dropdown');
var icoDropUp = document.getElementById('ico-nav-mobile-dropup');

document.getElementById('btn-nav-mobile-dropdown').onclick = function () {
  dropdown.classList.toggle('hidden');
  icoDropDown.classList.toggle('hidden');
  icoDropUp.classList.toggle('hidden');
};
/******/ })()
;