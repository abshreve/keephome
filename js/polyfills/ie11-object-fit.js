/*** 
 * this uses a js check for ie browsers.
 * if one is found this will use the src of the object-fit image as the background of the container.
 * it will then add a class which sets background-size: cover and background-pos: center
 * the image gets set to opacity 0 and only the bk image will show
 * this pairs with polyfill css of the same name
 ***/

 import {doesSupportObjectFit} from '../lib/utils'

const objectFit = (img, container) => {
	
	if(!doesSupportObjectFit()) {
		const src = img.getAttribute('src')
		container.style.backgroundImage = 'url("' + src + '")'
		container.classList.add('object-fit--cover')
	}
}

export {
	objectFit
}
