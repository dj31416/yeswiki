<?php

// TODO : a basculer dans __show.php
// Vérification de sécurité
if (!defined("WIKINI_VERSION"))
{
  die ("acc&egrave;s direct interdit");
}

$wikireq = $_REQUEST['wiki'];
// remove leading slash
$wikireq = preg_replace("/^\//", "", $wikireq);
// split into page/method, checking wiki name & method name (XSS proof)
if (preg_match('`^' . '(' . "[A-Za-z0-9]+" . ')/(' . "[A-Za-z0-9_-]" . '*)' . '$`', $wikireq, $matches)) {
    list(, $PageTag, $method) = $matches;
}
elseif (preg_match('`^' . "[A-Za-z0-9]+" . '$`', $wikireq)) {
    $PageTag = $wikireq;
}

echo $PageTag;
exit;
?> 