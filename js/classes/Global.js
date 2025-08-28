import ParentClass from './Parent.js';
import { throttle } from 'lodash';

class Global extends ParentClass {
    constructor() {
        super();

        $('.header__nav .nav-desktop__row').hover(
            function () {
                $('.header__nav').addClass('has-sub-menu-open');
                $('.toolbar').addClass('header-has-sub-menu-open');
            },
            function () {
                //$('.header__nav').removeClass('has-sub-menu-open');
                //$('.toolbar').removeClass('header-has-sub-menu-open');
            }
        )

        // Modual Popup on Homepage
        $('#myModal').modal('show')

        $('#navbar-collapse-menu')
            .on('show.bs.collapse', () => {
                $('.header__nav').addClass('header__nav--expanded')
            })
            .on('hide.bs.collapse', () => {
                $('.header__nav').removeClass('header__nav--expanded')
            })

        this.objectFitAlternative();

        $('.dropdown.nav-item')
            .on('shown.bs.dropdown', (e) => {
                $('.header__nav').addClass('has-sub-menu-open-click');
                // Hide other nav-items
                $(e.target).siblings().not(".log-in-item, .sign-up-item").addClass('hidden-on-mobile');
            })
            .on('hidden.bs.dropdown', (e) => {
                $('.header__nav').removeClass('has-sub-menu-open-click');
                // Show other nav-items
                $(e.target).siblings().not(".log-in-item, .sign-up-item").removeClass('hidden-on-mobile');
            })
    }

    objectFitAlternative() {
        // if object fit not supported
        // then get img url, hide it and make bg image element
        // This is only necessary because object fit is not supported by ie10+
        let $landingPageImageContainers = $('.landing-page-hero__img-container');
        // Checks if there are any landingPageImageContainers and if object fit is not supported by the user's browser
        if ($landingPageImageContainers.length > 0 && ('objectFit' in document.documentElement.style === false)) {
            $landingPageImageContainers.each((i, el) => {
                let imgUrl = $(el).find('.landing-page-hero__image').first().attr('src');
                $landingPageImageContainers.addClass('ie-object-fit');
                $('<div/>', {
                    class: 'landing-page-hero__bg-image',
                    style: `background-image:url('${imgUrl}')`
                }).appendTo($(el));
            })
        }
    }
}

jQuery(document).ready(function () {
    new Global();
});