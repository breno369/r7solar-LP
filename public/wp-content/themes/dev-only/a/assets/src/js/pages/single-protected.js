jQuery(document).ready(function ($) {
  jQuery('.show-password').click((event) => {
    event.preventDefault()

    const inputPassword = jQuery('.post-password')

    if (inputPassword.hasClass('show-pass')) {
      inputPassword.attr('type', 'password')
      inputPassword.removeClass('show-pass')
      jQuery('.ph-eye').show()
      jQuery('.ph-eye-closed').hide()
    } else {
      inputPassword.attr('type', 'text')
      inputPassword.addClass('show-pass')
      jQuery('.ph-eye').hide()
      jQuery('.ph-eye-closed').show()
    }
  })
});