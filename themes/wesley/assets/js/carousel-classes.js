/**
* Mobile Carousel Unslick
*/
jQuery(function () {
  jQuery('.mobile-carousel').slick({
    dots: true,
    arrows: false,
    mobileFirst: true,
    responsive: [
      {
        breakpoint: 576,
        settings: "unslick"
      }
    ]
  });
});

/**
* Related Posts
*/
jQuery(function () {
  jQuery('.related-posts-wrap').each(function(){
    var slickIndividual = jQuery(this);
    slickIndividual.slick({
      dots: true,
      arrows: false,
      infinite: false,
      slidesToShow: 1,
      mobileFirst: true,
      responsive: [
        {
        breakpoint: 576,
          settings: {
              slidesToShow: 2
          }
        },
        {
          breakpoint: 767,
            settings: {
                slidesToShow: 3
            }
        }
      ]
    });
  });
});


/**
* Episodes List Horizontal
*/
jQuery(function () {
  jQuery('.episodes-carousel').each(function(){
    var slickIndividual = jQuery(this);
    slickIndividual.slick({
      slidesToShow: 3,
      slidesToScroll: 1,
      vertical: true,
      verticalSwiping:true,
      adaptiveHeight: true,
      centerMode: false,
      dots: false,
      appendDots: slickIndividual.next().find('.awesome-dots'),
      nextArrow: slickIndividual.next().find('.slick-next-episode'),
      prevArrow: slickIndividual.next().find('.slick-prev-episode'),
    });
  });
});

/**
* Centered Mode
*/
jQuery(function () {
  jQuery('.awesome-slider.centered-mode.show-dots.show-arrows').each(function(){
      var slickIndividual = jQuery(this);
      slickIndividual.slick({
        pauseOnHover: true,
        infinite: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        dots: true,
        centerMode: true,
        centerPadding: '50px',
        arrows: true,
        dots: true,
        appendDots: slickIndividual.next().find('.awesome-dots'),
        nextArrow: slickIndividual.next().find('.slick-arrow-next'),
        prevArrow: slickIndividual.next().find('.slick-arrow-prev'),
        mobileFirst: true,
        responsive: [
          {
          breakpoint: 992,
            settings: {
                slidesToShow: 3,
                centerPadding: '0px',
            }
          }
        ]
        // appendDots: slickIndividual.next().find('.awesome-dots'),
        // nextArrow: slickIndividual.next().find('.slick-arrow-next'),
        // prevArrow: slickIndividual.next().find('.slick-arrow-prev'),
      });
  });
});
  
jQuery(function () {
  jQuery('.awesome-slider.centered-mode.hide-dots.show-arrows').each(function(){
    var slickIndividual = jQuery(this);
    slickIndividual.slick({
      pauseOnHover: true,
      
      // infinite: true,
      slidesToShow: 1,
      slidesToScroll: 1,
      dots: false,
      centerMode: true,
      centerPadding: '100px',
      nextArrow: slickIndividual.next().find('.slick-arrow-next'),
      prevArrow: slickIndividual.next().find('.slick-arrow-prev'),
    });
  });
});
  
jQuery(function () {
    jQuery('.awesome-slider.centered-mode.hide-dots.hide-arrows').each(function(){
      var slickIndividual = jQuery(this);
      slickIndividual.slick({
        pauseOnHover: true,
        // infinite: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        dots: false,
        centerMode: true,
        centerPadding: '100px',
      });
    });
  });
  
  jQuery(function () {
    jQuery('.awesome-slider.centered-mode.show-dots.hide-arrows').each(function(){
      var slickIndividual = jQuery(this);
      slickIndividual.slick({
        pauseOnHover: true,
        // infinite: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        dots: true,
        centerMode: true,
        centerPadding: '100px',
        appendDots: slickIndividual.next().find('.awesome-dots'),
        arrows: false
      });
    });
  });
  
