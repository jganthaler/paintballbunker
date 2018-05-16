<?php if (\Project\Settings::getValue('youtube')): ?>
    <a href="<?= \Project\Settings::getValue('youtube') ?>" target="_blank">
        <i class="icon-im-youtube-circle"></i>
        <span>YouTube</span>
    </a>
<?php endif; ?>

<?php if (\Project\Settings::getValue('facebook')): ?>
    <a href="<?= \Project\Settings::getValue('facebook') ?>" target="_blank">
        <i class="icon-im-facebook-circle"></i>
        <span>Facebook</span>
    </a>
<?php endif; ?>

<?php if (\Project\Settings::getValue('instagram')): ?>
    <a href="<?= \Project\Settings::getValue('instagram') ?>" target="_blank">
        <i class="icon-im-instagram-circle"></i>
        <span>Instagram</span>
    </a>
<?php endif; ?>

<?php if (\Project\Settings::getValue('google_plus')): ?>
    <a href="<?= \Project\Settings::getValue('google_plus') ?>" target="_blank">
        <i class="icon-im-google-plus-circle"></i>
        <span>Google Plus</span>
    </a>
<?php endif; ?>