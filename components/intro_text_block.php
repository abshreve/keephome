<?php
$subheading = get_sub_field('subheading');
$title = get_sub_field('title');
$useH1 = get_sub_field('use_h1');
$text = get_sub_field('text_content');
$backgroundColor = get_sub_field('background_color');
$download = get_sub_field('download');
?>

<section class="intro-text-block" style="background-color: <?= $backgroundColor ?>;">
  <div class="container">
    <div class="row">
      <div class="col-12"><?php
        if (!empty($subheading)) { ?>
          <div class="subheading"><?= $subheading ?></div><?php
        }

        echo ($useH1) ? '<h1>'.$title.'</h1>' : '<h3>'.$title.'</h3>'; ?>

        <div class="text-content"><?php
          echo $text;
          if (!empty($download)){ ?>
            <a href="<?= $download['url'] ?>" <?= (get_field('no_follow',$download['ID'])) ? 'rel="nofollow"' : null ?>target="_blank" class="button btn--blue">Download</a><?php
          } ?>
        </div>
      </div>
    </div>
  </div>
</section>