//Centered Mode Autoplay
jQuery(function () {
  jQuery('.awesome-autoplay.centered-mode.show-dots.show-arrows').each(function(){
    var slickIndividual = jQuery(this);
    slickIndividual.slick({
      pauseOnHover: true,
      // infinite: true,
      slidesToShow: 1,
      slidesToScroll: 1,
      dots: true,
      centerMode: true,
      centerPadding: '100px',
      appendDots: slickIndividual.next().find('.awesome-dots'),
      nextArrow: slickIndividual.next().find('.slick-arrow-next'),
      prevArrow: slickIndividual.next().find('.slick-arrow-prev'),
      autoplay: true,
      autoplaySpeed: 3500
    });
  });
});
  
jQuery(function () {
  jQuery('.awesome-autoplay.centered-mode.hide-dots.show-arrows').each(function(){
    var slickIndividual = jQuery(this);
    slickIndividual.slick({
      pauseOnHover: true,
      // infinite: true,
      slidesToShow: 1,
      slidesToScroll: 1,
      dots: false,
      centerMode: true,
      centerPadding: '100px',
      nextArrow: slickIndividual.next().find('.slick-arrow-next'),
      prevArrow: slickIndividual.next().find('.slick-arrow-prev'),
      autoplay: true,
      autoplaySpeed: 3500
    });
  });
});

jQuery(function () {
  jQuery('.awesome-autoplay.centered-mode.hide-dots.hide-arrows').each(function(){
    var slickIndividual = jQuery(this);
    slickIndividual.slick({
      pauseOnHover: true,
      // infinite: true,
      slidesToShow: 1,
      slidesToScroll: 1,
      dots: false,
      centerMode: true,
      centerPadding: '100px',
      autoplay: true,
      autoplaySpeed: 3500
    });
  });
});

jQuery(function () {
  jQuery('.awesome-autoplay.centered-mode.show-dots.hide-arrows').each(function(){
    var slickIndividual = jQuery(this);
    slickIndividual.slick({
      pauseOnHover: true,
      // infinite: true,
      slidesToShow: 1,
      slidesToScroll: 1,
      dots: true,
      centerMode: true,
      centerPadding: '100px',
      appendDots: slickIndividual.next().find('.awesome-dots'),
      arrows: false,
      autoplay: true,
      autoplaySpeed: 3500
    });
  });
});


/**
* Items 1
*/
jQuery(function () {
  jQuery('.awesome-slider.post-1.show-dots.show-arrows').each(function(){
    var slickIndividual = jQuery(this);
    slickIndividual.slick({
      pauseOnHover: true,
      // infinite: true,
      mobileFirst: true,
      slidesToShow: 1,
      slidesToScroll: 1,
      dots: true,
      appendDots: slickIndividual.next().find('.awesome-dots'),
      nextArrow: slickIndividual.next().find('.slick-arrow-next'),
      prevArrow: slickIndividual.next().find('.slick-arrow-prev')
    });
  });
});
  
jQuery(function () {
  jQuery('.awesome-slider.post-1.show-dots.hide-arrows').each(function(){
    var slickIndividual = jQuery(this);
    slickIndividual.slick({
      pauseOnHover: true,
      // infinite: true,
      mobileFirst: true,
      slidesToShow: 1,
      slidesToScroll: 1,
      dots: true,
      appendDots: slickIndividual.next().find('.awesome-dots'),
      arrows: false
    });
  });
});

jQuery(function () {
  jQuery('.awesome-slider.post-1.hide-dots.show-arrows').each(function(){
    var slickIndividual = jQuery(this);
    slickIndividual.slick({
      pauseOnHover: true,
      // infinite: true,
      mobileFirst: true,
      slidesToShow: 1,
      slidesToScroll: 1,
      dots: false,
      nextArrow: slickIndividual.next().find('.slick-arrow-next'),
      prevArrow: slickIndividual.next().find('.slick-arrow-prev'),
    });
  });
});

jQuery(function () {
  jQuery('.awesome-slider.post-1.hide-dots.hide-arrows').each(function(){
    var slickIndividual = jQuery(this);
    slickIndividual.slick({
      pauseOnHover: true,
      // infinite: true,
      mobileFirst: true,
      slidesToShow: 1,
      slidesToScroll: 1,
      dots: false,
      arrows: false
    });
  });
});

