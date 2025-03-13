<?php
$logo = get_field('logo', 'option') ? get_field('logo', 'option') : get_image('logo.png');
// Code to submit to HS the email from footer upon submission
$hubspotutk = $_COOKIE['hubspotutk'];
$ip_addr = $_SERVER['REMOTE_ADDR'];
$hs_context = array(
        'hutk' => $hubspotutk,
        'ipAddress' => $ip_addr,
        'pageUrl' => 'https://www.frameworkhomeownership.com',
        'pageName' => 'FW Footer'
);
$hs_context_json = json_encode($hs_context);
$hs_str_post = "email=" . urlencode($_POST['email'])
        . "&hs_context=" . urlencode($hs_context_json);
$endpoint = 'https://forms.hubspot.com/uploads/form/v2/6852018/950c999f-5954-4998-8461-9ccffb0c2c92';

$ch = @curl_init();
@curl_setopt($ch, CURLOPT_POST, true);
@curl_setopt($ch, CURLOPT_POSTFIELDS, $hs_str_post);
@curl_setopt($ch, CURLOPT_URL, $endpoint);
@curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/x-www-form-urlencoded'
));
@curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
if (isset($_POST['email']) && empty($_POST['first_name'])) {
        $response = @curl_exec($ch);
}
$status_code = @curl_getinfo($ch, CURLINFO_HTTP_CODE);
@curl_close($ch);

// Code to submit to SF the email from footer upon submission
$sf_str_post = "oid=" . urlencode('00Dd0000000g7HX') . '&'
        . "00N0V000008oRYf=" . urlencode('1') . '&'
        . "00N0V000009V0AG=" . urlencode('Footer') . '&'
        . "recordType=" . urlencode('012d0000001clV1') . '&'
        . "email=" . urlencode($_POST['email']) . '&'
        . "retURL=" . urlencode('https://www.keephome.com?thanks=true');

$sfendpoint = 'https://webto.salesforce.com/servlet/servlet.WebToLead?encoding=UTF-8';
$ch = @curl_init();
@curl_setopt($ch, CURLOPT_POST, true);
@curl_setopt($ch, CURLOPT_POSTFIELDS, $sf_str_post);
@curl_setopt($ch, CURLOPT_URL, $sfendpoint);
@curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/x-www-form-urlencoded'
));
@curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
@curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
if (isset($_POST['email']) && empty($_POST['first_name'])) {
        $response = @curl_exec($ch);
        @curl_close($ch);
        echo $response;
} else {
        @curl_close($ch);
}

$terms_and_condtions = get_field('terms_and_conditions_page_link',  'option');
$privacy_policy = get_field('privacy_policy_page_link',  'option');
$contact = get_field('contact_us',  'option');
$call = get_field('call_line',  'option');
$footerType = get_field('header_footer_setting');

if ($footerType == 'minimal' || $footerType == 'ultra-minimal') : ?>

  <footer class="main-footer minimal">
    <div class="container">
        <div class="footer-meta__tools">
          <?= get_component('components', 'font-scaler') ?>
          <?= get_component('components', 'to-top') ?>
        </div>  
        <div class="footer-meta">
        <div class="footer-meta__info">
          <div class="footer-meta__logo">
            <img class="logo-img" src="<?= get_template_directory_uri() ?>/images/logo.svg" alt="footer logo"/>
          </div>

          <span class="footer-meta__copyright-terms small">&copy; <?= date("Y") ?> Framework. All rights reserved.<br>
            <?php if (!empty($contact['url'])) : ?>
              <a href="<?= $contact['url'] ?>" title="<?= $contact['title'] ?>" class="small"><?= $contact['title'] ?></a>
            <?php endif; ?>
            <?php if (!empty($terms_and_condtions['url'])) : ?>
              <a href="<?= $terms_and_condtions['url'] ?>" title="<?= $terms_and_condtions['title'] ?>" class="small"><?= $terms_and_condtions['title'] ?></a>
            <?php endif;
              if (!empty($privacy_policy['url'])) : ?>
              <a href="<?= $privacy_policy['url'] ?>" title="<?= $privacy_policy['title'] ?>" class="small"><?= $privacy_policy['title'] ?></a>
            <?php endif; ?>
            <?php if (!empty($call)) : ?>
              <br><?= $call ?>
            <?php endif; ?>
          </span>
        </div>
      </div>
      
    </div>
  </footer>

