import Tweezer from 'tweezer.js'

const curry = (f, ...args) => args.length >= f.length ? f(...args) : curry.bind(this, f, ...args)

const matchHeight = (items) => {
  let height = 0
  // get the highest height value
  items.forEach(function(item) {
    height = (height < item.offsetHeight) ? item.offsetHeight : height
  })

  // set the heights to the set value
  items.forEach((item) => {
    item.style.height = `${height}px`
  })
}

const doesSupportObjectFit = () => {
  const i = document.createElement('img')
  return ('objectFit' in i.style)
}

// const getChildren = pipe(
//   getProp('children'),
//   toArray
// )

const getParent = (elem, selector) => {
  for ( ; elem && elem !== document; elem = elem.parentNode ) {
    if (selector) {
      if (elem.matches(selector)) {
        return elem
      }
      continue
    }
  }  
}

const getParents = (elem, selector) => {
  // Set up a parent array
  var parents = []

  // Push each parent element to the array
  for ( ; elem && elem !== document; elem = elem.parentNode ) {
    if (selector) {
      if (elem.matches(selector)) {
        parents.push(elem)
      }
      continue
    }
  }
  return parents
}

// const getProp = curry((prop, obj) => {
//   return obj[prop]
// })

const getWidth = () => {
	if (typeof window.innerWidth != 'undefined') {
    return window.innerWidth;
  }
	else if (typeof document.documentElement != 'undefined' && typeof document.documentElement.clientWidth != 'undefined' && document.documentElement.clientWidth != 0) {
    return document.documentElement.clientWidth;
  }
	else {
    return document.getElementsByTagName('body')[0].clientWidth;
  }
}

const toArray = (nodes) => {
  return Array.prototype.slice.call(nodes)
}

const scrollTo = (location) => {
  new Tweezer({
    start: window.scrollY,
    end: location.getBoundingClientRect().top + window.scrollY
  })
  .on('tick', v => window.scrollTo(0, v))
    .begin()
}

const pipe = (...funcs) => function (val) { return funcs.reduce((acc, f) => f.apply(this, [ acc ]), val) }

export {
  curry,
  doesSupportObjectFit,
  // getChildren,
  getWidth,
  getParent,
  getParents,
  // getProp,
  matchHeight,
  pipe,
  scrollTo,
  toArray
}

