<?php
$lat = \Project\Settings::getValue('latitude');
$lng = \Project\Settings::getValue('longitude');
$access_token = \Project\Settings::getValue('mapbox_api_access_token');
ob_start()
?>
    <div class="marker-content">
        <h3 class="heading small">###company.name###</h3>
        <div class="text">
            ###company.street### <br>
            I-###company.postal### ###company.location### ###company.province###
        </div>
    </div>
<?php
$popup = Wildcard::parse(ob_get_clean());
?>

<?php if (!rex::isBackend()) : ?>
    <div class="map-wrapper">
        <div id="leaflet-map" class="leaflet-map"
             data-access-token="<?= $access_token ?>"
             data-lat="<?= $lat ?>"
             data-lng="<?= $lng ?>"
             data-popup="<?= rex_escape($popup, 'html_attr') ?>">
        </div>
    </div>
<?php else: ?>
    [Karte]
<?php endif; ?>
