import Tweezer from 'tweezer.js'

class ScrollTo {
  constructor() {
    this.scrollLinks = document.querySelectorAll('a[href^="#"]')
    const isReload = performance.navigation.type === performance.navigation.TYPE_RELOAD // don't autoscroll if we're reloading. it looks weird

    if (window.location.hash && document.querySelector(window.location.hash) && !isReload) {
      this.scrollTo(0, this.getScrollToPos(document.querySelector(window.location.hash)))
    }

    if(this.scrollLinks) {
      this.addEvents()
    }
  }

  addEvents () {
    this.scrollLinks.forEach(link => {
      const hash = link.getAttribute('href')
      if (hash.length > 1 && document.querySelector(hash)) {
        link.addEventListener('click', e => {
          e.preventDefault()
          this.scrollTo(this.getCurrentPos(), this.getScrollToPos(document.querySelector(e.target.getAttribute('href'))))
        })
      }
    })
  }

  getCurrentPos () {
    return window.scrollY
  }

  getScrollToPos (elem) {
    var location = 0;
    if (elem.offsetParent) {
      do {
        location += elem.offsetTop
        elem = elem.offsetParent
      } while (elem)
    }
    return location >= 0 ? location : 0
  }

  scrollTo (from, to, opts = {}) {
    new Tweezer({
      start: from,
      end: to,
      duration: opts.duration ? opts.duration : 750
    })
      .on('tick', (v) => {
        window.scrollTo(0, v)
        // console.log('tick', v)
      })
      .begin()
  }
}

export default new ScrollTo()