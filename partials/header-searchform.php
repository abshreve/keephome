<div class="header-search">
    <form role="search" method="get" class="searchform" action="<?= home_url( '/' ); ?>">
        <div class="searchform__inner d-flex align-items-center">
            <label for="s" class="sr-only screen-reader-text"><?php _e('Search for:','cu_textdomain'); ?></label>
            <img class="searchform__icon" src="<?= get_image('search.svg') ?>" alt="">
            <div class="searchform__input-container flex-fill">
                <input type="search" class="searchform__input" id="s" name="s" value="" />
                <img src="<?= get_image('icon_x.svg') ?>" alt="click to clear search terms" role="button" class="searchform__clear" />
            </div>
        </div>
    </form>
</div>