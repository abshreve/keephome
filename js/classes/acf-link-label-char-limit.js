export default class AcfLinkLabelCharLimit {
  constructor (field) {
    $('input[name="acf[field_5d7b9b948c3fc][row-0][field_5d7bae5e87f9f][title]"').change(function(e){
      console.log('holy shit')
    });
    this.field = field
    this.limit = 20 // default value
    
    this.label = this.field.querySelector('.link-node')
    this.input = this.field.querySelector('.acf-input')
    this.labelInput = this.field.querySelector('.acf-input .input-title')
    console.log('field', this.field)
    // console.log('label', this.label)
    console.log('label input', this.labelInput)
    this.init()
  }

  init () {
    const self = this
    this.setLimit()
    this.setLimitMessage()
    this.handleLabelChange()
    this.labelInput.oninput = () => {console.log('test')}// self.handleLabelChange()
  }

  handleLabelChange (evt) {
    console.log('change', this.labelInput.value.substring(0, this.limit))
    this.labelInput.value = this.labelInput.value.substring(0, this.limit)
    return true
  }

  setLimitMessage () {
    const message = document.createElement('span')
    message.innerHTML = `Label is limited to <span style="color: red">${this.limit}</span> characters, e.g. "${this.labelInput.value.substring(0, this.limit)}"`
    this.input.appendChild(message)

  }

  setLimit () {
    let limit = 20
    this.field.classList.forEach(cls => {
      if(cls.indexOf('char-limit--') !== -1) {
        const clsArr = cls.split('--')
        clsArr.forEach(item => {
          // console.log(parseInt(item))
          if(parseInt(item)) this.limit = parseInt(item)
        })
      }
    })
    // console.log('limit', limit)
  }
}
