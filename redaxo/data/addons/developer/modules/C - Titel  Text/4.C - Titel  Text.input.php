<?php

$id = 1;
$mform = new MForm();

$mform->addFieldset('Text');
$mform->addTextAreaField("{$id}.title_large", ['label' => 'Titel gross (optional)']);
$mform->addTextAreaField("{$id}.title_small", ['label' => 'Titel klein (optional)']);
$mform->addTextAreaField("{$id}.text", ['label' => 'Beschreibung (optional)', 'class' => 'tinyMCEEditor']);
$mform->addSelectField("{$id}.spacing", [
    'default' => 'Groß',
    'small' => 'Klein',
    'small-bottom' => 'Oben gross, unten klein',
], ['label' => 'Abstände']);

$mform->addSelectField("{$id}.background", [
    'none' => 'Keiner',
    'light-gray' => 'Hell',
    'medium-gray' => 'Mittel',
], ['label' => 'Hintergrund']);

echo $mform->show();