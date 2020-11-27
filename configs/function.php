<?php

function safe($input)
{
    $trim            =    trim($input);
    $cleanTags       =    strip_tags($trim);
    $convert         =    htmlspecialchars($cleanTags, ENT_QUOTES);
    $result          =    $convert;
    return $result;
}

?>
