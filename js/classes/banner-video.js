import ParentClass from './Parent.js'

const Promise = require('es6-promise-promise')
const axios = require('axios')

class BannerVideo extends ParentClass {
  constructor (el) {
    super()
    this.el = el
    this.video = this.el.querySelector('.banner-video__embed-container')
    axios.defaults.headers.post['Content-Type'] = 'application/x-www-form-urlencoded'
    this.init()
  }

  init () {
    // this.videos.forEach((video) => {
      const url = (this.video.dataset.type === 'vimeo') ? this.buildVimeoURL(this.video.dataset.url) : this.buildYouTubeURL(this.video.dataset.url)
      if (this.video.dataset.type === 'vimeo') {
        axios.get(url).then(res => {
          this.video.innerHTML = res.data.html
        })
      }
    // })
  }

  buildVimeoURL (videoURL) {
    return `https://vimeo.com/api/oembed.json?url=${videoURL}&responsive=true&byline=false&muted=true&title=false` // controls=false
  }

  buildYouTubeURL (videoURL) {
    // return `https://www.youtube.com/oembed?url=${videoURL}&format=json` // was originally returning a CORS error
  }
}

export default function (el) {
  new BannerVideo(el)
}
