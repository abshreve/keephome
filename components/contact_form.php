<?php

// Code to submit to HS the email from footer upon submission
$hubspotutk = $_COOKIE['hubspotutk'];
$ip_addr = $_SERVER['REMOTE_ADDR'];
$hs_context = array(
        'hutk' => $hubspotutk,
        'ipAddress' => $ip_addr,
        'pageUrl' => 'https://www.keephome.com',
        'pageName' => get_sub_field('web_to_lead_value')
);
$hs_context_json = json_encode($hs_context);
$hs_str_post = "email=" . urlencode($_POST['email'])
        . "&first_name=" . urlencode($_POST['first_name'])
        . "&last_name=" . urlencode($_POST['last_name'])
        . "&hs_context=" . urlencode($hs_context_json);
$endpoint = 'https://forms.hubspot.com/uploads/form/v2/6852018/34f6e311-fe1e-41fd-9d90-26eb791ac6dd';

$ch = @curl_init();
@curl_setopt($ch, CURLOPT_POST, true);
@curl_setopt($ch, CURLOPT_POSTFIELDS, $hs_str_post);
@curl_setopt($ch, CURLOPT_URL, $endpoint);
@curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/x-www-form-urlencoded'
));
@curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
if (isset($_POST['email']) && isset($_POST['first_name'])) {
        $response = @curl_exec($ch);
}
$status_code = @curl_getinfo($ch, CURLINFO_HTTP_CODE);
@curl_close($ch);

// Code to submit to SF the email from footer upon submission
$sf_str_post = "oid=" . urlencode('00Dd0000000g7HX') . '&'
        . "00N0V000008oRYf=" . urlencode('1') . '&'
        . "00N0V000009V0AG=" . urlencode(get_sub_field('web_to_lead_value')) . '&'
        . "recordType=" . urlencode('012d0000001clV1') . '&'
        . "email=" . urlencode($_POST['email']) . '&'
        . "first_name=" . urlencode($_POST['first_name']) . '&'
        . "last_name=" . urlencode($_POST['last_name']) . '&'
        . "retURL=" . urlencode(get_sub_field('web_to_lead_return'));

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
if (isset($_POST['email']) && isset($_POST['first_name'])) {
        $response = @curl_exec($ch);
        @curl_close($ch);
        echo $response;
} else {
        @curl_close($ch);
}

$img = get_sub_field('image');?>

<div class="contact-form"><?php
    if(get_sub_field('add_stripe')) {?>
        <div class="contact-form__stripe"></div><?php
    }?>
    <!-- <img src="<?= $img['url'] ?>" alt="" class="contact-form__img" /> -->
    <?= get_component('components', 'image', ['image' => $img, 'classes' => 'contact-form__img']) ?>
    <div class="contact-form__container container">
        <!-- <img src="<?= $img['url'] ?>" alt="" class="contact-form__img" /> -->
        <?= get_component('components', 'image', ['image' => $img, 'classes' => 'contact-form__img']) ?>
        <div class="contact-form__content">
            <div class="contact-form__header">
                <h2><?= get_sub_field('header') ?></h2>
                <span><?= get_sub_field('subhead') ?></span>
            </div>
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
                
                <form id="contact-form__full" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" class="needs-validation" novalidate>
                    <input type=hidden name="oid" value="00Dd0000000g7HX">
                ​
                    <!-- EDIT TO DESIRED RETURN URL -->
                    <input type=hidden name="retURL" value="<?= (get_sub_field('web_to_lead_value')) ? get_sub_field('web_to_lead_return') : get_current_url() ?>">
                    
                    <div class="contact-form__inputs">
                        <!-- Sets "Keep" checkbox to TRUE -->
                        <input id="00N0V000008oRYf" name="00N0V000008oRYf" type="hidden" value="1" />

                        <!-- Sets "Keep Newsletter" checkbox to TRUE -->
                        <input id="00N0V000009Uvxb" name="00N0V000009Uvxb" type="hidden" value="1" />
                      
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
                            <input aria-label="first name" class="contact-form__input" placeholder="First Name" id="first_name" tabindex="1" required maxlength="40" name="first_name" size="20" type="text" />
                            <div class="invalid-feedback">
                                <span class="error__msg">First Name is required</span>
                            </div>
                            <div class="valid-feedback"></div>
                        </div>
                        <div class="contact-form__input-wrap input--lname">
                            <label class="contact-form__label" for="last_name">Last Name</label>
                            <input aria-label="last name" class="contact-form__input" placeholder="Last Name" id="last_name" tabindex="2" invalid required maxlength="80" name="last_name" size="20" type="text" />
                            <div class="invalid-feedback">
                                <span class="error__msg">Last Name is required</span>
                            </div>
                            <div class="valid-feedback"></div>
                        </div>
                        <div class="contact-form__input-wrap input--email">
                            <label class="contact-form__label" for="email">Email</label>
                            <input aria-label="email" class="contact-form__input xverify_email" placeholder="Email" id="email" tabindex="3" required maxlength="80" name="email" size="20" type="text" />
                            <div class="invalid-feedback">
                                <span class="error__msg">Email is required</span>
                            </div>
                            <div class="valid-feedback"></div>
                        </div>
                    ​
                        <!-- SETS RECORD TYPE TO "CUSTOMER" -->
                        <input type=hidden name="recordType" id="recordType" value="012d0000001clV1">
                    ​
                        <input type="hidden" value="<?= get_sub_field('web_to_lead_value') ?>" id="00N0V000009V0AG" maxlength="255" name="00N0V000009V0AG" />
                        <input type="submit" class="contact-form__input button btn--blue" tabindex="4" name="submit" value="Submit"/>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
