jQuery(document).ready(function ($) {
  new Swiper('.swiper', {
    direction: 'horizontal',
    loop: true,
    lazyPreloadPrevNext: 1,
    lazy: {
      loadPrevNext: true,
      loadOnTransitionStart: true,
    },
    autoplay: {
      delay: 6000,
    },
    spaceBetween: 20,
    a11y: {
      enabled: true,
      slideLabelMessage: 'Slide {{index}} de {{slidesLength}}',
      containerMessage: 'Carrossel de notícias em destaque',
      slideRole: 'article',
    },
    pagination: {
      el: '.swiper-pagination',
    },
  });
});