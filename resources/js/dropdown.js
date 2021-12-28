function toggleDisplay(element) {
    if (element.classList.contains('hidden')) {
        element.classList.remove('hidden');
    } else {
        element.classList.add('hidden');
    }
}

document.querySelectorAll('.dropdown-button').forEach(function(element) {
    element.onclick = function(e) {
       let next = element.nextElementSibling;
        toggleDisplay(next);
    }
});