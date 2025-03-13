import ParentClass from './Parent.js' // eslint-disable-line
import Tweezer from 'tweezer.js'

class CookieAnnounce extends ParentClass {
  constructor (el) {
    super()
    this.banner = el
    this.button = this.banner.querySelector('.cookie__btn')
    this.cookie = 'accepts_cookies'
    this.init()
  }

  init () {
    const self = this // pass 'self' into events bc 'this' has a different context in them

    if (this.hasCookie()) {
      this.hideBanner()
    } else {
      this.showBanner()
    }

    this.button.addEventListener('click', (e) => {
      e.preventDefault()
      self.handleClick()
    })
  }

  hasCookie () {
    return (document.cookie.indexOf(this.cookie) > -1)
  }

  handleClick () {
    this.setCookie()
    this.hideBanner()
  }

  setCookie () {
    const date = new Date()
    date.setTime(date.getTime() + (7 * 24 * 60 * 60 * 1000000000000000))
    const expires = `; expires=${date.toUTCString()}`
    document.cookie = `${this.cookie}=true${expires}; path=/`
  }

  showBanner () {
    this.banner.classList.remove('hidden')
  }

  hideBanner () {
    new Tweezer({
      start: 1000,
      end: 0,
      duration: 500
    })
    .on('tick', (v) => {
      this.banner.style.opacity = v/1000
    })
    .on('done', ()=> {
      this.banner.classList.add('hidden')
    })
    .begin()
  }
}

export default function (el) {
  new CookieAnnounce(el)
}
