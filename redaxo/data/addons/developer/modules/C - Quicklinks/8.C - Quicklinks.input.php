<?php

$id = 1;

$mform = new MForm();

$mform->addFieldset('Boxen');
$mform->addMediaField('1', ['label' => 'Bild']);
$mform->addTextField("{$id}.0.title", ['label' => 'Titel']);
$mform->addLinkField('1', ['label' => 'Link']);
$mform->closeFieldset();

// parse form
echo MBlock::show($id, $mform->show(), ['max' => 3]);