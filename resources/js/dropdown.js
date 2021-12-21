let comments = document.getElementById('comments-wrapper');
let feedback = document.getElementById('feedback-wrapper');

comments.addEventListener('click', function(event) {
    if (feedback.classList.contains('block')) {
        feedback.classList.remove('block');
        feedback.classList.add('hidden');
    } else {
        feedback.classList.remove('hidden');
        feedback.classList.add('block');
    }
});