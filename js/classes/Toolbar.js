import ParentClass from './Parent.js'

class Toolbar extends ParentClass {
  constructor () {
    super()

    if (!document.querySelector('.toolbar')) return
    this.main = document.querySelector('.toolbar')
    this.init()
  }

  init () {
    const self = this
    
    this.maybeHideToolbar()

    window.addEventListener('scroll', () => {
      self.maybeHideToolbar()
    })

    this.main.querySelector('.toolbar-items').addEventListener('mouseover', () => {
      self.main.classList.add('toolbar--hovered')
    })
    this.main.querySelector('.toolbar-items').addEventListener('mouseout', () => {
      self.main.classList.remove('toolbar--hovered')
    })
  }

  maybeHideToolbar () {
    if (window.pageYOffset > 50) {
      this.main.classList.add('hide-on-scroll')
    } else if (window.pageYOffset <= 50) {
      this.main.classList.remove('hide-on-scroll')
    }
  }
}

export default new Toolbar()
