<?php if ( have_rows('my_component') ): ?>
  <section class="component-my-component">
    <div class="my-component">
      <?php while ( have_rows('my_component') ): the_row();
        $image = get_sub_field('image');
        ?>
        <div class="my-component-slide">
          <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt'] ?>">
        </div>
      <?php endwhile; ?>
    </div>
  </section>
<?php endif; ?>
