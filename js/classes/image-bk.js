import { doesSupportObjectFit } from '../lib/utils'
import ParentClass from './Parent.js';

class ImageBK extends ParentClass {
  constructor (el) {
    super()    
    this.el = el
    this.init()
  }

  init () {
    const self = this
    window.addEventListener('resize', evt => {
      self.checkImage()
    })

    this.checkImage()
  }

  checkImage () {
    let img
    if (window.innerWidth < this.breakpoints.md) {
      // mobile size
      img = this.el.dataset['bkMedium_large'] ? this.el.dataset['bkMedium_large'] : this.el.dataset['bkLarge']
    } else if (window.innerWidth < this.breakpoints.lg) {
      // tablet size
      img = this.el.dataset['bkLarge'] ? this.el.dataset['bkLarge'] : this.el.dataset['bkFull']
    } else {
      // full size
      img = this.el.dataset['bkFull']
    }

    this.el.style.backgroundImage = 'url("' + img + '")'
  }
}

export default function(el) {
  new ImageBK(el)
}