import { scrollTo, toArray } from '../lib/utils'

class Footer {
  constructor () {

    this.get = {};
    this.footerForm = document.querySelector('#footer-form')
    
    if(document.location.toString().indexOf('?') !== -1) {
      const query = document.location
      .toString()
      // get the query string
      .replace(/^.*?\?/, '')
      // and remove any existing hash string (thanks, @vrijdenker)
      .replace(/#.*$/, '')
      .split('&')

      for(var i=0, l=query.length; i<l; i++) {
        var aux = decodeURIComponent(query[i]).split('=')
        this.get[aux[0]] = aux[1]
      }
    }

    if(this.footerForm){
      const inputs = toArray(this.footerForm.querySelectorAll('.footer-form__input'))
      inputs.forEach( (input) => {
        input.addEventListener('focus', (e) => {
          if(e.target.selectionStart !== null) {
            e.target.parentNode.querySelector('.footer-form__label').classList.add('active')
          }
        })

        input.addEventListener('blur', (e) => {
          if(e.target.value === ''){
            e.target.parentNode.querySelector('.footer-form__label').classList.remove('active')
          }
        })
      })
      
      //get the 'index' query parameter
      if (this.get['thanks']) {
        scrollTo(this.footerForm)
      }
    }
  }
}

export default new Footer()