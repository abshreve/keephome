<?php
$type = ($type) ? $type : 'copy';
$image = ($image) ? $image : get_sub_field('image');
$cta = ($cta) ? $cta : get_sub_field('cta');
$section_classes = ($section_classes) ? $section_classes : '';
$section_classes .= ' hero-post--'.$type;
$copy = ($copy) ? $copy : get_sub_field('copy');

if ($image) { ?>
  <section class="hero-post__wrap">
    <div class="hero-post <?= $section_classes ?>">
      <div class="hero-post__container">
        <!-- <figure class="hero-post__image">
          <img src="<?= $image['url'] ?>" alt="<?= $image['alt'] ?>" class="hero-post__img" />
        </figure> -->
        <?= get_component('components', 'image', ['image' => $image, 'classes' => 'hero-post__image']) ?>
        <div class="hero-post__content"><?php
          if($type == 'copy'){?>
            <?= ($topic) ? '<span class="hero-post__topic">'.$topic.'</span>' : null ?>
            <?= ($heading) ? '<h2 class="hero-post__heading">'.$heading.'</h2>' : null ?>
            <span class="hero-post__copy"><?= $copy ?></span><?php
            if ($cta) {?>
              <a href="<?= $cta['url'] ?>" <?= (!empty($cta['target'])) ? 'target="'.$cta['target'].'"' : null ?> class="hero-post__cta button"><?= ($cta['label']) ? $cta['label'] : $cta['title'] ?></a><?php
            }
          } else if ($type ==='form') {?>
            <span class="hero-post__copy"><?= $copy ?></span>
            <div class="contact-form contact-form__content">
              <div class="contact-form__form">
                <!--  ----------------------------------------------------------------------  -->
                <!--  NOTE: Please add the following <META> element to your page <HEAD>.      -->
                <!--  If necessary, please modify the charset parameter to specify the        -->
                <!--  character set of your HTML page.                                        -->
                <!--  ----------------------------------------------------------------------  -->
                ​
                <META HTTP-EQUIV="Content-type" CONTENT="text/html; charset=UTF-8">
                ​
                <!--  ----------------------------------------------------------------------  -->
                <!--  NOTE: Please add the following <FORM> element to your page.             -->
                <!--  ----------------------------------------------------------------------  -->

                <form action="https://webto.salesforce.com/servlet/servlet.WebToLead?encoding=UTF-8" method="POST">

                  <input type=hidden name="oid" value="00Dd0000000g7HX">
                  ​
                  <!-- EDIT TO DESIRED RETURN URL -->
                  <input type=hidden name="retURL" value="<?= $cta['url'] ?>">

                  <div class="contact-form__inputs">
                   <!-- Sets "Keep" checkbox to TRUE -->
                   <input id="00N0V000008oRYf" name="00N0V000008oRYf" type="hidden" value="1" />
​
                    <?php if (get_sub_field('optin_hidden_field_1')): ?>
                      <!-- Sets "Keep Optin 1" checkbox to TRUE - This will be set in CMS for specific value needed -->
                      <input id="<?= get_sub_field('optin_hidden_field_1') ?>" name="<?= get_sub_field('optin_hidden_field_1') ?>" type="hidden" value="1" />
                    <?php endif;?>
                    <?php if (get_sub_field('optin_hidden_field_2')): ?>
                      <!-- Sets "Keep Optin 2" checkbox to TRUE - This will be set in CMS for specific value needed -->
                      <input id="<?= get_sub_field('optin_hidden_field_2') ?>" name="<?= get_sub_field('optin_hidden_field_2') ?>" type="hidden" value="1" />
                    <?php endif;?>

                    <!-- USER FIELDS. XVERIFY_EMAIL CLASS NEEDED IN EMAIL FOR XVERIFY -->
                    <div class="contact-form__input-wrap input--fname">
                      <label class="contact-form__label" for="first_name">First Name</label>
                      <input aria-label="first name" class="contact-form__input" placeholder="First Name" id="first_name" maxlength="40" name="first_name" size="20" type="text" required />
                      <div class="invalid-feedback">
                        <span class="error__msg">First Name is required</span>
                      </div>
                      <div class="valid-feedback"></div>
                    </div>
                    <div class="contact-form__input-wrap input--lname">
                      <label class="contact-form__label" for="last_name">Last Name</label>
                      <input aria-label="last name" class="contact-form__input" placeholder="Last Name" id="last_name" maxlength="80" name="last_name" size="20" type="text" required />
                      <div class="invalid-feedback">
                        <span class="error__msg">Last Name is required</span>
                      </div>
                      <div class="valid-feedback"></div>
                    </div>
                    <div class="contact-form__input-wrap input--email">
                      <label class="contact-form__label" for="email">Email</label>
                      <input aria-label="email" class="contact-form__input xverify_email" placeholder="Email" id="email" class="xverify_email" maxlength="80" name="email" size="20" type="text" required />
                      <div class="invalid-feedback">
                        <span class="error__msg">First Name is required</span>
                      </div>
                      <div class="valid-feedback"></div>
                    </div>

                    <!-- CHECKS THE "KEEP" BOX IN SALESFORCE -->
                    <!-- <input id="00N0V000008oRYf" name="00N0V000008oRYf" type="checkbox" value="1" hidden checked /> -->
                    ​
                    <!-- SETS RECORD TYPE TO "CUSTOMER" -->
                    <input type=hidden name="recordType" id="recordType" value="012d0000001clV1">
                    ​
                    <input type="hidden" value="<?= get_sub_field('web_to_lead_value') ?>" id="00N0V000009V0AG" maxlength="255" name="00N0V000009V0AG" />
                    ​
                    <input type="submit" class="contact-form__submit button btn--blue" name="submit" value="<?= esc_attr($cta['label']) ?>">
                  </div>
                </form>
              </div>
            </div><?php
          }?>
        </div>
      </div>
    </div>
  </section><?php
}