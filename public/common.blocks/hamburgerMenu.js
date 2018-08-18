document.addEventListener('DOMContentLoaded', function() {

    'use strict';

    document.querySelector('.material-design-hamburger__icon').addEventListener(
        'click',
        function() {
            var child;

            document.body.classList.toggle('background--blur');
            this.parentNode.nextElementSibling.classList.toggle('menu--on');

            child = this.childNodes[1].classList;

            if (child.contains('material-design-hamburger__icon--to-arrow')) {
                child.remove('material-design-hamburger__icon--to-arrow');
                child.add('material-design-hamburger__icon--from-arrow');
            } else {
                child.remove('material-design-hamburger__icon--from-arrow');
                child.add('material-design-hamburger__icon--to-arrow');
            }

        });

});

// $(document).ready(function() {
//
//
//
//     function toggleSidebar() {
//         $(".button").toggleClass("active");
//         $("main").toggleClass("move-to-left");
//         $(".sidebar-item").toggleClass("active");
//     }
//
//     $(".button").on("click tap", function() {
//         toggleSidebar();
//     });
//
//     $(document).keyup(function(e) {
//         if (e.keyCode === 27) {
//             toggleSidebar();
//         }
//     });
//
// });