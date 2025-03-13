import ParentClass from './Parent.js' // eslint-disable-line

class FontScaler extends ParentClass {
  constructor (el) {
    super()
    this.cookie = 'font_scale'
    this.scaleNormal = 62.5
    this.scaleLarge = 77.5
    this.ctx = el
    this.init()
  }

  init () {
    const self = this

    // check initial value of cookie
    if (this.hasCookie()) {
      if (this.getCookieValue() == this.scaleLarge) {
        this.ctx.classList.add('font-lg')
      }
      this.setFontSize(this.getCookieValue())
    }

    // Attach Events
    this.ctx.addEventListener('click', () => {
      self.handleClick()
    })
  }

  handleClick () {
    if (this.ctx.classList.contains('font-lg')) {
      this.ctx.classList.remove('font-lg')
      this.setCookie(this.scaleNormal)
      this.setFontSize(this.scaleNormal)
    } else {
      this.ctx.classList.add('font-lg')
      this.setCookie(this.scaleLarge)
      this.setFontSize(this.scaleLarge)
    }
  }

  hasCookie () {
    return (document.cookie.indexOf(this.cookie) > -1)
  }

  getCookieValue () {
    let scale = 62.5
    var value = '; ' + document.cookie
    var parts = value.split('; ' + this.cookie + '=')
    if (parts.length === 2) {
      scale = parts[1]
    }
    return scale
  }

  setCookie (val) {
    const date = new Date()
    date.setTime(date.getTime() + (7 * 24 * 60 * 60 * 1000))
    const expires = `expires=${date.toUTCString()}`
    document.cookie = `${this.cookie}=${val}; ${expires}; path=/`
  }

  setFontSize (scale) {
    document.querySelector('html').style.fontSize = scale + '%'
  }
}

export default function (el) {
	new FontScaler(el)
}
