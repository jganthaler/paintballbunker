<?php

$id = 1;

$mform = new MForm();

$mform->addFieldset('Slides');

$mform->addMediaField('1', ['label' => 'Bild (1920x)']);
$mform->addTextAreaField("{$id}.0.title", ['label' => 'Titel']);
$mform->addTextAreaField("{$id}.0.text", ['label' => 'Text']);
$mform->addLinkField('1', ['label' => 'Interner Link']);
$mform->addTextField("{$id}.0.text_link", ['label' => 'Text Link']);

// parse form
echo MBlock::show($id, $mform->show());