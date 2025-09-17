jQuery(document).ready(function ($) {
  /**************************************************
   ** Global copyable button
   **************************************************/
  $('a.copyable-button, button.copyable-button').click(async (event) => {
    event.preventDefault()

    const copyable = $(event.currentTarget).data('copyable')
    await navigator.clipboard.writeText(copyable);
    $(event.currentTarget).addClass('copyable-success');

    setTimeout(() => {
      $(event.currentTarget).removeClass('copyable-success')
    }, 3000)
  })

  /**************************************************
   ** Global shareable button
   **************************************************/
  $("a.shareable-button, button.shareable-button").on('click', async (event) => {
    event.preventDefault()

    if (!navigator.share) return

    const shareData = {
      title: $(event.currentTarget).data('title') ?? 'Click Umuarama',
      text: $(event.currentTarget).data('text') ?? 'Vi isso no Click Umuarama!',
      url: $(event.currentTarget).data('url') ?? window.location.href,
    }

    await navigator.share(shareData)
  })

  /**************************************************
   ** Header search form
   **************************************************/
  const searchFormContainer = $('#search-form-container')
  const searchForm = $('header form.search-form')

  function outsideClickHandler(event) {
    if (searchForm.is(event.target) === false && searchForm.has(event.target).length === 0) {
      toggleSearchForm()
    }
  }

  function toggleSearchForm() {
    if (searchFormContainer.hasClass('search-form-opened')) {
      searchFormContainer.removeClass('search-form-opened')
      $(document).off('click', outsideClickHandler)
    } else {
      searchFormContainer.addClass('search-form-opened')
      $('header form.search-form input').focus()
      $(document).on('click', outsideClickHandler)
    }
  }

  $('header form.search-form button').click(function (event) {
    if (searchFormContainer.hasClass('search-form-opened') === false) {
      event.preventDefault()
      toggleSearchForm()
    }
  })

  /**************************************************
   ** Mobile menu
   **************************************************/
  const mobileMenu = $('#mobile-menu')

  $('.toggle-mobile-menu').click(function (event) {
    event.preventDefault()

    if (mobileMenu.hasClass('mobile-menu-opened')) {
      $('body').css('overflow', 'visible')
      mobileMenu.removeClass('mobile-menu-opened')
    } else {
      $('body').css('overflow', 'hidden')
      mobileMenu.addClass('mobile-menu-opened')
    }
  })
})
