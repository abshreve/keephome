window.$ = window.jQuery = require('jquery')
window.Popper = require('popper.js').default
require('bootstrap')

//polyfill: adds forEach() to nodeLists in ie11
import './polyfills/ie11-foreach.js'
import './lib/scrollTo'
import 'slick-carousel'
import Global from './classes/Global.js'
import Header from './classes/Header.js'
import Footer from './classes/Footer.js'
import ToTop from './classes/ToTop.js'
import NavDrawer from './classes/NavDrawer.js'
import ToolsTips from './classes/ToolsTips.js'
import ContactForm from './classes/ContactForm.js'
import Terms_and_privacy from './classes/termsandprivacy.js'
import Careers from './classes/Careers.js'
import Blog from './classes/Blog.js'
import Slider from './classes/Slider.js'
// import PowerOfHome from './classes/PartnersLeadGen.js'

import init from './lib/init-components'

document.addEventListener('DOMContentLoaded', () => {
  // Init components
  init({
    component: 'components'
  }).mount()
})