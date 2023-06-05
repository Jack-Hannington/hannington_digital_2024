jQuery(document).ready(function($) {
    $(window).scroll(function() {
        var scrollTop = $(this).scrollTop();
        if (scrollTop > 20) {
          //add translucent class to nav
          $('nav').addClass('translucent-bg ');
        } else {
          $('nav').removeClass('translucent-bg');
        }
    });
});

// Toggle menu

const menu = document.querySelector(".menu-container");


//Check is admin bar is shown - if it then add additional class to container-fluid so it doesn't overlap
document.addEventListener("DOMContentLoaded", function(event) {
  if (document.querySelector("#wpadminbar")) {
  console.log('admin bar is shown');
  document.querySelector('nav').classList.add('admin-margin');
  document.querySelector('.alert-bar').classList.add('admin-margin');
  // document.querySelector('.menu-container').classList.add('admin-margin');
}});


document.querySelector("#showMenu").addEventListener("click", () => {
  document.body.style.overflowY = "hidden"; //Prevent scrolling when animating
  menu.classList.remove("show", "animate__slideOutRight");
  menu.classList.add("show", "animate__slideInRight", "animate__animated");
});

document.querySelector("#closeMenu").addEventListener("click", () => {
  menu.classList.add("animate__slideOutRight");
  setTimeout(function () {
    document.body.style.overflowY = "auto";
    menu.classList.remove("show");
  }, 500);
});

const mediaQueryList = window.matchMedia('(min-width: 1000px)');
const checkViewportWidth = () => {
    if (mediaQueryList.matches) {
        // If viewport is 1000px or wider, remove the class
        menu.classList.remove('animate__slideOutRight');
        // menu.classList.remove('admin-margin');
    } else {
        // If viewport is less than 1000px wide, add the class
        menu.classList.add('animate__slideOutRight');
        // menu.classList.add('admin-margin');
    }
};

// Call the function once at script load time
checkViewportWidth();

// Then set it up to be called every time the viewport width changes
mediaQueryList.addEventListener('change', checkViewportWidth);





  
document.addEventListener("DOMContentLoaded", function() {
  // Get all menu items that have children
  var menuItems = document.querySelectorAll('.menu-item-has-children');

  // Add Iconify icon to each of them
  menuItems.forEach(function(menuItem) {
      var menuItemLink = menuItem.querySelector('a');
      menuItemLink.insertAdjacentHTML('beforeend', '<span class="iconify" data-icon="tabler:chevron-down"></span>');
      
      // Get the icon within the menu item with a delay of 300ms
      setTimeout(function() {
        var menuItemIcon = document.querySelector('.menu-item-has-children>a>svg');

        // Add click event to the menu item link
        menuItemLink.addEventListener('click', function(event) {
            // Prevent the page from navigating to the link on click
            event.preventDefault();

            // Get the sub-menu of the clicked menu item
            var subMenu = menuItem.querySelector('.sub-menu');

            // Toggle the display of the sub-menu
            subMenu.style.display = (subMenu.style.display === 'block') ? 'none' : 'block';
            
            // Add this css to the icon   transform: rotate(180deg); 
            menuItemIcon.classList.toggle('rotate-icon');
            
            // Prevent this event from bubbling up to the li
            event.stopPropagation();
        });
      }, 300); // Delay of 300ms
  });
});





