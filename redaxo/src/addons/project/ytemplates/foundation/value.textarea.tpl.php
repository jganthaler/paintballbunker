<?php

$notice = [];
if ($this->getElement('notice') != "") {
    $notice[] = $this->getElement('notice');
}
if (isset($this->params['warning_messages'][$this->getId()]) && !$this->params['hide_field_warning_messages']) {
    $notice[] = '<span class="text-warning">' . rex_i18n::translate($this->params['warning_messages'][$this->getId()], null, false) . '</span>'; //    var_dump();
}
if (count($notice) > 0) {
    $notice = '<p class="help-block">' . implode("<br />", $notice) . '</p>';
}
else {
    $notice = '';
}

$class = $this->getElement('required') ? 'form-is-required ' : '';

$class_group = trim($class . $this->getElement('css_class') . ' ' . $this->getWarningClass());

$class_label  = ['control-label'];
$field_before = $this->getElement('field_before');
$field_after  = $this->getElement('field_after');

$rows = $this->getElement('rows');
if (!$rows) {
    $rows = 10;
}

$attributes = [
    "class" => 'form-control',
    "name"  => $this->getFieldName(),
    "id"    => $this->getFieldId(),
    "rows"  => $rows,
];

$attributes = $this->getAttributeElements($attributes, ['placeholder', 'pattern', 'required', 'disabled', 'readonly']);

?>
<div class="<?= $class_group ?>" id="<?= $this->getHTMLId() ?>">
    <?php if (strlen($this->getLabel())): ?>
        <label class="<?= implode(" ", $class_label) ?>" for="<?= $this->getFieldId() ?>"><?= $this->getLabel() ?></label>
    <?php endif; ?>

    <?= $field_before ?>

    <textarea <?= implode(" ", $attributes) ?>><?= htmlspecialchars($this->getValue()) ?></textarea>
    <?= $notice ?>

    <?= $field_after ?>
</div>
