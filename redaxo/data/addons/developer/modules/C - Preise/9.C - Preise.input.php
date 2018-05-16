<?php


$id = 1;
$mform = new MForm();

$mform->addFieldset('Text');
$mform->addTextAreaField("{$id}.title", ['label' => 'Titel']);
$mform->addTextAreaField("{$id}.price", ['label' => 'Preis']);
$mform->addTextAreaField("{$id}.text", ['label' => 'Beschreibung (optional)', 'class' => 'tinyMCEEditor']);
$mform->addTextAreaField("{$id}.info", ['label' => 'Info (optional)', 'class' => 'tinyMCEEditor']);
$mform->closeFieldset();

echo $mform->show();

$id = 2;

$mform = new MForm();

$mform->addFieldset('Preisliste');
$mform->addTextField("{$id}.0.item", ['label' => 'Produkt']);
$mform->addTextField("{$id}.0.price", ['label' => 'Preis']);
$mform->closeFieldset();

// parse form
echo MBlock::show($id, $mform->show());