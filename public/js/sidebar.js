// toggle
const sidebar = document.querySelector('.sidebar');
const master = document.querySelector('.master');
const toggleButton = document.getElementById('toggleSidebar');
toggleButton.addEventListener('click', function(event) {
    event.preventDefault();
    sidebar.classList.toggle('show');
    master.classList.toggle('show');
});
