<?php

function thaidate($format, $timestamp = '', $buddhist_era = true)
{
    if (!is_bool($buddhist_era)) {
        $buddhist_era = true;
    }

    $thaidate = new \Rundiz\Thaidate\Thaidate();
    $thaidate->buddhist_era = $buddhist_era;
    return $thaidate->date($format, $timestamp);
}// thaidate

function thaistrftime($format, $timestamp = '', $buddhist_era = true, $locale = 'th')
{
    if ($locale == null) {
        $locale = 'th';
    }

    if (!is_bool($buddhist_era)) {
        $buddhist_era = true;
    }

    $thaidate = new \Rundiz\Thaidate\Thaidate();
    $thaidate->buddhist_era = $buddhist_era;
    $thaidate->locale = $locale;
    return $thaidate->strftime($format, $timestamp);
}// thaistrftime