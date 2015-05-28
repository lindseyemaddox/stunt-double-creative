$(function() {
  $('#about-link, #portfolio-link, #clients-link, #services-link, #team-link, #contact-link, #slider-services-link, #slider-services-link2').click(function() {
    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
      if (target.length) {
        $('html,body').animate({
          scrollTop: target.offset().top-120
        }, 1000);
        return false;
      }
    }
  });
});