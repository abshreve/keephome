<?php
$video = get_sub_field('video_embed');

if (!empty($video)) : ?>
  <section class="video-embed-component">
    <div class="container">
      <div class="row">
        <div class="col-12 col-xl-10 offset-xl-1">
          <?= $video ?>
        </div>
      </div>
    </div>
  </section>
<?php endif; ?>