import ParentClass from './Parent.js'
import Glide from '@glidejs/glide'

class Testimonials extends ParentClass {
  constructor (el) {
    super()
    this.slider = el.querySelector('.testimonial-glide')
    this.init()
  }

  init () {
      // bail out if theres only one slide
      if (this.slider.querySelectorAll('.glide__slide').length < 2) return
      
      const options = {
        type: 'carousel',
        gap: 0,
        perView: 1
      }
      
      const glideSlider = new Glide(this.slider, options)
      glideSlider.mount()
  }
}

export default function (el) {
  new Testimonials(el)
}
