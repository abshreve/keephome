import { objectFit } from '../polyfills/ie11-object-fit'

class Modal {
  constructor(el) {
    this.modal = el
    if (this.modal) {
      this.cookie = this.modal.dataset['cookie_id'] ? this.modal.dataset['cookie_id'] : false
      this.expiration = this.modal.dataset['cookie_expiration'] ? this.modal.dataset['cookie_expiration'] : false
      this.init()
    }
  }

  init() {

    objectFit(document.querySelector('.modal-header__img'), document.querySelector('.modal-header .object-fit'))
    this.modal.addEventListener('click', () => {
      this.setCookie()
    })
  }

  hasCookie() {
    if (!this.cookie || this.cookie === '') return false
    return (document.cookie.indexOf(this.cookie) > -1)
  }

  setCookie() {
    const date = new Date()
    date.setTime(date.getTime() + (this.expiration * 24 * 60 * 60 * 1000000000000000))
    const expires = `expires=${date.toUTCString()}`
    document.cookie = `${this.cookie}=true; ${expires}; path=/`
  }
}

export default function (el) {
  new Modal(el)
}