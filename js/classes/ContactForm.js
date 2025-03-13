import { toArray } from '../lib/utils'

class ContactForm {
  constructor () {
    if (!document.querySelector('.contact-form')) return
    this.form = document.querySelector('.contact-form')
    this.init()
  }
  init () {
    const inputs = toArray(this.form.querySelectorAll('.contact-form__input'))

    inputs.forEach( (input) => {
      input.addEventListener('focus', (e) => {
        if(e.target.selectionStart !== null) {
          e.target.parentNode.querySelector('.contact-form__label').classList.add('active')
        }
      })

      input.addEventListener('blur', (e) => {
        if(e.target.value === ''){
          e.target.parentNode.querySelector('.contact-form__label').classList.remove('active')
        }
      })
    })
    window.addEventListener('load', function() {
      // Fetch all the forms we want to apply custom Bootstrap validation styles to
      var forms = document.getElementsByClassName('needs-validation')
      // Loop over them and prevent submission
      var validation = Array.prototype.filter.call(forms, function(form) {
        form.addEventListener('submit', function(event) {
          if (form.checkValidity() === false) {
            event.preventDefault()
            event.stopPropagation()
          }
          form.classList.add('was-validated')
        }, false)
      })
    }, false)
  }
}

export default new ContactForm()