//Items 1 - Autoplay
jQuery(function () {
  jQuery('.awesome-autoplay.post-1.show-dots.show-arrows').each(function(){
    var slickIndividual = jQuery(this);
    slickIndividual.slick({
      pauseOnHover: true,
      // infinite: true,
      mobileFirst: true,
      slidesToShow: 1,
      slidesToScroll: 1,
      dots: true,
      appendDots: slickIndividual.next().find('.awesome-dots'),
      nextArrow: slickIndividual.next().find('.slick-arrow-next'),
      prevArrow: slickIndividual.next().find('.slick-arrow-prev'),
      autoplay: true,
      autoplaySpeed: 3500
    });
  });
});

jQuery(function () {
  jQuery('.awesome-autoplay.post-1.show-dots.hide-arrows').each(function(){
    var slickIndividual = jQuery(this);
    slickIndividual.slick({
      pauseOnHover: true,
      // infinite: true,
      mobileFirst: true,
      slidesToShow: 1,
      slidesToScroll: 1,
      dots: true,
      appendDots: slickIndividual.next().find('.awesome-dots'),
      arrows: false,
      autoplay: true,
      autoplaySpeed: 3500
    });
  });
});
  
jQuery(function () {
  jQuery('.awesome-autoplay.post-1.hide-dots.show-arrows').each(function(){
      var slickIndividual = jQuery(this);
      slickIndividual.slick({
        pauseOnHover: true,
        // infinite: true,
        mobileFirst: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        dots: false,
        nextArrow: slickIndividual.next().find('.slick-arrow-next'),
        prevArrow: slickIndividual.next().find('.slick-arrow-prev'),
        autoplay: true,
        autoplaySpeed: 3500
      });
  });
});
  
jQuery(function () {
  jQuery('.awesome-autoplay.post-1.hide-dots.hide-arrows').each(function(){
      var slickIndividual = jQuery(this);
      slickIndividual.slick({
        pauseOnHover: true,
        // infinite: true,
        mobileFirst: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        dots: false,
        arrows: false,
        autoplay: true,
        autoplaySpeed: 3500
      });
    });
});

  
/**
* Items 2
*/
jQuery(function () {
  jQuery('.awesome-slider.post-2.show-dots.show-arrows').each(function(){
      var slickIndividual = jQuery(this);
      slickIndividual.slick({
        pauseOnHover: true,
        // infinite: true,
        mobileFirst: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        dots: true,
        appendDots: slickIndividual.next().find('.awesome-dots'),
        nextArrow: slickIndividual.next().find('.slick-arrow-next'),
        prevArrow: slickIndividual.next().find('.slick-arrow-prev'),
        responsive: [
          {
          breakpoint: 600,
            settings: {
                slidesToShow: 2
            }
          }
        ]
      });
  });
});
  
jQuery(function () {
  jQuery('.awesome-slider.post-2.show-dots.hide-arrows').each(function(){
      var slickIndividual = jQuery(this);
      slickIndividual.slick({
        pauseOnHover: true,
        // infinite: true,
        mobileFirst: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        dots: true,
        appendDots: slickIndividual.next().find('.awesome-dots'),
        arrows: false,
        responsive: [
          {
          breakpoint: 600,
            settings: {
                slidesToShow: 2
            }
          }
        ]
      });
  });
});
  
jQuery(function () {
  jQuery('.awesome-slider.post-2.hide-dots.show-arrows').each(function(){
      var slickIndividual = jQuery(this);
      slickIndividual.slick({
        pauseOnHover: true,
        // infinite: true,
        mobileFirst: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        dots: false,
        nextArrow: slickIndividual.next().find('.slick-arrow-next'),
        prevArrow: slickIndividual.next().find('.slick-arrow-prev'),
        responsive: [
          {
          breakpoint: 600,
            settings: {
                slidesToShow: 2
            }
          }
        ]
      });
    });
});
  
jQuery(function () {
  jQuery('.awesome-slider.post-2.hide-dots.hide-arrows').each(function(){
      var slickIndividual = jQuery(this);
      slickIndividual.slick({
        pauseOnHover: true,
        // infinite: true,
        mobileFirst: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        dots: false,
        arrows: false,
        responsive: [
          {
          breakpoint: 600,
            settings: {
                slidesToShow: 2
            }
          }
        ]
      });
  });
});
  
