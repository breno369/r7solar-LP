jQuery(document).ready(function ($) {
  function startBannerRotation(zone) {
    const banners = zone.find('li.banner')
    let previousIndex = undefined
    let currentIndex = 0
    let timeoutId = null
    let isPaused = false

    if (banners.length <= 1) return

    function showBanner() {
      banners.eq(previousIndex).stop(true, true).fadeOut(300)
      banners.eq(currentIndex).stop(true, true).fadeIn(300)
    }

    function getNextIndex() {
      return (currentIndex + 1) % banners.length
    }

    function scheduleNextRotation() {
      const currentBanner = banners.eq(currentIndex)
      const duration = parseInt(currentBanner.data('duration'), 10)

      timeoutId = setTimeout(() => {
        if (isPaused) return

        previousIndex = currentIndex
        currentIndex = getNextIndex()
        showBanner()
        scheduleNextRotation()
      }, duration)
    }

    zone.on('mouseenter', () => {
      isPaused = true
      clearTimeout(timeoutId)
    })

    zone.on('mouseleave', () => {
      isPaused = false
      scheduleNextRotation()
    })

    scheduleNextRotation()
  }

  function initAllBannerZones() {
    $('.banners-zone').each(function () {
      startBannerRotation($(this))
    })
  }

  initAllBannerZones()
})