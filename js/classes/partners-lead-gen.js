import ParentClass from './Parent.js';

class PartnersLeadGen extends ParentClass {
  constructor (el) {
    super()
    this.form = el.querySelector('#power-of-home-form')
    this.termsChecked = false
    this.termsAccepted = false

    if (this.form) {
      this.redirect = this.form.dataset['redirect']
      this.termsScroll = el.querySelector('.terms-scroll')
      this.modal = el.querySelector('#termsModal')
      this.modalBtns = el.querySelectorAll('.terms-btn')
      this.inputs = this.form.querySelectorAll('.contact-form__input-wrap')
      this.submitBtn = this.form.querySelector('.contact-form__submit')
      this.modalTriggeredBySubmit = false
      this.addEvents()
    }
  }

  addEvents () {
    const self = this

    this.submitBtn.addEventListener('click', (e) => {
      e.preventDefault()
      if (self.validate()) {
        this.submit()
      } else {
        this.modalTriggeredBySubmit = true
        $(self.modal).modal('show')
      }
    })

    this.inputs.forEach( item => {
      item.querySelector('input').addEventListener('focus', e => e.target.classList.add('touched'))
      item.querySelector('input').addEventListener('blur', e => self.validate())
      item.querySelector('input').addEventListener('keyup', e => self.validate())
    })
  
    this.modal.querySelector('.modal--close').addEventListener('click', evt => {
      evt.preventDefault()
      $(self.modal).modal('hide')
    })

    this.termsScroll.addEventListener('scroll', e => {
      const obj = e.target
      // this.termsChecked = true
      obj.classList.add('is-complete')
      if( obj.scrollTop >= (obj.scrollHeight - obj.offsetHeight - 30)) {
        this.termsChecked = true
        obj.classList.add('is-complete')
        this.modalBtns.forEach(btn => {
          btn.disabled = false
        })
        this.validate()
      }
    })

    this.modalBtns.forEach(btn => {
      btn.addEventListener('click', evt => {
        const value = evt.target.dataset['value']
        const msg = self.form.querySelector('.terms-label')

        switch (value) {
          case 'accept':
            if (this.termsChecked) {
              self.termsAccepted = true
              msg.classList.remove('terms-error')

              if (self.validate() && self.modalTriggeredBySubmit) {
                this.submit()
              }
              break
            }
            msg.classList.add('terms-error')
            break

          case 'decline':
            self.termsAccepted = false
            self.modalTriggeredBySubmit = false
            msg.classList.add('terms-error')
            break
        }

        self.validate()
        $(self.modal).modal('hide')
      })
    })
  }

  emailIsValid (email) {
    return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)
  }

  submit () {
    if(!this.validate()) return 

    const inputs = this.form.querySelectorAll('input')
    const formData = new FormData(this.form)
    const overlay = this.form.querySelector('.overlay')

    overlay.classList.add('working')
    
    window.fetch(this.form.action, {method: 'post', body: formData})
      .then(res => {
        res.json().then(data => {

          if (this.redirect) {
            // setTimeout( e => {
              overlay.classList.remove('working')
              window.location = this.redirect
            // }, 3000)
          }
        })
      }).catch(e => {
        overlay.classList.remove('working')
        alert('Submission failed. Please try again later.')
      })
  }

  validate () {
    let valid = true
    this.submitBtn.disabled = true
    this.form.querySelectorAll('.contact-form__input-wrap').forEach(item => {
      let errorMsg = item.querySelector('.invalid-feedback')
      let value = item.querySelector('input').value
      errorMsg ? errorMsg.classList.remove('shown') : null

      if (item.querySelector('input').classList.contains('touched')) {
        switch(item.querySelector('input').type) {
          case 'text':
            if (!value || value === '') {
              errorMsg ? errorMsg.classList.add('shown') : null
              valid = false
            }
            break
          case 'email':
            if (!this.emailIsValid(value)) {
              errorMsg ? errorMsg.classList.add('shown') : null
              valid = false
            }
        }
      } else {
        valid = false
      }
    })

    if (valid) {
      this.submitBtn.disabled = false
    }

    // determines what the submit button does
    if (valid) {
      // ensure the terms have been checked
      valid = this.termsAccepted ? true : false
    }

    return valid
  }
}

export default function(el) {
  new PartnersLeadGen(el)
}