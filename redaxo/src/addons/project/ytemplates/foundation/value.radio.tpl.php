<?php

$class = $this->getElement('required') ? 'form-is-required ' : '';
$class_group = trim('custom-checkbox yform-element ' . $class . ' ' . $this->getHTMLClass() . ' ' . $this->getElement('css_class') . ' ' . $this->getWarningClass());

$notices = [];
if ($this->getElement('notice') != '') {
    $notices[] = $this->getElement('notice');
}
if (isset($this->params['warning_messages'][$this->getId()]) && !$this->params['hide_field_warning_messages']) {
    $notices[] = '<span class="text-warning">' . rex_i18n::translate($this->params['warning_messages'][$this->getId()], null, false) . '</span>';
}
$notice = '';
if (count($notices) > 0) {
    $notice = '<p class="help-block">' . implode('<br />', $notices) . '</p>';
}

?>
<div class="custom-radio-wrapper <?= $class_group ?>" id="<?php echo $this->getHTMLId() ?>">
    <?php foreach ($options as $key => $value) : ?>

        <?php
        $attributes = [
            'id' => $this->getFieldId() . '-' . htmlspecialchars($key),
            'name' => $this->getFieldName(),
            'value' => $key,
            'type' => 'radio'
        ];
        if ($key == $this->getValue()) {
            $attributes['checked'] = 'checked';
        }
        $attributes = $this->getAttributeElements($attributes);
        ?>
        <div class="custom-radio">
            <label>
                <input <?= implode(" ", $attributes) ?> />
                <?= $this->getLabelStyle($value); ?>
                <span class="radio"></span>
            </label>
        </div>
    <?php endforeach; ?>
</div>