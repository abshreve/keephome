<?php get_header(); ?>
<main class="content-search">
  <div class="container">
    <h1 class="page-title">Search Results for "<?php echo esc_attr(get_search_query()); ?>"</h1>
    <?php if (have_posts()):
      while (have_posts()): the_post(); ?>
        <article id="post-<?php the_ID(); ?>">
          <a href="<?php the_permalink() ?>"><header class="article-header">
            <h3><?php the_title(); ?></h3>
          </header>
          </a>
          <section>
            <p>
              <?php echo get_post_meta(get_the_ID(), '_yoast_wpseo_metadesc', true); ?>
            </p>
          </section>
        </article>
      <?php endwhile; ?>
  		<?php cu_pagination(); ?>
  	<?php else: ?>
			<article class="post-not-found">
				<header class="article-header">
					<h3>Sorry, No Results.</h3>
				</header>
				<section>
					<p>Try your search again.</p>
				</section>
			</article>
  	<?php endif; ?>
  </div>
</main>

<?php get_footer(); ?>
