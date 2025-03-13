import ParentClass from './Parent.js'
import Tweezer from 'tweezer.js'
import { getWidth, toArray } from '../lib/utils.js'

class NavDesktop extends ParentClass {
  constructor(el) {
    super()
    this.header = document.querySelector('.header__nav')
    this.initHeight = this.header.offsetHeight
    this.nav = document.querySelector('.nav-desktop')
    this.listItems = toArray(document.querySelectorAll('.nav-desktop__row'))
    this.init()
  }

  init() {
    const self = this

    const desktopLinks = toArray(this.nav.querySelectorAll('.nav-desktop__row .nav-item'))
    desktopLinks.forEach(link => {
      link.querySelector('.nav-link').addEventListener('mouseover', (e) => {
        e.target.classList.add('link', 'link--taupe', 'link--arrow')
      })

      link.querySelector('.nav-link').addEventListener('mouseout', (e) => {
        e.target.classList.remove('link', 'link--taupe', 'link--arrow')
      })
    })

    this.listItems.forEach(item => {
      item.addEventListener('mouseenter', (e) => {
        if (getWidth() >= 1200) {
          self.listItems.forEach(item => {
            item.classList.remove('active')
          })
          let newHeight = self.initHeight
          if (item.querySelector('.nav-desktop__ul') !== null) {
            newHeight = self.initHeight + item.querySelector('.nav-desktop__ul').offsetHeight - 20
          }
          let oldHeight = self.initHeight
          const activeItems = toArray(self.header.querySelectorAll('.nav-desktop__row.active'))

          if (activeItems.length > 0 && self.header.style.height) {
            // re-calc the height to work with the active menu
            if (item.querySelector('.nav-desktop__ul') !== null) {
              newHeight = self.header.style.height + self.header.querySelector('.nav-desktop__row.active').offsetHeight - 20
            }
            oldHeight = self.header.style.height

            // remove ative classes from rows (should only be one but just make sure)
            const rmv = toArray(self.header.querySelector('.nav-desktop__row.active'))
            rmv.forEach(item => {
              item.classList.remove('active')
            })
          }

          item.classList.add('active')
          self.setListHeight(oldHeight, newHeight)
        }
      })
    })

    this.header.querySelector('#menu-header').addEventListener('mouseleave', (e) => {
      if (getWidth() >= 1200) {
        let newHeight = self.initHeight
        if (e.target.querySelector('.nav-desktop__ul') !== null) {
          newHeight = self.initHeight + e.target.querySelector('.nav-desktop__ul').offsetHeight - 20
        }
        self.setListHeight(newHeight, self.initHeight)
        self.listItems.forEach(item => {
          item.classList.remove('active')
        })
      }
    })

    window.addEventListener('resize', e => {
      // if getWidth() < 1200) {
      this.header.style.removeProperty('height')
      const rmv = self.header.querySelectorAll('.nav-desktop__row.active')
      rmv.forEach(item => {
        item.classList.remove('active')
      })
      // }
    })

  }

  setListHeight(oldH, newH) {
    new Tweezer({
      start: parseInt(oldH),
      end: parseInt(newH),
      duration: 150
    })
      .on('tick', (v) => {
        this.header.style.height = `${v}px`
      })
      .on('done', () => {
        this.nav.classList
      })
      .begin()
  }
}

export default function (el) {
  new NavDesktop(el)
}
