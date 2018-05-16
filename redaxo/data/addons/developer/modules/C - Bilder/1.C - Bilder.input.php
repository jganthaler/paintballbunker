<?php

$id    = 1;
$mform = new MForm();

$mform->addFieldset('Bilder');

$mform->addTextAreaField("{$id}.title", ['label' => 'Titel']);
$mform->addMediaField('1', ['label' => 'Bild Hochformat']);
$mform->addMediaField('2', ['label' => 'Bild Hochformat']);
$mform->addMediaField('3', ['label' => 'Bild Querformat']);

$mform->closeFieldset();

echo $mform->show();