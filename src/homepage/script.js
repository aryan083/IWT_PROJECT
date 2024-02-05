function toggleNavbar() {
    const navbar = document.querySelector('.navbar');
    navbar.style.left = navbar.style.left === '0px' ? '-200px' : '0px';

    const navbarIcon = document.querySelector('.navbar-icon');
    const closeIcon = document.querySelector('.close-icon');

    if (navbar.style.left === '0px') {
        navbarIcon.style.display = 'none';
        closeIcon.style.display = 'block';
    } else {
        navbarIcon.style.display = 'block';
        closeIcon.style.display = 'none';
    }
}
