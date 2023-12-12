import './bootstrap';
import Swiper from 'swiper';
// import Swiper styles
import Alpine from 'alpinejs';
import AOS from 'aos';
import 'aos/dist/aos.css'; 
 
window.Alpine = Alpine;

AOS.init({
    once: true
});
Alpine.start();

import { Navigation, Autoplay, Pagination } from 'swiper/modules';

import 'swiper/css';
import 'swiper/css/navigation';
import 'swiper/css/pagination';
import 'swiper/css/autoplay';

    const swiper = new Swiper('.swiper', {
        modules:  [Navigation, Autoplay, Pagination],
        autoplay: {
            delay: 5000,
        },
        pagination: {
            el: 'swiper-pagination',
            type: 'bullets'
        },
        slidesPerView: 3,
        spaceBetween: 30,
        loop: true,
        navigation: true,
        breakpoints: {
        300: {
            slidesPerView: 1,
        },
        768: {
            slidesPerView: 2,
        },
        900: {
            slidesPerView: 3,
        },
            
        }
    })

    window.addEventListener('scroll', function() {
        var myDiv = document.getElementById('header');
        var mobile = document.getElementById('mobile');

        // Get the vertical scroll position
        var scrollPosition = window.scrollY;
    
        // Adjust the threshold as needed
        var threshold = 200;
    
        // Add or remove the 'highlight' class based on the scroll position
        if (scrollPosition > threshold) {
          myDiv.classList.add('active');
          mobile.classList.add('active');
        } else {
          myDiv.classList.remove('active');
          mobile.classList.remove('active');
        }
      });

    // Smooth scroll function
    function scrollToSection(targetId) {
        var targetSection = document.getElementById(targetId);
        if (targetSection) {
        window.scrollTo({
            top: targetSection.offsetTop,
            behavior: 'smooth'
        });
        }
    }

    // Attach click event listeners to menu links
    var menuLinks = document.querySelectorAll('#header ul li a');
        menuLinks.forEach(function(link) {
        link.addEventListener('click', function(event) {
        event.preventDefault();
        var targetId = link.getAttribute('href').substring(1); // Remove the '#'
        scrollToSection(targetId);
        });
    });
    var mobilelinks = document.querySelectorAll('#mobile a');
        mobilelinks.forEach(function(link) {
        link.addEventListener('click', function(event) {
        event.preventDefault();
        var targetId = link.getAttribute('href').substring(1); // Remove the '#'
        scrollToSection(targetId);
        });
    });

    var toggleButton = document.getElementById('toggleBody');
        // Add an event listener to the button
        toggleButton.addEventListener('click', function() {
         // Get a reference to the body element
         var body = document.body;
        // Toggle the 'body-class' class on the body
        body.classList.toggle('stop');
    });
