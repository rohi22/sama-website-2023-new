$(document).ready(function(){



// if($(".menu-carousel").length){
//     $(".menu-carousel").owlCarousel({
//       loop:true,
//       margin: 15,
//       dots: false,
//       responsiveClass:true,
//       responsive:{
//           0:{
//               items:1,
//               nav:true
//           },
//           600:{
//               items:2,
//               nav:false
//           },
//           992:{
//               items:3,
//               nav:false
//           },
//           1000:{
//               items:5,
//               nav:true,
//               loop:false
//           }
//       }
//     });
// }

if($(".MachineSlider").length){
    $(".MachineSlider").owlCarousel({
      autoplay: true,
      loop:true,
      margin: 15,
      dots: true,
      nav: false,
      responsiveClass: true,
      responsive:{
          0:{
              items:2
          },
          992:{
              items:2
          },
          1000:{
              items:4
          }
      }
    });
}
if($(".ProcessSlider").length){
    $(".ProcessSlider").owlCarousel({
      autoplay: true,
      items: 1,
      loop: true,
      dots: false,
      arrow: false,
      margin: 5,
    });
}

if($(".TwoItemSlider").length){
    $(".TwoItemSlider").owlCarousel({
      autoplay: true,
      items: 2,
      loop: true,
      dots: false,
      arrow: false,
      margin: 5,
    });
}

if($(".MainSlider").length){
    $(".MainSlider").owlCarousel({
      autoplay: true,
      items: 1,
      loop: true,
      dots: true,
      arrow: false,
      nav:false,
      
    });
}
if($(".CLogoSlider").length){
    $(".CLogoSlider").owlCarousel({
      autoplay: true,
      loop:true,
      margin: 25,
      dots: false,
      nav: false,
      responsiveClass: true,
      responsive:{
          0:{
              items:3
          },
          600:{
              items:4
          },
          767:{
              items:6,
              nav:false
          },
          992:{
              items:6
          },
          1366:{
              items:10
          },
          1600:{
              items:12
          }
      }
    });  
}
if($(".AwardSlider").length){      
    $(".AwardSlider").owlCarousel({
      autoplay: true,
      items: 1,
      loop: true,
      margin: 5,
    });
}
if($(".AboutSlider").length){      
    $(".AboutSlider").owlCarousel({
      autoplay: true,
      items: 1,
      loop: true,
      margin: 25,
      dots: false,
      nav: true,
      autoHeight:true
    });
}
    $( ".owl-prev").html('<i class="fa fa-chevron-left"></i>');
    $( ".owl-next").html('<i class="fa fa-chevron-right"></i>');
  });
  
//   $(document).ready(function() {
//   if ( $(window).width() > 767 ) {
//     startCarousel();
//   } else {
//     $('.owl-carousel').addClass('off');
//   }
// });

// $(window).resize(function() {
//     if ( $(window).width() > 767 ) {
//       startCarousel();
//     } else {
//       stopCarousel();
//     }
// });

// function startCarousel() {
 
// $(".InSlider").owlCarousel({
//       autoplay:true,
//     autoplayTimeout:5000,
//       loop:true,
//       margin: 15,
//       dots: false,
//       nav: true,
//       responsiveClass:true,
//       responsive:{
//           0:{
//               items:2,
//               nav:false
//           },
//           600:{
//               items:3,
//               nav:false
//           },
//           992:{
//               items:4,
//               nav:false
//           },
//           1000:{
//               items:6,
//               nav:true,
//               loop:false
//           }
//       }
//     });
// }

function stopCarousel() {
  var owl = $('.owl-carousel');
  owl.trigger('destroy.owl.carousel');
  owl.addClass('off');
}
  
  window.addEventListener('scroll', function() {            
      if (window.scrollY > 36) {
          document.getElementById('Header').classList.add('fixed');
          document.body.classList.add('fixedHeader');          
      } else {
          document.getElementById('Header').classList.remove('fixed');
          document.body.classList.remove('fixedHeader');
      } 
  });
        $(document).ready(function () {
            // $(window).scroll(function () {
            //     if ($(this).scrollTop() > 100) {
            //         $('#scrollToTop').fadeIn();
            //     } else {
            //         $('#scrollToTop').fadeOut();
            //     }
            // });
            $('#scrollToTop').click(function () {
                $("html, body").animate({
                    scrollTop: 0
                }, 800);
                return false;
            });
        });
        $(document).ready(function() {
  if ($(window).width() > 767) {
    //   $( ".sama-second ul" ).removeClass( "owl-carousel InSlider owl-loaded owl-drag" )
    if($(".InSlider").length){
    $(".InSlider").owlCarousel({
      autoplay: false,
      loop:true,
      margin: 15,
      dots: false,
      nav: true,
      responsiveClass:true,
      responsive:{
          0:{
              items:2,
              nav:false
          },
          600:{
              items:3,
              nav:false
          },
          992:{
              items:4,
              nav:false
          },
          1000:{
              items:6,
              nav:true,
              loop:false
          }
      }
    });
}

  }
});

  const convertImages = (query, callback) => {
    const images = document.querySelectorAll(query);
    images.forEach(image => {
        fetch(image.src)
        .then(res => res.text())
        .then(data => {
        const parser = new DOMParser();
        const svg = parser.parseFromString(data, 'image/svg+xml').querySelector('svg');

        if (image.id) svg.id = image.id;
        if (image.className) svg.classList = image.classList;

        image.parentNode.replaceChild(svg, image);
        })
        .then(callback)
        .catch(error => console.error(error))
    });
    }
    convertImages('.SvgImage');


  var input = document.querySelector(".PhoneNmbr");
    window.intlTelInput(input, {
      // allowDropdown: false,
      // autoHideDialCode: false,
      // autoPlaceholder: "off",
      // dropdownContainer: document.body,
      // excludeCountries: ["us"],
      // formatOnDisplay: false,
      // geoIpLookup: function(callback) {
      //   $.get("http://ipinfo.io", function() {}, "jsonp").always(function(resp) {
      //     var countryCode = (resp && resp.country) ? resp.country : "";
      //     callback(countryCode);
      //   });
      // },
      // hiddenInput: "full_number",
      // initialCountry: "auto",
      // localizedCountries: { 'de': 'Deutschland' },
      // nationalMode: false,
      // onlyCountries: ['us', 'gb', 'ch', 'ca', 'do'],
      // placeholderNumberType: "MOBILE",
      // preferredCountries: ['cn', 'jp'],
      // separateDialCode: true,
      utilsScript: "phone-picker/js/utils.js",
    });
    