//Items 2 - Autoplay
jQuery(function () {
  jQuery('.awesome-autoplay.post-2.show-dots.show-arrows').each(function(){
      var slickIndividual = jQuery(this);
      slickIndividual.slick({
        pauseOnHover: true,
        // infinite: true,
        mobileFirst: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        dots: true,
        appendDots: slickIndividual.next().find('.awesome-dots'),
        nextArrow: slickIndividual.next().find('.slick-arrow-next'),
        prevArrow: slickIndividual.next().find('.slick-arrow-prev'),
        autoplay: true,
        autoplaySpeed: 3500,
        responsive: [
          {
          breakpoint: 600,
            settings: {
                slidesToShow: 2
            }
          }
        ]
      });
  });
});
  
jQuery(function () {
  jQuery('.awesome-autoplay.post-2.show-dots.hide-arrows').each(function(){
      var slickIndividual = jQuery(this);
      slickIndividual.slick({
        pauseOnHover: true,
        // infinite: true,
        mobileFirst: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        dots: true,
        appendDots: slickIndividual.next().find('.awesome-dots'),
        arrows: false,
        autoplay: true,
        autoplaySpeed: 3500,
        responsive: [
          {
          breakpoint: 600,
            settings: {
                slidesToShow: 2
            }
          }
        ]
      });
  });
});
  
jQuery(function () {
  jQuery('.awesome-autoplay.post-2.hide-dots.show-arrows').each(function(){
      var slickIndividual = jQuery(this);
      slickIndividual.slick({
        pauseOnHover: true,
        // infinite: true,
        mobileFirst: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        dots: false,
        nextArrow: slickIndividual.next().find('.slick-arrow-next'),
        prevArrow: slickIndividual.next().find('.slick-arrow-prev'),
        autoplay: true,
        autoplaySpeed: 3500,
        responsive: [
          {
          breakpoint: 600,
            settings: {
                slidesToShow: 2
            }
          }
        ]
      });
  });
});
  
jQuery(function () {
  jQuery('.awesome-autoplay.post-2.hide-dots.hide-arrows').each(function(){
      var slickIndividual = jQuery(this);
      slickIndividual.slick({
        pauseOnHover: true,
        // infinite: true,
        mobileFirst: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        dots: false,
        arrows: false,
        autoplay: true,
        autoplaySpeed: 3500,
        responsive: [
          {
          breakpoint: 600,
            settings: {
                slidesToShow: 2
            }
          }
        ]
      });
    });
});

/**
* Items 3
*/
jQuery(function () {
  jQuery('.awesome-slider.post-3.show-dots.show-arrows').each(function(){
      var slickIndividual = jQuery(this);
      slickIndividual.slick({
        pauseOnHover: true,
        infinite: true,
        mobileFirst: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        dots: true,
        appendDots: slickIndividual.next().find('.awesome-dots'),
        nextArrow: slickIndividual.next().find('.slick-arrow-next'),
        prevArrow: slickIndividual.next().find('.slick-arrow-prev'),
        responsive: [
          {
          breakpoint: 600,
            settings: {
                slidesToShow: 2
            }
          },
          {
            breakpoint: 767,
              settings: {
                  slidesToShow: 3
              }
          }
        ]
      });
  });
});
  
jQuery(function () {
  jQuery('.awesome-slider.post-3.show-dots.hide-arrows').each(function(){
      var slickIndividual = jQuery(this);
      slickIndividual.slick({
        pauseOnHover: true,
        // infinite: true,
        mobileFirst: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        dots: true,
        appendDots: slickIndividual.next().find('.awesome-dots'),
        arrows: false,
        responsive: [
          {
          breakpoint: 600,
            settings: {
                slidesToShow: 2
            }
          },
          {
            breakpoint: 767,
              settings: {
                  slidesToShow: 3
              }
          }
        ]
      });
  });
});
  
jQuery(function () {
  jQuery('.awesome-slider.post-3.hide-dots.show-arrows').each(function(){
      var slickIndividual = jQuery(this);
      slickIndividual.slick({
        pauseOnHover: true,
        // infinite: true,
        mobileFirst: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        dots: false,
        nextArrow: slickIndividual.next().find('.slick-arrow-next'),
        prevArrow: slickIndividual.next().find('.slick-arrow-prev'),
        responsive: [
          {
          breakpoint: 600,
            settings: {
                slidesToShow: 2
            }
          },
          {
            breakpoint: 767,
              settings: {
                  slidesToShow: 3
              }
          }
        ]
      });
  });
});
  
