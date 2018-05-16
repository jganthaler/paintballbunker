<?php

$id = 1;
$mform = new MForm();

$mform->addFieldset('Text');
$mform->addTextField("{$id}.title", ['label' => 'Titel']);
$mform->addTextAreaField("{$id}.text", ['label' => 'Text', 'class' => 'tinyMCEEditor']);
$mform->addTextAreaField("{$id}.list", ['label' => 'Liste', 'class' => 'tinyMCEEditor']);
$mform->addTextField("{$id}.text_link", ['label' => 'Test link']);
$mform->addLinkField('1', ['label' => 'Link']);

echo $mform->show();