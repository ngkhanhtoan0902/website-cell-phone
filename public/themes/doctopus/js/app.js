// svg icons support ie11
(function(){
    svg4everybody();
}());

// faq
(function(){
    const item = $('.faq__item, .questions__item'),
          head = $('.faq__head, .questions__head'),
          body = $('.faq__body, .questions__body');
    head.on('click', function () {
        let thisHead = $(this);
        thisHead.parents('.faq__item, .questions__item').toggleClass('active');
        thisHead.parents('.faq__item, .questions__item').find('.faq__body, .questions__body').slideToggle();
    });
}());

// aos animation
AOS.init({once:true})