jQuery(function () {
  jQuery('.awesome-slider.post-3.hide-dots.hide-arrows').each(function(){
      var slickIndividual = jQuery(this);
      slickIndividual.slick({
        pauseOnHover: true,
        // infinite: true,
        mobileFirst: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        dots: false,
        arrows: false,
        responsive: [
          {
          breakpoint: 600,
            settings: {
                slidesToShow: 2
            }
          },
          {
            breakpoint: 767,
              settings: {
                  slidesToShow: 3
              }
          }
        ]
      });
  });
});
  
//Items 3 - Autoplay
jQuery(function () {
    jQuery('.awesome-autoplay.post-3.show-dots.show-arrows').each(function(){
      var slickIndividual = jQuery(this);
      slickIndividual.slick({
        pauseOnHover: true,
        // infinite: true,
        mobileFirst: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        dots: true,
        appendDots: slickIndividual.next().find('.awesome-dots'),
        nextArrow: slickIndividual.next().find('.slick-arrow-next'),
        prevArrow: slickIndividual.next().find('.slick-arrow-prev'),
        autoplay: true,
        autoplaySpeed: 3500,
        responsive: [
          {
          breakpoint: 600,
            settings: {
                slidesToShow: 2
            }
          },
          {
            breakpoint: 767,
              settings: {
                  slidesToShow: 3
              }
          }
        ]
      });
  });
});
  
jQuery(function () {
  jQuery('.awesome-autoplay.post-3.show-dots.hide-arrows').each(function(){
      var slickIndividual = jQuery(this);
      slickIndividual.slick({
        pauseOnHover: true,
        // infinite: true,
        mobileFirst: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        dots: true,
        appendDots: slickIndividual.next().find('.awesome-dots'),
        arrows: false,
        autoplay: true,
        autoplaySpeed: 3500,
        responsive: [
          {
          breakpoint: 600,
            settings: {
                slidesToShow: 2
            }
          },
          {
            breakpoint: 767,
              settings: {
                  slidesToShow: 3
              }
          }
        ]
      });
  });
});
  
jQuery(function () {
  jQuery('.awesome-autoplay.post-3.hide-dots.show-arrows').each(function(){
      var slickIndividual = jQuery(this);
      slickIndividual.slick({
        pauseOnHover: true,
        // infinite: true,
        mobileFirst: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        dots: false,
        nextArrow: slickIndividual.next().find('.slick-arrow-next'),
        prevArrow: slickIndividual.next().find('.slick-arrow-prev'),
        autoplay: true,
        autoplaySpeed: 3500,
        responsive: [
          {
          breakpoint: 600,
            settings: {
                slidesToShow: 2
            }
          },
          {
            breakpoint: 767,
              settings: {
                  slidesToShow: 3
              }
          }
        ]
      });
    });
});
  
jQuery(function () {
  jQuery('.awesome-autoplay.post-3.hide-dots.hide-arrows').each(function(){
      var slickIndividual = jQuery(this);
      slickIndividual.slick({
        pauseOnHover: true,
        // infinite: true,
        mobileFirst: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        dots: false,
        arrows: false,
        autoplay: true,
        autoplaySpeed: 3500,
        responsive: [
          {
          breakpoint: 600,
            settings: {
                slidesToShow: 2
            }
          },
          {
            breakpoint: 767,
              settings: {
                  slidesToShow: 3
              }
          }
        ]
      });
    });
});
  

/**
* Items 4
*/
jQuery(function () {
  jQuery('.awesome-slider.post-4.show-dots.show-arrows').each(function(){
      var slickIndividual = jQuery(this);
      slickIndividual.slick({
        pauseOnHover: true,
        // infinite: true,
        mobileFirst: true,
        slidesToShow: 2,
        slidesToScroll: 1,
        dots: true,
        appendDots: slickIndividual.next().find('.awesome-dots'),
        nextArrow: slickIndividual.next().find('.slick-arrow-next'),
        prevArrow: slickIndividual.next().find('.slick-arrow-prev'),

        responsive: [
          {
          breakpoint: 600,
            settings: {
                slidesToShow: 3
            }
          },
          {
            breakpoint: 767,
              settings: {
                  slidesToShow: 4
              }
          }
        ]
      });
    });
});
  
