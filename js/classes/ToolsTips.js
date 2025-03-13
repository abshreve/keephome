import ParentClass from './Parent.js'
import { matchHeight, toArray } from '../lib/utils.js'

class ToolsTips {
  constructor() {

    // if (!document.querySelector('.tools-tips')) return
    // this.sets = toArray(document.querySelectorAll('.tools-tips'))
    // console.log(this.sets)
    // this.init()
  }

  init() {
    // const self = this
    // this.sets.forEach(set => {
    //   console.log(set.querySelectorAll('.card__inner'))
    //   matchHeight(toArray(set.querySelectorAll('.card__inner')))
    // })

    // window.addEventListener('resize', (e) => {
    //   this.sets.forEach(set => {
    //     console.log(set.querySelectorAll('.card__inner'))
    //     matchHeight(toArray(set.querySelectorAll('.card__inner')))
    //   })
    // })
    
  }
}

export default new ToolsTips()
