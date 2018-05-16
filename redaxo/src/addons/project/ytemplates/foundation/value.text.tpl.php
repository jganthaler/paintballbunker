<?php

$type  = isset($type) ? $type : 'text';
$class = $type == 'text' ? '' : 'form-' . $type . ' ';
$value = $this->getElement('value') ? $this->getElement('value') : stripslashes($this->getValue());

$notice = [];
if ($this->getElement('notice') != "") {
    $notice[] = $this->getElement('notice');
}
if (isset($this->params['warning_messages'][$this->getId()]) && !$this->params['hide_field_warning_messages']) {
    $notice[] = '<span class="text-warning">' . rex_i18n::translate($this->params['warning_messages'][$this->getId()], null, false) . '</span>';
}
if (count($notice) > 0) {
    $notice = '<p class="help-block">' . implode("<br />", $notice) . '</p>';
}
else {
    $notice = '';
}

$class .= $this->getElement('required') ? 'form-is-required ' : '';

$class_group = trim($class . $this->getElement('css_class') . ' ' . $this->getElement('name') . ' ' . $this->getWarningClass());

$field_before = $this->getElement('field_before');
$field_after  = $this->getElement('field_after');

if (method_exists($this, 'getAttributeElements')) {
    $attributes = [
        'type'  => $type,
        'name'  => $this->getFieldName(),
        'id'    => $this->getFieldId(),
        'value' => $value,
        'class' => 'form-control',
    ];
    $attributes = $this->getAttributeElements($attributes, ['placeholder', 'autocomplete', 'pattern', 'disabled', 'readonly']);

    $attrs = implode(' ', $attributes);
}
else {
    $attrs = 'type="' . $type . '" name="' . $this->getFieldName() . '" id="' . $this->getFieldId() . '" value="' . htmlspecialchars($value) . '" ' . $this->getAttributeElement('placeholder') . $this->getAttributeElement('autocomplete') . $this->getAttributeElement('pattern') . $this->getAttributeElement('required', true) . $this->getAttributeElement('disabled', true) . $this->getAttributeElement('readonly', true);
}

?>
<div class="<?= $class_group ?> <?= strlen($value) ? 'filled' : '' ?>" id="<?= $this->getHTMLId() ?>">
    <label for="<?= $this->getFieldId() ?>"><?= $this->getLabel() ?></label>
    <?= $field_before ?>
    <input <?= $attrs ?> />
    <?= $notice ?>
    <?= $field_after ?>
</div>
