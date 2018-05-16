<?php

$id = 1;

$mform = new MForm();

$mform->addFieldset('Accordion');
$mform->addTextField("{$id}.0.title", ['label' => 'Titel']);
$mform->addTextAreaField("{$id}.0.text", ['label' => 'Text', 'class' => 'tinyMCEEditor']);
$mform->closeFieldset();

// parse form
echo MBlock::show($id, $mform->show());