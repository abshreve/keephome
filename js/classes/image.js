import { doesSupportObjectFit } from '../lib/utils'
import ParentClass from './Parent.js';

class Image extends ParentClass {
  constructor (el) {
    super()
    this.el = el
    this.objectFit = doesSupportObjectFit()
  }
}

export default function(el) {
  new Image(el)
}