jQuery(function () {
  jQuery('.awesome-slider.post-4.show-dots.hide-arrows').each(function(){
      var slickIndividual = jQuery(this);
      slickIndividual.slick({
        pauseOnHover: true,
        // infinite: true,
        mobileFirst: true,
        slidesToShow: 2,
        slidesToScroll: 1,
        dots: true,
        arrows: false,
        appendDots: slickIndividual.next().find('.awesome-dots'),

        responsive: [
          {
          breakpoint: 600,
            settings: {
                slidesToShow: 3
            }
          },
          {
            breakpoint: 767,
              settings: {
                  slidesToShow: 4
              }
          }
        ]
      });
  });
});
  
jQuery(function () {
    jQuery('.awesome-slider.post-4.hide-dots.show-arrows').each(function(){
      var slickIndividual = jQuery(this);
      slickIndividual.slick({
        pauseOnHover: true,
        // infinite: true,
        mobileFirst: true,
        slidesToShow: 2,
        slidesToScroll: 1,
        dots: false,
        nextArrow: slickIndividual.next().find('.slick-arrow-next'),
        prevArrow: slickIndividual.next().find('.slick-arrow-prev'),
        responsive: [
          {
          breakpoint: 600,
            settings: {
                slidesToShow: 3
            }
          },
          {
            breakpoint: 767,
              settings: {
                  slidesToShow: 4
              }
          }
        ]
      });
    });
});
  
jQuery(function () {
  jQuery('.awesome-slider.post-4.hide-dots.hide-arrows').each(function(){
      var slickIndividual = jQuery(this);
      slickIndividual.slick({
        pauseOnHover: true,
        // infinite: true,
        mobileFirst: true,
        slidesToShow: 2,
        slidesToScroll: 1,
        dots: false,
        arrows: false,
        responsive: [
          {
          breakpoint: 600,
            settings: {
                slidesToShow: 3
            }
          },
          {
            breakpoint: 767,
              settings: {
                  slidesToShow: 4
              }
          }
        ]
      });
  });
});
  
//Items 4 - Autoplay
jQuery(function () {
  jQuery('.awesome-autoplay.post-4.show-dots.show-arrows').each(function(){
      var slickIndividual = jQuery(this);
      slickIndividual.slick({
        pauseOnHover: true,
        // infinite: true,
        mobileFirst: true,
        slidesToShow: 2,
        slidesToScroll: 1,
        dots: true,
        appendDots: slickIndividual.next().find('.awesome-dots'),
        nextArrow: slickIndividual.next().find('.slick-arrow-next'),
        prevArrow: slickIndividual.next().find('.slick-arrow-prev'),
        autoplay: true,
        autoplaySpeed: 3500,
        responsive: [
          {
          breakpoint: 600,
            settings: {
                slidesToShow: 3
            }
          },
          {
            breakpoint: 767,
              settings: {
                  slidesToShow: 4
              }
          }
        ]
      });
  });
});
  
jQuery(function () {
    jQuery('.awesome-autoplay.post-4.show-dots.hide-arrows').each(function(){
      var slickIndividual = jQuery(this);
      slickIndividual.slick({
        pauseOnHover: true,
        // infinite: true,
        mobileFirst: true,
        slidesToShow: 2,
        slidesToScroll: 1,
        dots: true,
        appendDots: slickIndividual.next().find('.awesome-dots'),
        arrows: false,
        autoplay: true,
        autoplaySpeed: 3500,
        responsive: [
          {
          breakpoint: 600,
            settings: {
                slidesToShow: 3
            }
          },
          {
            breakpoint: 767,
              settings: {
                  slidesToShow: 4
              }
          }
        ]
      });
    });
});
  
