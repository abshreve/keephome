import Tweezer from 'tweezer.js'
import ParentClass from './Parent.js'

class NavDrawer extends ParentClass {
  constructor() {
    super()

    if (!document.querySelector('.nav-drawer')) return
    this.main = document.querySelector('.nav-drawer .nav-drawer__main')
    this.backBtn = document.querySelector('.nav-drawer .nav-drawer__close')
    this.rows = Array.prototype.slice.call(document.querySelectorAll('.nav-drawer__row'))
    this.drawer = document.querySelector('.nav-drawer__drawer')
    this.drawerInner = document.querySelector('.nav-drawer__inner')
    this.init()
  }

  init() {
    const self = this
    this.rows.forEach(row => {
      const btn = row.querySelector('.nav-drawer__button') // button handles the drawer trigger
      const noRef = row.querySelector('.no-href') // if a custom link was used with no href, handle clicks the same as the button

      btn.addEventListener('click', (e) => {
        e.preventDefault()
        const oldHeight = self.main.offsetHeight
        const html = row.querySelector('.nav-drawer__ul').cloneNode(true)
        html.classList.remove('dropdown-menu')
        self.main.classList.add('open')
        self.drawer.classList.add('active')
        self.drawer.querySelector('.nav-drawer__drawer-content').appendChild(html)
        const newHeight = self.drawer.querySelector('.nav-drawer__drawer-content .nav-drawer__ul').offsetHeight + 30
        self.setListHeight(oldHeight, newHeight)
      })

      if (noRef) {
        noRef.addEventListener('click', (e) => {
          e.preventDefault()
          const oldHeight = self.main.offsetHeight
          const html = row.querySelector('.nav-drawer__ul').cloneNode(true)
          html.classList.remove('dropdown-menu')
          self.main.classList.add('open')
          self.drawer.classList.add('active')
          self.drawer.querySelector('.nav-drawer__drawer-content').appendChild(html)
          const newHeight = self.drawer.querySelector('.nav-drawer__drawer-content .nav-drawer__ul').offsetHeight + 30
          self.setListHeight(oldHeight, newHeight)
        })
      }
    })

    this.backBtn.addEventListener('click', (e) => {
      e.preventDefault()
      const oldHeight = self.drawer.querySelector('.nav-drawer__drawer-content .nav-drawer__ul').offsetHeight + 30
      self.main.classList.remove('open')
      self.drawer.classList.remove('active')
      self.drawer.querySelector('.nav-drawer__drawer-content').innerHTML = ''
      const newHeight = self.main.offsetHeight
      self.setListHeight(oldHeight, newHeight)
    })
  }

  setListHeight(oldH, newH) {
    new Tweezer({
      start: parseInt(oldH),
      end: parseInt(newH),
      duration: 250
    })
      .on('tick', (v) => {
        this.drawerInner.style.height = `${v}px`
      })
      .begin()
  }
}

export default new NavDrawer()
