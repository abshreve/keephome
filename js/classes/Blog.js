export default class Blog {
  constructor() {
    this.$loadPosts = $('.load-posts');
    const self = this;
    if (this.$loadPosts.length) {
      this.$loadPosts.each(function () {
        const $container = $(this);
        self.getPosts($container);
        $container.find('.load-more').on('click', (e) => {
          self.getPosts($container);
        });
      });
    }

    if ($('.toggle-categories').length) {
      $('.toggle-categories').click((e) => {
        const $button = $(e.currentTarget);
        if ($button.attr('aria-expanded') == 'true') {
          $button.attr('aria-expanded', 'false');
        }
        else {
          $button.attr('aria-expanded', 'true');
        }
        $('#' + $button.attr('aria-controls')).slideToggle();
      });
    }
  }

  getPosts($container) {
    let $listContainer = $container.find('.post-list');
    let $loadMoreBtn = $container.find('.load-more');

    const data = {
      'ajax-action': 'getPosts',
      'category': $container.data('category'),
      'tag': $container.data('tag') ? $container.data('tag') : 0,
      'limit': $container.data('limit'),
      'featured': $container.data('featured'),
      'post_type': $container.data('post-type'),
      'offset': $container.data('offset')
    }

    if($container.data('not')) {
      data.not = $container.data('not')
    }

    $.ajax({
      url: '',
      type: 'get',
      data: data,
      dataType: 'json',
      success: (results) => {
        console.log(results)
        $loadMoreBtn.hide();
        if (results && results.posts && Array.isArray(results.posts)) {
          $container.data('offset', $container.data('offset') + results.posts.length);
          if (results.posts.length) {
            results.posts.forEach((post) => {
              $listContainer.append(this.render(post, $container.data('display')));
            });
            if (results.more_results) {
              $loadMoreBtn.show();
            }
          }
        }
      }
    });
  }

  render(post, display) {
    let ret = '<div class="col-12 post-col';
    if (display == 'full') {
      ret += ' col-lg-4';
    }
    else if (display == 'half') {
      ret += ' col-lg-6';
    }
    ret += '">';
    ret += '<div class="post-card ' + display + '">';

    if (display == 'half') {
      ret += '<div class="image-col">';
    }
    if (post.thumb && post.thumb.sizes.post_thumbnail) {
      ret += '<a href="' + post.url + '">';
      ret += '<img src="' + post.thumb.sizes.post_thumbnail + '" alt="' + post.thumb.alt.replace(/\"/g, '\\"') + '" > ';
      ret += '</a>';
    }
    if (display == 'half') {
      ret += '</div><div class="content-col">';
    }
    if (post.category) {
      ret += '<div class="category"><a href="/' + post.category.slug + '">' + post.category.cat_name + '</a></div>';
    }
    ret += '<h4 class="bold"><a href="' + post.url + '">' + post.post.post_title + '</a></h4>';
    ret += '<div class="description"><p>' + post.description + '</p></div>';
    ret += '<div class="date">' + post.date + '</div>';
    ret += '</div>';
    ret += '</div>';

    return ret;
  }

}

jQuery(document).ready(function () {
  new Blog();
});
