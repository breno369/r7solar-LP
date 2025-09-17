jQuery(document).ready(function ($) {
  jQuery('.btn-question').click(function () {
    var content = jQuery(this).next('.content-question-answer')
    jQuery('.content-question-answer').not(content).slideUp()
    content.slideToggle();
  });
});