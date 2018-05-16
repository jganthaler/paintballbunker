<?php

namespace Project;

$page_title = $this->i18n('settings');

if (rex_post('func', 'string') == 'save') {
    unset($_POST['func']);

    foreach ($_POST as $key => $value) {
        Settings::setValue($key, $value);
    }
    Settings::save();

    echo \rex_view::info(\rex_i18n::msg('form_saved'));
}

$fragment = new \rex_fragment();
$page_content = $fragment->parse('default/backend/settings.php');

$fragment = new \rex_fragment();
$fragment->setVar('body', $page_content, false);
$fragment->setVar('class', 'edit', false);
$fragment->setVar('title', $page_title, false);
$sections = $fragment->parse('core/page/section.php');

$formElements = [
    ['field' => '<a class="btn btn-abort" href="' . \rex_url::currentBackendPage() . '">' . \rex_i18n::msg('form_abort') . '</a>'],
    ['field' => '<button class="btn btn-apply rex-form-aligned" type="submit" name="func" value="save"' . \rex::getAccesskey(\rex_i18n::msg('update'), 'apply') . '>' . \rex_i18n::msg('update') . '</button>'],
];
$fragment     = new \rex_fragment();
$fragment->setVar('elements', $formElements, false);
$buttons = $fragment->parse('core/form/submit.php');

$fragment = new \rex_fragment();
$fragment->setVar('class', 'edit', false);
$fragment->setVar('buttons', $buttons, false);
$sections .= $fragment->parse('core/page/section.php');

echo '<form action="' . \rex_url::currentBackendPage() . '" method="post">' . $sections . '</form>';