<?php
$image = get_sub_field('image');
$mobileImage = get_sub_field('mobile_image');
$url = get_sub_field('link_url');
?>

<section class="ad-component">
  <div class="container">
    <div class="row">
      <div class="col-12 col-xl-8 offset-xl-2"><?php
        if (!empty($url)) { ?>
          <a href="<?= $url ?>"><?php
        }
        if (!empty($mobileImage)) { ?>
          <img class="d-sm-none" src="<?= $mobileImage['url'] ?>" alt="<?= esc_attr($mobileImage['alt']) ?>"><?php
        } ?>
        <img class="<?php if (!empty($mobileImage)) : ?>d-none d-sm-block<?php endif; ?>" src="<?= $image['url'] ?>" alt="<?= esc_attr($image['alt']) ?>"><?php
        if (!empty($url)) { ?>
          </a><?php
        } ?>
      </div>
    </div>
  </div>
</section>