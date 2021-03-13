
const sidebarButton = document.querySelector('.fa.fa-bars');
const sidebar = document.querySelector('.sidebar');
sidebarButton.addEventListener('click', () => {
  sidebarButton.classList.toggle('sidebar-bars-active');
  sidebar.classList.toggle('sidebar-active');
});