<?php if ($this->objparams['warning_messages'] || $this->objparams['unique_error']): ?>
    <div class="row column">
        <div class="callout alert form-error-list">
            <ul class="no-bullet">
                <?php foreach ($this->objparams['warning_messages'] as $k => $v): ?>
                    <li><?php echo rex_i18n::translate("$v", null); ?></li>
                <?php endforeach ?>

                <?php if ($this->objparams['unique_error'] != ''): ?>
                    <li><?php echo rex_i18n::translate(preg_replace("~\\*|:|\\(.*\\)~Usim", '', $this->objparams['unique_error'])) ?></li>
                <?php endif ?>
            </ul>
        </div>
    </div>
<?php endif; ?>
