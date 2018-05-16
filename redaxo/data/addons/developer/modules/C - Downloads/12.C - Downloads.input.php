<?php

$id = 1;

$mform = new MForm();

$mform->addFieldset('Downloads');
$mform->addMediaField('1', ['label' => 'Link']);
$mform->addTextField("{$id}.0.text_link", ['label' => 'Text Downloadlink']);
$mform->closeFieldset();

// parse form
echo MBlock::show($id, $mform->show(), ['max' => 3]);