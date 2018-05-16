<?php

$id    = 1;
$mform = new MForm();

$mform->addFieldset('Bildergalerie');

$mform->addTextAreaField("{$id}.title", ['label' => 'Titel']);
$mform->addMedialistField('1', ['label' => 'Bilder']);

$mform->closeFieldset();

echo $mform->show();