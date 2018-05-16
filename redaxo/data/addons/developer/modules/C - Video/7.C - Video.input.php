<?php

$id    = 1;
$mform = new MForm();

$mform->addFieldset('Text');

$mform->addTextAreaField("{$id}.title", ['label' => 'Titel']);
$mform->addTextAreaField("{$id}.youtube", ['label' => 'Youtube Link']);
$mform->addMediaField('1', ['label' => 'Hintergrundbild']);

$mform->closeFieldset();

echo $mform->show();