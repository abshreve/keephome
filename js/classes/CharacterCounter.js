class CharacterCounter {
  constructor () {
    this.limit = 40
    this.length = 0
    this.countBox = null
    this.init()
  }

  init () {
    if(document.querySelector('.block-editor__container')) {
      this.gutenbergActive = true
    } else {
      this.gutenbergActive = false 
    }

    if(this.gutenbergActive) {
      this.titleWrap = document.querySelector('#editor .editor-post-title__block')
      this.titleInput = document.querySelector('.editor-post-title .editor-post-title__input')
    } else {
      this.titleWrap = document.querySelector('#titlewrap')
      this.titleInput = document.querySelector('#titlewrap input')
    }
    
    this.length = this.titleInput.value.length

    const self = this
    this.addCounterBox()
    this.titleInput.addEventListener('keyup', (e) => {
      this.length = this.titleInput.value.length
      this.setCount()
    })
  }

  setCount () {
    this.countBox.innerText = this.length
    if(this.length > 40){
      this.countBox.classList.add('limit-break')
    } else {
      this.countBox.classList.remove('limit-break')
    }
  }

  addCounterBox () {
    const box = document.createElement('span')
    box.classList.add('char-counter')
    this.titleWrap.appendChild(box)
    if(this.gutenbergActive) {
      this.countBox = document.querySelector('#editor .editor-post-title__block .char-counter')
      this.countBox.classList.add('js-editor')
    } else {
      this.countBox = document.querySelector('#titlewrap .char-counter')
      this.countBox.classList.add('legacy-editor')
    }
    this.setCount()
  }
}

document.addEventListener('DOMContentLoaded', function() {
  if(document.querySelector('body.wp-admin.post-php.post-type-post')){
    new CharacterCounter()
  }
})