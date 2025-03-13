import Tweezer from 'tweezer.js'
import ParentClass from './Parent.js'

class ToTop extends ParentClass {
  constructor () {
    super()

    if (!document.querySelector('.to-top')) return
    this.btn = document.querySelector('.to-top')
    this.container = document.querySelector('.footer-meta__tools')
    this.init()
  }

  init () {
    const self = this

    this.setupButton()

    window.addEventListener('resize', function () {
      self.setupButton()
    })
    window.addEventListener('scroll', function () {
      self.setupButton()
    })

    this.btn.addEventListener('click', (e) => {
      e.preventDefault()
      self.scrollTop()
    })
  }

  setupButton () {
    this.setLeftPosition()
    this.maybeShowButton()

    if (this.isInViewport(document.querySelector('.footer-meta__tools'))) {
      this.btn.classList.remove('is-fixed')
    } else {
      this.btn.classList.add('is-fixed')
    }
  }

  maybeShowButton () {
    if (this.hasGoneFarEnough()) {
      this.btn.classList.add('btn-visible')
    } else {
      this.btn.classList.remove('btn-visible')
    }
  }

  getWindowHeight () {
    return Math.max(document.documentElement.clientHeight, window.innerHeight || 0)
  }

  hasGoneFarEnough () {
    return window.pageYOffset > this.getWindowHeight()
  }

  setLeftPosition () {
    const bounding = this.container.getBoundingClientRect()
    this.btn.style.left = bounding.right - this.btn.offsetWidth + 'px'
  }

  isInViewport (elem) {
    const bounding = elem.getBoundingClientRect()
    return (
        bounding.top >= 0 &&
        bounding.left >= 0 &&
        bounding.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
        bounding.right <= (window.innerWidth || document.documentElement.clientWidth)
    )
  }

  scrollTop (offset, el) {
    new Tweezer({
      start: window.pageYOffset,
      end: 0,
      duration: 1000
    })
      .on('tick', (v) => {
        window.scrollTo(0, v)
      })
      .begin()
  }
}

export default new ToTop()
