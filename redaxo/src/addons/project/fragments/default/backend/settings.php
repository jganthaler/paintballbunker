<?php

namespace Project;

?>
<fieldset>
    <legend>Allgemein</legend>
    <dl class="rex-form-group form-group">
        <dt>E-Mail</dt>
        <dd><input type="text" class="form-control" name="contact_email"
                   value="<?= Settings::getValue('contact_email') ?>"/></dd>
    </dl>
</fieldset>
<br>

<fieldset>
    <legend>Geo</legend>
    <dl class="rex-form-group form-group">
        <dt>Mapbox API Access Token</dt>
        <dd>
            <input type="text" class="form-control" name="mapbox_api_access_token"
                   value="<?= Settings::getValue('mapbox_api_access_token') ?>"/>
            <p class="help-block"><a href="https://www.mapbox.com/studio/account/tokens/" target="_blank">https://www.mapbox.com/studio/account/tokens/</a>
            </p>
        </dd>
    </dl>
    <dl class="rex-form-group form-group">
        <dt>Latitude</dt>
        <dd><input type="text" class="form-control" name="latitude" value="<?= Settings::getValue('latitude') ?>"/></dd>
    </dl>
    <dl class="rex-form-group form-group">
        <dt>Longitude</dt>
        <dd><input type="text" class="form-control" name="longitude" value="<?= Settings::getValue('longitude') ?>"/>
        </dd>
    </dl>
</fieldset>
<br/>

<fieldset>
    <legend>Social</legend>
    <dl class="rex-form-group form-group">
        <dt>Facebook</dt>
        <dd><input type="text" class="form-control" name="facebook" value="<?= Settings::getValue('facebook') ?>"/></dd>
    </dl>
    <dl class="rex-form-group form-group">
        <dt>Google Plus</dt>
        <dd><input type="text" class="form-control" name="google_plus"
                   value="<?= Settings::getValue('google_plus') ?>"/></dd>
    </dl>
    <dl class="rex-form-group form-group">
        <dt>Instagram</dt>
        <dd><input type="text" class="form-control" name="instagram" value="<?= Settings::getValue('instagram') ?>"/>
        </dd>
    </dl>
    <dl class="rex-form-group form-group">
        <dt>Youtube</dt>
        <dd><input type="text" class="form-control" name="youtube" value="<?= Settings::getValue('youtube') ?>"/></dd>
    </dl>
    <dl class="rex-form-group form-group">
        <dt>Twitter</dt>
        <dd><input type="text" class="form-control" name="twitter" value="<?= Settings::getValue('twitter') ?>"/></dd>
    </dl>
</fieldset>
<br>

<fieldset>
    <legend>SEO</legend>
    <dl class="rex-form-group form-group">
        <dt>Google Tag Manager</dt>
        <dd><input type="text" class="form-control" name="google_tag_manager"
                   value="<?= Settings::getValue('google_tag_manager') ?>" placeholder="GTM-XXXXXXX"/></dd>
    </dl>
    <dl class="rex-form-group form-group">
        <dt>Google Analytics</dt>
        <dd><input type="text" class="form-control" name="google_analytics"
                   value="<?= Settings::getValue('google_analytics') ?>" placeholder="UA-XXXXXXXX-X"/></dd>
    </dl>
    <dl class="rex-form-group form-group">
        <dt>Google Webmaster ID</dt>
        <dd><input type="text" class="form-control" name="google_webmaster_id"
                   value="<?= Settings::getValue('google_webmaster_id') ?>"/></dd>
    </dl>
    <dl class="rex-form-group form-group">
        <dt>Bing ID</dt>
        <dd><input type="text" class="form-control" name="bing_validate_id"
                   value="<?= Settings::getValue('bing_validate_id') ?>"/></dd>
    </dl>
    <dl class="rex-form-group form-group">
        <dt>Geo Region</dt>
        <dd><input type="text" class="form-control" name="seo_geo_region"
                   value="<?= Settings::getValue('seo_geo_region') ?>" placeholder="IT-BZ"/></dd>
    </dl>
</fieldset>

<fieldset>
    <legend>Mail</legend>
    <dl class="rex-form-group form-group">
        <dt>Primary Color</dt>
        <dd><input type="text" class="form-control" name="mail_primary_color"
                   value="<?= Settings::getValue('mail_primary_color') ?>" placeholder="#666666"/></dd>
    </dl>
</fieldset>
