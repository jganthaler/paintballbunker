<?php
/**
 * @author mail[at]joachim-doerr[dot]com Joachim Doerr
 * @package redaxo5
 * @license MIT
 */

// set default template
if (!$this->hasConfig('mblock_theme')) {
    $this->setConfig('mblock_theme', 'default_theme');
}
if (!$this->hasConfig('mblock_delete')) {
    $this->setConfig('mblock_delete', 1);
}
if (!$this->hasConfig('mblock_scroll')) {
    $this->setConfig('mblock_scroll', 1);
}
if (!$this->hasConfig('mblock_delete_confirm')) {
    $this->setConfig('mblock_delete_confirm', 1);
}

// copy data directory
rex_dir::copy($this->getPath('data'), $this->getDataPath());
// delete all assets
rex_dir::deleteFiles($this->getAssetsPath(), true);
// copy assets
rex_dir::copy($this->getPath('assets'), $this->getAssetsPath());


// rex media and link updater
$values = array();

for ($i = 1; $i < 21; $i++) {
    $values[] = " value{$i} = REPLACE(value{$i}, 'REX_INPUT_L', 'REX_L')";
    $values[] = " value{$i} = REPLACE(value{$i}, 'REX_INPUT_M', 'REX_M')";
}

$values = implode(",\n\t", $values);
$prefix = rex::getTablePrefix();
$query= "UPDATE\n\t {$prefix}article_slice \nSET\n\t{$values};\n";

$sql = rex_sql::factory();
$sql->setDebug(false);
$sql->setQuery($query);
$rows = $sql->getRows();
