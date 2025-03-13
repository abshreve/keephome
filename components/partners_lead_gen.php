<?php
$image = ($image) ? $image : get_sub_field('image');
$copy = get_sub_field('copy');
$section_classes = ' hero-post--form' ?>

<section class="hero-post__wrap partners-lead-gen" data-component="partners-lead-gen">
  <div class="hero-post <?= $section_classes ?>">
    <div class="hero-post__container">
      <?= get_component('components', 'image', ['image' => $image, 'classes' => 'hero-post__image']) ?>
      <div class="hero-post__content">
          <span class="hero-post__copy"><?= $copy ?></span>
          <div class="contact-form contact-form__content">
            <div class="contact-form__form">
              <form id="power-of-home-form" action="/wp-json/keep/v1/submit" method="POST" data-redirect="<?= get_sub_field('redirect_url') ?>" novalidate>
                <div class="overlay"><h4>Working...</h4></div>
                <div class="contact-form__inputs">
                  <!-- USER FIELDS. XVERIFY_EMAIL CLASS NEEDED IN EMAIL FOR XVERIFY -->
                  <div class="contact-form__input-wrap input--fname">
                    <label class="contact-form__label" for="first_name">First Name</label>
                    <input aria-label="first name" class="contact-form__input" placeholder="First Name" id="first_name" maxlength="40" name="first_name" size="20" type="text"/>
                    <div class="invalid-feedback">
                      <span class="error__msg">First Name is required</span>
                    </div>
                    <div class="valid-feedback"></div>
                  </div>
                  <div class="contact-form__input-wrap input--lname">
                    <label class="contact-form__label" for="last_name">Last Name</label>
                    <input aria-label="last name" class="contact-form__input" placeholder="Last Name" id="last_name" maxlength="80" name="last_name" size="20" type="text"/>
                    <div class="invalid-feedback">
                      <span class="error__msg">Last Name is required</span>
                    </div>
                    <div class="valid-feedback"></div>
                  </div>
                  <div class="contact-form__input-wrap input--email">
                    <label class="contact-form__label" for="email">Email</label>
                    <input aria-label="email" class="contact-form__input" placeholder="Email" id="email" maxlength="80" name="email" size="20" type="email"/>
                    <div class="invalid-feedback">
                      <span class="error__msg">Email is required</span>
                    </div>
                  </div><?php

                  if (get_sub_field('terms')) {?>
                    <p class="terms-label d-block w-p100" >Please read the <a href="" data-toggle="modal" data-target="#termsModal">Participant Consent</a> in full.</p><?php
                  }?>
                  <button disabled class="contact-form__submit button btn--blue"><?= get_sub_field('submit_button_copy') ?></div>
                </div>
              </form>
            </div>
          </div>
      </div>
    </div>
  </div><?php

  if (get_sub_field('terms')) { ?>
    <div class="modal fade bd-example-modal-lg" id="termsModal" data-backdrop="static"tabindex="-1" role="dialog">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          
          <div class="modal-header">
            <?= get_sub_field('terms_label') ? '<h4 class="terms-title">'.get_sub_field('terms_label').'</h4>' : ''?>
            <a href="/" class="modal--close" title="close modal">X</a>
          </div>
          <div class="modal-body">
            <div class="terms-wrap">
              <div class="terms-inner">
                <div class="terms-scroll">
                  <?= get_sub_field('terms') ?>
                </div>
              </div>
              <button class="button btn--blue terms-btn" disabled data-value="accept">Yes, I've read the Participant Consent</button>
            </div>
          </div>
        </div>
      </div>
    </div><?php
  }?>
</section>