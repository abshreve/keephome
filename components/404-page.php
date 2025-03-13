<section class="error-404">
    <div class="error-404__container container">
        <img src="<?= get_stylesheet_directory_uri() ?>/images/404Page_730x850-2.gif" class="error-404__image" />
        <div class="error-404__content">
            <div class="error-404__message">
                <h1>Whoops, we can't find <br>the address you're looking for.</h1>
                <p class="h4">Tell us where you'd like to go.</p>
            </div>
            <form class="error-404__search" action="<?= home_url() ?>/" method="get">
                <div class="input error-404__input">
                    <img src="<?= get_stylesheet_directory_uri() ?>/images/icon-search.svg" class="error-404__icon" alt="" />
                    <input aria-label="search term" type="text" name="s" class="error-404__input" />
                </div>
                <input type="submit" class="error-404__submit" />
            </form>
        </div>
    </div>
</section>