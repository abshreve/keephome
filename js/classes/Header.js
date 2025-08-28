import Toolbar from './Toolbar.js'
import { toArray } from '../lib/utils.js'


class Header {
  constructor() {
    this.header = document.querySelector('header.header')
    this.search = document.querySelector('.header-search')
    this.toolbar = document.querySelector('.toolbar')
    this.nav = document.querySelector('.header__nav')
    this.searchBtns = toArray(document.querySelectorAll('.toggle-search-btn'))

    // set up different headers with their own events
    this.defaultHeader = document.querySelector('.page-template-default .header__inner')

    this.init()
  }

  init() {
    const self = this
    this.headerScroll()

    window.addEventListener('scroll', e => {
      self.headerScroll()
    })

    if(this.search) {
      this.search.querySelector('.searchform .searchform__clear').addEventListener('click', (e) => {
        self.search.querySelector('.searchform__input').value = '';
        this.search.classList.remove('show');
      })
    }

    if(this.searchBtns) {
      this.searchBtns.forEach(btn => {
        btn.addEventListener('click', (e) => {
          if (this.search.classList.contains('show')) {
            this.search.classList.remove('show')
          } else {
            this.search.classList.add('show')
          }
        })
      })
    }


    if(!this.header.classList.contains('full')) {
      // header height management (specific templates only, see scss)
      document.addEventListener('scroll', () => self.headerSizeCheck())
      // document.addEventListener('resize', () => self.headerSizeCheck())
      this.headerSizeCheck()
    }
  }

  headerSizeCheck(){
    if (window.scrollY > 150) {
      this.header.classList.add('is-scrolled-past')
    } else  if (window.scrollY < 60) {
      this.header.classList.remove('is-scrolled-past')
    }
  }

  headerScroll() {
    if (window.pageYOffset > 50) {
      (this.toolbar) ? this.toolbar.classList.add('hide-on-scroll') : null
      this.nav.classList.add('bg-on-scroll')
    } else {
      (this.toolbar) ? this.toolbar.classList.remove('hide-on-scroll') : null
      this.nav.classList.remove('bg-on-scroll')
    }
  }
}

export default new Header()