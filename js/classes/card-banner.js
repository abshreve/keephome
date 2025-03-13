import ParentClass from './Parent.js' // eslint-disable-line

class CardBanner extends ParentClass {
  constructor (el) {
    super()
    this.el = el

    const cards = this.el.querySelectorAll('.card-banner__card')

    cards.forEach(card => {
      card.addEventListener('click', function () {
        if(window.innerWidth < 992){
          card.classList.toggle('active')
        }
      })

      card.addEventListener('mouseover', function () {
        if(window.innerWidth >= 992){
          card.classList.toggle('active')
        }
      })

      card.addEventListener('mouseout', function () {
        if(window.innerWidth >= 992){
          card.classList.toggle('active')
        }
      })
    })

    window.addEventListener('resize', (e) => {
      if (this.el.querySelector('.card-banner__card.active')) {
        this.el.querySelector('.card-banner__card.active').classList.remove('active')
      }
    })
  }
}

export default function (el) {
  new CardBanner(el)
}
