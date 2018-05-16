<?php

$notice = [];
$value  = isset($value) ? $value : stripslashes($this->getValue());

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

$class = $this->getElement('required') ? 'form-is-required ' : '';

$attributes  = $this->getAttributeElements([], ['autocomplete', 'pattern', 'required', 'disabled', 'readonly']);
$class_group = trim($class . $this->getElement('css_class') . ' ' . $this->getWarningClass());
$btn_class   = $this->getElement('btn_class');

$field_before = $this->getElement('field_before');
$field_after  = $this->getElement('field_after');

?>
<div class="<?= $class_group ?> upload-field <?= $filename == '' ? '' : 'filled' ?>" id="<?= $this->getHTMLId() ?>">
    <div class="label"><?= $this->getLabel() ?></div>
    <?= $field_before ?>
    <label for="<?= $this->getFieldId() ?>" class="button upload <?= $btn_class ?>">###action.choose_file###</label>
    <div class="filename" <?= $filename == '' ? 'style="display:none;"' : '' ?>><span class="rm"><i class="fa fa-times" aria-hidden="true"></i></span>
        <div class="name"><?= htmlspecialchars($filename) ?></div>
    </div>
    <?= $notice ?>
    <input type="hidden" name="<?= $this->getFieldName('unique') ?>" value="<?= $unique ?>"/>
    <?php if ($filename != ''): ?>
        <input type="hidden" name="<?= $this->getFieldName('delete') ?>" class="remove-file" value="0"/>
    <?php endif; ?>
    <input type="file" name="<?= $unique ?>" id="<?= $this->getFieldId() ?>" class="show-for-sr" <?= implode(' ', $attributes) ?>>
    <?= $field_after ?>
</div>
