// arrows in sidebar
const arrows = document.querySelectorAll('.arrow');
const sidebarLinks = document.querySelectorAll('.sidebar_link');

sidebarLinks.forEach(link => {
    link.addEventListener('click', function(event) {
        const subMenu = this.nextElementSibling;
        const arrow = this.querySelector('.arrow');
        if (subMenu && subMenu.classList.contains('sidebar_link_bg')) {
            subMenu.classList.toggle('show');
            if (arrow) {
                arrow.classList.toggle('rotated');
            }
        }
    });
});
