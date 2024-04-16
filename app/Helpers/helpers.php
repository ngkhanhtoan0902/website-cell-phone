<?php

//Clean Domain Redirect Link
function cleanDomainRedirect($url)
{
    $link = parse_url(trim($url));
    $finalLink = '';

    if (array_key_exists("path", $link)) $finalLink = $link['path'];

    if (array_key_exists("query", $link)) $finalLink = $finalLink . '?' . $link['query'];

    return urldecode($finalLink);
}

//Check Domain Redirect Link
function checkDomainRedirect($url)
{
    $link = parse_url(trim($url));

    $finalLink = '';

    if (array_key_exists("scheme", $link)) {
        $finalLink = $link['scheme'];
    } else return true;


    if (array_key_exists("host", $link)) $finalLink = $finalLink . '://' . $link['host'];

    return strcmp($finalLink, env('APP_URL')) == 0 ? true : false;
}