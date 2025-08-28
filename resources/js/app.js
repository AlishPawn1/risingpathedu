import './bootstrap';
import 'bootstrap';

// Simple sidebar toggle
document.addEventListener('DOMContentLoaded', () => {
  const toggleBtn = document.querySelector('#sidebarToggle');
  const wrapper = document.querySelector('#app-wrapper');
  if (toggleBtn && wrapper) {
    toggleBtn.addEventListener('click', () => {
      wrapper.classList.toggle('sidebar-collapsed');
    });
  }
});