<?php else : ?>

  <footer class="main-footer">
    <div class="container">
      <div class="footer-content">
        <div class="footer-content__col">
          <h4><?= the_field('download_title',  'option'); ?></h4>
          <p><?= the_field('download-description',  'option'); ?></p>
          <?php $downloadLabel = get_field( "download_label", 'option' ); 
          $downloadLabelLink = get_field( "download_label_link",'option' ); 
          if( $downloadLabel && $downloadLabelLink ) {  ?>
          <div class="footer-content__buttons">
            <a href="<?php echo $downloadLabelLink; ?>" target="_blank" class="button btn--blue download-btn"> <?php echo $downloadLabel; ?></a>
          </div>
          <?php } ?> 
        </div>
        <div id="footer-form" class="footer-content__col">
          <h4><?= the_field('keepup-title',  'option'); ?></h4>
          <p><?= the_field('keepup-description',  'option'); ?></p><?php

          if (isset($_GET['thanks'])) { ?>
            <span class="footer-form__thanks">Thank you for signing up</span><?php
          } else { ?>
           <?php /* <form action="<?php echo $_SERVER['PHP_SELF']; ?>" class="footer-content__form needs-validation" method="POST" novalidate>
              <!-- Sets "Keep" checkbox to TRUE -->
              <input id="00N0V000008oRYf" name="00N0V000008oRYf" type="hidden" value="1" />

              <!-- Sets "Keep Newsletter" checkbox to TRUE --><input id="00N0V000009Uvxb" name="00N0V000009Uvxb" type="hidden" value="1" />
              <input type=hidden name="oid" value="00Dd0000000g7HX">

              <!-- EDIT TO DESIRED RETURN URL -->
              <!-- <input type=hidden name="retURL" value="<https://www.keephome.com"> -->
              <input type=hidden name="retURL" value="<?= get_current_url() ?>?thanks=true">

              <!-- CHECKS THE "KEEP" BOX IN SALESFORCE -->
              <!-- <input id="00N0V000008oRYf" name="00N0V000008oRYf" type="checkbox" type="hidden" value="1" hidden checked /> -->

              <!-- hard-coding this one in -->
              <input type="hidden" value="Footer" id="00N0V000009V0AG" maxlength="255" name="00N0V000009V0AG" />

              <!-- SETS RECORD TYPE TO "CUSTOMER" -->
              <input type=hidden name="recordType" id="recordType" value="012d0000001clV1">

              <!-- USER FIELDS. XVERIFY_EMAIL CLASS NEEDED IN EMAIL FOR XVERIFY -->
              <!-- <input aria-label="Enter your email to join the newsletter" placeholder="Enter Email" id="email" class="xverify_email" required maxlength="80" name="email" size="20" type="text" /> -->
              <div class="input--email">
                <label class="footer-form__label" for="email">Email</label>
                <input aria-label="email" class="footer-form__input xverify_email" placeholder="Email" id="email" required maxlength="80" name="email" size="20" type="text" />
                <div class="invalid-feedback">
                  Email is required
                </div>
              </div>

              <button type="submit" class="input-btn" title="submit"><?= get_component('components', 'svg',['icon' => 'angle-right', 'title' => '', 'height' => 18, 'width' => 15, 'viewbox' => '0 0 15 18']) ?></button>
            <form> */ ?>
<script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/embed/v2.js"></script>
<script>
 hbspt.forms.create({
  region: "na1",
  portalId: "6852018",
  formId: "d81c3889-963e-45a7-9b8e-0d4ce33774ff"
 });
</script>
              <?php
            }?>
        </div>

        <div class="footer-content__col">
          <h4><?= the_field('follow-title', 'option'); ?></h4>
          <p><?= the_field('follow-description', 'option'); ?></p>
          <div class="footer__social-links">
             <?php /* <a href="<?= get_field('facebook-link', 'option')?>" target="_blank" title="social link to linkedin" class="footer__social-link">
              <svg width="35px" height="35px" viewBox="0 0 552.77 552.77">
                    <circle id="Oval" stroke="currentColor" stroke-width="2" cx="17.5" cy="17.5" r="16.5"></circle> 
                    <g id="SVGRepo_iconCarrier"> <g> <g> <path d="M17.95,528.854h71.861c9.914,0,17.95-8.037,17.95-17.951V196.8c0-9.915-8.036-17.95-17.95-17.95H17.95 C8.035,178.85,0,186.885,0,196.8v314.103C0,520.816,8.035,528.854,17.95,528.854z"></path> <path d="M17.95,123.629h71.861c9.914,0,17.95-8.036,17.95-17.95V41.866c0-9.914-8.036-17.95-17.95-17.95H17.95 C8.035,23.916,0,31.952,0,41.866v63.813C0,115.593,8.035,123.629,17.95,123.629z"></path> <path d="M525.732,215.282c-10.098-13.292-24.988-24.223-44.676-32.791c-19.688-8.562-41.42-12.846-65.197-12.846 c-48.268,0-89.168,18.421-122.699,55.27c-6.672,7.332-11.523,5.729-11.523-4.186V196.8c0-9.915-8.037-17.95-17.951-17.95h-64.192 c-9.915,0-17.95,8.035-17.95,17.95v314.103c0,9.914,8.036,17.951,17.95,17.951h71.861c9.915,0,17.95-8.037,17.95-17.951V401.666 c0-45.508,2.748-76.701,8.244-93.574c5.494-16.873,15.66-30.422,30.488-40.649c14.83-10.227,31.574-15.343,50.24-15.343 c14.572,0,27.037,3.58,37.393,10.741c10.355,7.16,17.834,17.19,22.436,30.104c4.604,12.912,6.904,41.354,6.904,85.33v132.627 c0,9.914,8.035,17.951,17.949,17.951h71.861c9.914,0,17.949-8.037,17.949-17.951V333.02c0-31.445-1.982-55.607-5.941-72.48 S535.836,228.581,525.732,215.282z"></path> </g> </g> </g></svg>
                <?= get_component('components', 'svg',['icon' => 'facebook', 'classes' => '', 'title' => 'go to our linkedin']) ?> 
             </a>*/ ?>
             <link rel='stylesheet' id='framework-bootstrap-style-css' href='https://frameworkhomeownership.org/wp-content/themes/keephome/css/bootstrap.css' type='text/css' media='all' />
            <style type="text/css">
               .keep-in-touch{ text-align:right; }
               .keep-in-touch ul{ margin:32px 0 0 0; padding: 0; list-style:none; display: -webkit-box; display: -ms-flexbox; display: flex; -webkit-box-align: center; -ms-flex-align: center; align-items: center; -webkit-box-pack: end; -ms-flex-pack: end; justify-content: flex-start; position: relative; z-index: 2;}
               .keep-in-touch ul li{ display:inline-block; margin:0 0 0 8px; }
               .keep-in-touch ul li a{ width: 35px; height: 35px; display: flex; align-items: center; justify-content: center; background-color:#008099; color:#FFFFFF; border-radius: 50%;}
               .keep-in-touch ul li a:hover{ background-color: #0097b4; color:#FFFFFF;}
               .keep-in-touch ul li a .fa-twitter:before{ content: ""; background: url(<?= get_template_directory_uri() ?>/images/x-twitter.svg) no-repeat center center; background-size: 18px auto; width: 18px; height: 18px; display: block; }
            </style>
            <div class="keep-in-touch">
                <ul>
                    <?php if(get_field('facebook-link', 'option' )) { ?>
                    <li><a href="<?php echo get_field('facebook-link', 'option' ); ?>" target="_blank"><i class="fa fa-facebook"></i></a></li>
                    <?php }  if(get_field('twitter_link', 'option' )) { ?> 
                    <li><a href="<?php echo get_field('twitter_link', 'option' ); ?>"  target="_blank"><i class="fa fa-twitter"></i></a></li>
                    <?php }  if(get_field('linkedin_link', 'option' )) { ?> 
                    <li><a href="<?php echo get_field('linkedin_link', 'option' ); ?>"  target="_blank"><i class="fa fa-linkedin"></i></a></li>
                    <?php }  if(get_field('instagram-link', 'option' )) { ?> 
                    <li><a href="<?php echo get_field('instagram-link', 'option' ); ?>"  target="_blank"><i class="fa fa-instagram"></i></a></li>
                    <?php } ?> 
                </ul>
            </div>
          </div>
          
        </div>
      </div>

      <div class="footer-meta">

        <div class="footer-meta__info">
          <div class="footer-meta__logo">
            <?= get_component('components', 'image', [
              'image' => $logo,
              'classes' => 'logo-img',
              'alt' => 'footer logo',
              'default_size' => 'small',
              'srcset_sizes' => '130px'
            ]) ?>
          </div>

          <span class="footer-meta__copyright-terms small">&copy; <?= date("Y") ?> Framework. All rights reserved.<br>
            68 Harrison Ave., Ste. 605, PMB 49146, Boston, MA 02111<br>
            <?php if (!empty($terms_and_condtions['url'])) : ?>
              <a href="<?= $terms_and_condtions['url'] ?>" title="<?= $terms_and_condtions['title'] ?>" class="small"><?= $terms_and_condtions['title'] ?></a>
            <?php endif;
              if (!empty($privacy_policy['url'])) : ?>
              <a href="<?= $privacy_policy['url'] ?>" title="<?= $privacy_policy['title'] ?>" class="small"><?= $privacy_policy['title'] ?></a>
            <?php endif; ?>
          </span>
        </div>

        <div class="footer-meta__tools">
          <?= get_component('components', 'font-scaler') ?>
          <?= get_component('components', 'to-top') ?>
        </div>

      </div>
    </div>
  </footer><?php

endif;
wp_footer(); ?>

<!-- Xverify Scripts -->
<link rel="stylesheet" type="text/css" href="https://www.xverify.com/css/ui_tooltip_style.css" />
<script type="text/javascript" src="https://www.xverify.com/sharedjs/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="https://www.xverify.com/sharedjs/jquery-ui.min.js"></script>
<script type="text/javascript" src="https://www.xverify.com/js/clients/fwsysadmin/client.js"></script>
<script type="text/javascript" src="https://www.xverify.com/sharedjs/jquery.xverify.plugin.js"></script>
<script type="text/javascript">
  jQuery(document).ready(function($) {
    $.xVerifyService({
      services: {
        email: {
          field: 'xverify_email'
        }
      },
      submitType: 'onChange'
    });
  });
</script>
<!-- End Xverify Scripts -->

<!-- Start of HubSpot Embed Code -->
<script type="text/javascript" id="hs-script-loader" async defer src="//js.hs-scripts.com/6852018.js"></script>
<!-- End of HubSpot Embed Code -->

<!-- Start of LinkedIn Embed Code -->
<script type="text/javascript">
_linkedin_partner_id = "3699354";
window._linkedin_data_partner_ids = window._linkedin_data_partner_ids || [];
window._linkedin_data_partner_ids.push(_linkedin_partner_id);
</script><script type="text/javascript">
(function(l) {
if (!l){window.lintrk = function(a,b){window.lintrk.q.push([a,b])};
window.lintrk.q=[]}
var s = document.getElementsByTagName("script")[0];
var b = document.createElement("script");
b.type = "text/javascript";b.async = true;
b.src = "https://snap.licdn.com/li.lms-analytics/insight.min.js";
s.parentNode.insertBefore(b, s);})(window.lintrk);
</script>
<script>
  if($('#responsive-iframe').length){
    $('#responsive-iframe').parent().parent().removeClass('col-xl-8 offset-xl-2');
  }
  </script>
<noscript>
<img height="1" width="1" style="display:none;" alt="" src="https://px.ads.linkedin.com/collect/?pid=3699354&fmt=gif" />
</noscript>		
<!-- End of LinkedIn Embed Code -->	
		
		
</body>

</html>
