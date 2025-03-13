import ParentClass from './Parent.js' // eslint-disable-line
import Glide from '@glidejs/glide'

class Slideshow extends ParentClass {
  constructor (el) {
    super()
    this.el = el
    this.slider = new Glide(this.el.querySelector('.slideshow-glide'), {
      type: 'carousel',
      gap: 0,
      perView: 1
    })

    this.init()
  }

  init () {
    const self = this
    this.slider.on('resize', self.handleResize)
    this.slider.mount()
  }

  handleResize () {
    const activeSlide = document.querySelector('.slideshow-glide .glide__slide--active .slide__image')
    if (window.innerWidth < 768) {
      document.querySelectorAll('.slideshow-glide .glide__arrow').forEach(ctrl => {
        ctrl.style.top = `${activeSlide.offsetHeight / 2}px`
      })
    } else {
      document.querySelectorAll('.slideshow-glide .glide__arrow').forEach(ctrl => {
        ctrl.removeAttribute('style')
      })
    }

  }
}

export default function(el) {
  new Slideshow(el)
}
