<?php

$notice = [];
$value  = (array) ($this->getElement('value') ? $this->getElement('value') : $this->getValue());

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

$class_group = trim($this->getElement('css_class') . ' ' . $this->getElement('name') . ' ' . $class . $this->getWarningClass());

$field_before = $this->getElement('field_before');
$field_after  = $this->getElement('field_after');

?>

<div class="<?php echo $class_group ?>" id="<?php echo $this->getHTMLId() ?>">
    <?php if (strlen($this->getLabel())): ?>
        <label class="control-label<?php echo $class_label; ?>"
               for="<?php echo $this->getFieldId() ?>"><?php echo $this->getLabel() ?></label>
    <?php endif; ?>
    <?php echo $field_before; ?>
    <select class="<?= $this->getElement('select_class') ?>"
            id="<?php echo $this->getFieldId() ?>" <?php echo $multiple ? 'name="' . $this->getFieldName() . '[]" multiple="multiple"' : 'name="' . $this->getFieldName() . '"' ?><?php $size > 1 ? ' size="' . $size . '"' : '' ?>>
        <?php foreach ($options as $key => $label): ?>
            <option
                    value="<?php echo htmlspecialchars($key) ?>"<?php echo in_array((string) $key, $value) ? ' selected="selected"' : '' ?>><?php echo $this->getLabelStyle($label) ?></option>
        <?php endforeach ?>
    </select>
    <?php echo $notice ?>
    <?php echo $field_after; ?>
</div>
