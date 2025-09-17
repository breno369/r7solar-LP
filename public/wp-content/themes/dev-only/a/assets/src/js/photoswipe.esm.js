import PhotoSwipeLightbox from '../../vendor/photoswipe/photoswipe-lightbox.esm.min.js'
import PhotoSwipe from '../../vendor/photoswipe/photoswipe.esm.min.js'

jQuery(document).ready(function ($) {
  /**************************************************
   ** Initializes PhotoSwipe
   **************************************************/
  function itemDataFilter(itemData) {
    const webpSrc = itemData.element.dataset.pswpWebpSrc;
    if (webpSrc) {
      itemData.webpSrc = webpSrc;
    }
    return itemData;
  }

  function customContentLoad(e) {
    const { content, isLazy } = e;

    if (content.data.webpSrc) {
      e.preventDefault();

      content.pictureElement = document.createElement('picture');

      const sourceWebp = document.createElement('source');
      sourceWebp.srcset = content.data.webpSrc;
      sourceWebp.type = 'image/webp';

      const sourceJpg = document.createElement('source');
      sourceJpg.srcset = content.data.src;
      sourceJpg.type = 'image/jpeg';

      content.element = document.createElement('img');
      content.element.src = content.data.src;
      content.element.setAttribute('alt', '');
      content.element.className = 'pswp__img';

      content.pictureElement.appendChild(sourceWebp);
      content.pictureElement.appendChild(sourceJpg);
      content.pictureElement.appendChild(content.element);

      content.state = 'loading';

      if (content.element.complete) {
        content.onLoaded();
      } else {
        content.element.onload = () => {
          content.onLoaded();
        };

        content.element.onerror = () => {
          content.onError();
        };
      }
    }
  }

  function customContentAppend(e) {
    const { content } = e;
    if (content.pictureElement && !content.pictureElement.parentNode) {
      e.preventDefault();
      content.slide.container.appendChild(content.pictureElement);
    }
  }

  function customContentRemove(e) {
    const { content } = e;
    if (content.pictureElement && content.pictureElement.parentNode) {
      e.preventDefault();
      content.pictureElement.remove();
    }
  }

  const photoSwipeImage = new PhotoSwipeLightbox({
    gallery: '.pswp-image',
    children: 'a',
    pswpModule: () => PhotoSwipe,
  })
  photoSwipeImage.addFilter('itemData', itemDataFilter);
  photoSwipeImage.on('contentLoad', customContentLoad);
  photoSwipeImage.on('contentAppend', customContentAppend);
  photoSwipeImage.on('contentRemove', customContentRemove);
  photoSwipeImage.init();

  const photoSwipeGallery = new PhotoSwipeLightbox({
    gallery: '.pswp-gallery',
    children: 'a',
    pswpModule: () => PhotoSwipe,
  })
  photoSwipeGallery.addFilter('itemData', itemDataFilter);
  photoSwipeGallery.on('contentLoad', customContentLoad);
  photoSwipeGallery.on('contentAppend', customContentAppend);
  photoSwipeGallery.on('contentRemove', customContentRemove);
  photoSwipeGallery.init()
  
})