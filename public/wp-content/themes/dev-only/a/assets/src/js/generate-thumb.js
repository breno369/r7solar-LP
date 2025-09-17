jQuery(document).ready(function ($) {
  /**************************************************
   ** Generate Thumbanils
   **************************************************/
  $('a.generate-thumbnail').click(function (event) {
    console.log('generate thumb clicked')
    event.preventDefault()

    const postUrl = new URL($(this).attr('href'))
    console.log(postUrl)

    const cleanPath = postUrl.pathname.replace(/\/$/, '');
    const cleanPostUrl = `${postUrl.origin}${cleanPath}`

    const lightbox = $('<div>', { class: 'lightbox-thumbnail' })
    const inner = $('<div>', { class: 'inner' })
    const close = $('<button>', { class: 'close', type: 'button', html: '<span>Fechar</span><i class="ph ph-x"></i>' })
    const embed = $('<div>', { class: 'embed', html: `<iframe src="${postUrl}" title="Iframe generate thumbnail"></iframe>` })
    
    inner.append(embed)
    lightbox.append(inner)
    lightbox.append(close)

    $('body').append(lightbox)
    $('body').css('overflow', 'hidden')

    if (window.instgrm && window.instgrm.Embeds) {
      window.instgrm.Embeds.process();
    }

    close.on('click', function () {
      $('body').css('overflow', 'visible')
      lightbox.remove();
    });

    lightbox.on('click', function (event) {
      if (event.target === this) {
        $('body').css('overflow', 'visible')
        lightbox.remove();
      }
    });


  })
})