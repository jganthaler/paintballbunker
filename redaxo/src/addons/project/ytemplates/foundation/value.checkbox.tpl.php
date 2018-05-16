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

$value = isset($value) ? $value : 1;
?>
<div class="<?= $class_group ?>" id="<?php echo $this->getHTMLId() ?>">
    <label class="checkbox-label">
        <input type="checkbox" id="<?php echo $this->getFieldId() ?>" name="<?php echo $this->getFieldName() ?>"
               value="<?php echo $value ?>"<?php echo $this->getValue() == $value ? ' checked="checked"' : '' ?> />
        <?php echo $this->getLabel() ?>
        <?php echo $notice; ?>
        <span class="checkbox"></span>
    </label>
</div>


