
jQuery(document).ready(function ($) {
  /**************************************************
   ** Prevent Button and Click Events
   **************************************************/
  $(window).on('contextmenu', (event) => {
    event.preventDefault()

    if (event.shiftKey == true) {
      return false
    }
  })

  $(window).on('keydown', (event) => {
    if (event.keyCode == 123) {
      event.preventDefault()
    }

    else if (event.ctrlKey && event.shiftKey &&
      (
        event.key == 'I' ||
        event.key == 'i' ||
        event.key == 'C' ||
        event.key == 'c' ||
        event.key == 'J' ||
        event.key == 'j'
      )
    ) {
      event.preventDefault()
    }

    else if (event.ctrlKey && (event.key == 'U' || event.key == 'u')) {
      event.preventDefault()
    }
  })

  $('img').on('auxclick', (event) => {
    event.preventDefault()
    if (event.button == 1) {
    }
  })

  $('img').on('click', (event) => {
    if ((event.ctrlKey == true) || (event.shiftKey == true)) {
      return false
    }
  })

  /**************************************************
   ** Edit Clipboard
   **************************************************/
  $(document).on('copy', function (event) {
    event.preventDefault();
    const selection = window.getSelection().toString();

    if (selection.length < 1) {
      return
    }

    const url = new URL($(location).attr('href'))
    const cleanedUrl = url.host + url.pathname
    const customText = `Vi no Click Umuarama: ${selection}\n\nVeja você também em ${cleanedUrl}`;
    event.originalEvent.clipboardData.setData('text/plain', customText);
  });
})
