const mobileMenuIcon = document.querySelector('.mobile-menu-icon');
const navList = document.querySelector('header nav ul');

mobileMenuIcon.addEventListener('click', function() {
  mobileMenuIcon.classList.toggle('active');
  navList.classList.toggle('show');
});

