document.addEventListener('DOMContentLoaded', function () {
    if (document.getElementById('post_type').value === 'staff') {
        document.getElementById('title').setAttribute('placeholder', 'Add staff name');
    }
});
