// Toggle menu

const menu = document.querySelector(".menu-container");

//Check is admin bar is shown - if it then add additional class to container-fluid so it doesn't overlap
document.addEventListener("DOMContentLoaded", function(event) {
  if (document.querySelector("#wpadminbar")) {
  console.log('admin bar is shown');
  document.querySelector('nav').classList.add('admin-margin');
  // document.querySelector('.menu-container').classList.add('admin-margin');
}});


document.querySelector("#showMenu").addEventListener("click", () => {
  document.body.style.overflowY = "hidden"; //Prevent scrolling when animating
  menu.classList.remove("show", "animate__fadeOutLeft");
  menu.classList.add("show", "animate__fadeInRight", "animate__animated");
});

document.querySelector("#closeMenu").addEventListener("click", () => {
  menu.classList.add("animate__fadeOutLeft");
  setTimeout(function () {
    document.body.style.overflowY = "auto";
    menu.classList.remove("show");
  }, 500);
});

const mediaQueryList = window.matchMedia('(min-width: 1000px)');
const checkViewportWidth = () => {
    if (mediaQueryList.matches) {
        // If viewport is 1000px or wider, remove the class
        menu.classList.remove('animate__fadeOutLeft');
        // menu.classList.remove('admin-margin');
    } else {
        // If viewport is less than 1000px wide, add the class
        menu.classList.add('animate__fadeOutLeft');
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
        var menuItemIcons = document.querySelectorAll('.menu-item-has-children>a>svg');

        // Add click event to the menu item link
        menuItemLink.addEventListener('click', function(event) {
            // Prevent the page from navigating to the link on click
            event.preventDefault();

            // Get the sub-menu of the clicked menu item
            var subMenu = menuItem.querySelector('.sub-menu');

            // Toggle the display of the sub-menu
            subMenu.style.display = (subMenu.style.display === 'block') ? 'none' : 'block';
            
            // Add this css to the icon   transform: rotate(180deg); 
            
            menuItemIcons.forEach(icon => icon.classList.toggle('rotate-icon'));
            
            // Prevent this event from bubbling up to the li
            event.stopPropagation();
        });
      }, 300); // Delay of 300ms
  });
});




// Convert classes to data-aos animations 
window.addEventListener('DOMContentLoaded', (event) => {
  const blocks = document.querySelectorAll('.wp-block-group');
   
  blocks.forEach((block) => {
    
      block.classList.forEach((className) => {
          if (className.startsWith('aos-')) {
            console.log(block)
              const animationName = className.split('aos-')[1];
              block.dataset.aos = animationName;
              block.classList.remove(className);
          }
      });
  });

  AOS.init({
      once: false,
      delay: 100, 
      duration: 1000,
  });
});



// Lightbox
document.addEventListener('DOMContentLoaded', function() {
  const images = document.querySelectorAll('.scroll-container img');
  const lightbox = document.createElement('div');
  lightbox.className = 'lightbox';
  document.body.appendChild(lightbox);

  // Create navigation and dismiss buttons
  const nextBtn = document.createElement('button');
  nextBtn.innerText = '>';
  nextBtn.className = 'btn next';
  const prevBtn = document.createElement('button');
  prevBtn.innerText = '<';
  prevBtn.className = 'btn prev';
  const dismissBtn = document.createElement('button');
  dismissBtn.innerText = 'X';
  dismissBtn.className = 'btn dismiss';

  // Indicator
  const indicator = document.createElement('div');
  indicator.className = 'indicator';

  lightbox.appendChild(prevBtn);
  lightbox.appendChild(nextBtn);
  lightbox.appendChild(dismissBtn);
  lightbox.appendChild(indicator);

  let currentIndex = 0;

  images.forEach((image, index) => {
    image.addEventListener('click', () => {
      lightbox.style.display = 'flex';
      const img = document.createElement('img');
      img.src = image.src;
      while (lightbox.firstChild !== prevBtn) {
        lightbox.removeChild(lightbox.firstChild);
      }
      lightbox.insertBefore(img, lightbox.firstChild);
      currentIndex = index;
      updateIndicator();
    });
  });

  nextBtn.addEventListener('click', () => {
    navigate(1); // Next
  });

  prevBtn.addEventListener('click', () => {
    navigate(-1); // Previous
  });

  dismissBtn.addEventListener('click', closeLightbox);
  lightbox.addEventListener('click', (e) => {
    if (e.target === lightbox) closeLightbox();
  });

  document.addEventListener('keydown', (e) => {
    if (lightbox.style.display === 'flex') {
      if (e.key === 'ArrowRight') navigate(1);
      else if (e.key === 'ArrowLeft') navigate(-1);
      else if (e.key === 'Escape') closeLightbox();
    }
  });

  function navigate(direction) {
    currentIndex = (currentIndex + direction + images.length) % images.length;
    lightbox.querySelector('img').src = images[currentIndex].src;
    updateIndicator();
  }

  function updateIndicator() {
    indicator.innerText = `${currentIndex + 1} of ${images.length}`;
  }

  function closeLightbox() {
    lightbox.style.display = 'none';
  }
});

