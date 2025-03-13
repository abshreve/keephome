import ParentClass from './Parent.js'

class RecentPosts extends ParentClass {
    constructor(el) {
        super()
        // this.el = el

        const $recentPostsSlider = $('.recent-posts-slider')

        $recentPostsSlider.on('setPosition afterChange', (event, slick, currentSlide) => {
            let sliderWidth = $recentPostsSlider.find('.slick-list').width()
            let $slides = $recentPostsSlider.find('.slick-list .slick-slide')
            $slides.each((i, el) => {
                var rect = el.getBoundingClientRect()
                if( rect.left >= -1 && rect.right <= sliderWidth ){
                    $(el).addClass('slide--visible')
                } else {
                    $(el).removeClass('slide--visible')
                }
            })
        })        

        const $slider = $recentPostsSlider.slick({
            arrows: false,
            mobileFirst: true,
            variableWidth: true,
            infinite: true,
            responsive: [{
             breakpoint: 1199,
             settings: {
                 slidesToShow: 4,
             }
            }]
        })        
    }
}

export default function(el) {
    new RecentPosts(el)
}