jQuery(function () {
    jQuery('.awesome-autoplay.post-4.hide-dots.show-arrows').each(function(){
      var slickIndividual = jQuery(this);
      slickIndividual.slick({
        pauseOnHover: true,
        // infinite: true,
        mobileFirst: true,
        slidesToShow: 2,
        slidesToScroll: 1,
        dots: false,
        nextArrow: slickIndividual.next().find('.slick-arrow-next'),
        prevArrow: slickIndividual.next().find('.slick-arrow-prev'),
        autoplay: true,
        autoplaySpeed: 3500,
        responsive: [
          {
          breakpoint: 600,
            settings: {
                slidesToShow: 3
            }
          },
          {
            breakpoint: 767,
              settings: {
                  slidesToShow: 4
              }
          }
        ]
      });
    });
});
  
jQuery(function () {
  jQuery('.awesome-autoplay.post-4.hide-dots.hide-arrows').each(function(){
      var slickIndividual = jQuery(this);
      slickIndividual.slick({
        pauseOnHover: true,
        // infinite: true,
        mobileFirst: true,
        slidesToShow: 2,
        slidesToScroll: 1,
        dots: false,
        arrows: false,
        autoplay: true,
        autoplaySpeed: 3500,
        responsive: [
          {
          breakpoint: 600,
            settings: {
                slidesToShow: 3
            }
          },
          {
            breakpoint: 767,
              settings: {
                  slidesToShow: 4
              }
          }
        ]
      });
    });
});
  
/**
* Items 5
*/
jQuery(function () {
  jQuery('.awesome-slider.post-5.show-dots.show-arrows').each(function(){
      var slickIndividual = jQuery(this);
      slickIndividual.slick({
        pauseOnHover: true,
        // infinite: true,
        mobileFirst: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        dots: true,
        appendDots: slickIndividual.next().find('.awesome-dots'),
        nextArrow: slickIndividual.next().find('.slick-arrow-next'),
        prevArrow: slickIndividual.next().find('.slick-arrow-prev'),
        responsive: [
          {
          breakpoint: 600,
            settings: {
                slidesToShow: 2
            }
          },
          {
            breakpoint: 767,
              settings: {
                  slidesToShow: 3
              }
          },
          {
            breakpoint: 991,
              settings: {
                  slidesToShow: 4
              }
          },
          {
            breakpoint: 1200,
              settings: {
                  slidesToShow: 5
              }
          }
        ]
      });
  });
});
  
jQuery(function () {
  jQuery('.awesome-slider.post-5.show-dots.hide-arrows').each(function(){
      var slickIndividual = jQuery(this);
      slickIndividual.slick({
        pauseOnHover: true,
        // infinite: true,
        mobileFirst: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        dots: true,
        appendDots: slickIndividual.next().find('.awesome-dots'),
        arrows: false,
        responsive: [
          {
          breakpoint: 600,
            settings: {
                slidesToShow: 2
            }
          },
          {
            breakpoint: 767,
              settings: {
                  slidesToShow: 3
              }
          },
          {
            breakpoint: 991,
              settings: {
                  slidesToShow: 4
              }
          },
          {
            breakpoint: 1200,
              settings: {
                  slidesToShow: 5
              }
          }
        ]
      });
    });
});
  
jQuery(function () {
    jQuery('.awesome-slider.post-5.hide-dots.show-arrows').each(function(){
      var slickIndividual = jQuery(this);
      slickIndividual.slick({
        pauseOnHover: true,
        // infinite: true,
        mobileFirst: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        dots: false,
        nextArrow: slickIndividual.next().find('.slick-arrow-next'),
        prevArrow: slickIndividual.next().find('.slick-arrow-prev'),
        responsive: [
          {
          breakpoint: 600,
            settings: {
                slidesToShow: 2
            }
          },
          {
            breakpoint: 767,
              settings: {
                  slidesToShow: 3
              }
          },
          {
            breakpoint: 991,
              settings: {
                  slidesToShow: 4
              }
          },
          {
            breakpoint: 1200,
              settings: {
                  slidesToShow: 5
              }
          }
        ]
      });
    });
});
  
