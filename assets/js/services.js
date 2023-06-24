// Services menu 
//check if it's a services page

document.addEventListener("DOMContentLoaded", function() {
    document.querySelector('#services-toggle').addEventListener('click', function() {
      document.querySelector('.services-menu').classList.toggle('show');
    }
    );
  });