<?php

$fragment = new rex_fragment();
$fragment->setVar('article_content', $this);
echo $fragment->parse('default/layout.php');