jQuery(function () {
  jQuery('.awesome-slider.post-5.hide-dots.hide-arrows').each(function(){
      var slickIndividual = jQuery(this);
      slickIndividual.slick({
        pauseOnHover: true,
        // infinite: true,
        mobileFirst: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        dots: false,
        arrows: false,
        responsive: [
          {
          breakpoint: 600,
            settings: {
                slidesToShow: 2
            }
          },
          {
            breakpoint: 767,
              settings: {
                  slidesToShow: 3
              }
          },
          {
            breakpoint: 991,
              settings: {
                  slidesToShow: 4
              }
          },
          {
            breakpoint: 1200,
              settings: {
                  slidesToShow: 5
              }
          }
        ]
      });
  });
});
  
//Items 5 - Autoplay
jQuery(function () {
  jQuery('.awesome-autoplay.post-5.show-dots.show-arrows').each(function(){
      var slickIndividual = jQuery(this);
      slickIndividual.slick({
        pauseOnHover: true,
        // infinite: true,
        mobileFirst: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        dots: true,
        appendDots: slickIndividual.next().find('.awesome-dots'),
        nextArrow: slickIndividual.next().find('.slick-arrow-next'),
        prevArrow: slickIndividual.next().find('.slick-arrow-prev'),
        autoplay: true,
        autoplaySpeed: 3500,
        responsive: [
          {
          breakpoint: 600,
            settings: {
                slidesToShow: 2
            }
          },
          {
            breakpoint: 767,
              settings: {
                  slidesToShow: 3
              }
          },
          {
            breakpoint: 991,
              settings: {
                  slidesToShow: 4
              }
          },
          {
            breakpoint: 1200,
              settings: {
                  slidesToShow: 5
              }
          }
        ]
      });
    });
});
  
 jQuery(function () {
  jQuery('.awesome-autoplay.post-5.show-dots.hide-arrows').each(function(){
      var slickIndividual = jQuery(this);
      slickIndividual.slick({
        pauseOnHover: true,
        // infinite: true,
        mobileFirst: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        dots: true,
        appendDots: slickIndividual.next().find('.awesome-dots'),
        arrows: false,
        autoplay: true,
        autoplaySpeed: 3500,
        responsive: [
          {
          breakpoint: 600,
            settings: {
                slidesToShow: 2
            }
          },
          {
            breakpoint: 767,
              settings: {
                  slidesToShow: 3
              }
          },
          {
            breakpoint: 991,
              settings: {
                  slidesToShow: 4
              }
          },
          {
            breakpoint: 1200,
              settings: {
                  slidesToShow: 5
              }
          }
        ]
      });
    });
});
  
jQuery(function () {
    jQuery('.awesome-autoplay.post-5.hide-dots.show-arrows').each(function(){
      var slickIndividual = jQuery(this);
      slickIndividual.slick({
        pauseOnHover: true,
        // infinite: true,
        mobileFirst: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        dots: false,
        nextArrow: slickIndividual.next().find('.slick-arrow-next'),
        prevArrow: slickIndividual.next().find('.slick-arrow-prev'),
        autoplay: true,
        autoplaySpeed: 3500,
        responsive: [
          {
          breakpoint: 600,
            settings: {
                slidesToShow: 2
            }
          },
          {
            breakpoint: 767,
              settings: {
                  slidesToShow: 3
              }
          },
          {
            breakpoint: 991,
              settings: {
                  slidesToShow: 4
              }
          },
          {
            breakpoint: 1200,
              settings: {
                  slidesToShow: 5
              }
          }
        ]
      });
    });
});
  
jQuery(function () {
    jQuery('.awesome-autoplay.post-5.hide-dots.hide-arrows').each(function(){
      var slickIndividual = jQuery(this);
      slickIndividual.slick({
        pauseOnHover: true,
        // infinite: true,
        mobileFirst: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        dots: false,
        arrows: false,
        autoplay: true,
        autoplaySpeed: 3500,
        responsive: [
          {
          breakpoint: 600,
            settings: {
                slidesToShow: 2
            }
          },
          {
            breakpoint: 767,
              settings: {
                  slidesToShow: 3
              }
          },
          {
            breakpoint: 991,
              settings: {
                  slidesToShow: 4
              }
          },
          {
            breakpoint: 1200,
              settings: {
                  slidesToShow: 5
              }
          }
        ]
      });
    });
});