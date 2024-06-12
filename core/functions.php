<?php

function dd($data)
{
    echo "<pre style='background-color:black; color:yellow'>";
    var_dump($data);
    echo "</pre>";
    exit;
}

function generateRandomString()
{
    $alphabets = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $numbers = "0123456789";
    $randomAlphabets = substr(str_shuffle($alphabets), 0, 2);
    $randomNumbers = substr(str_shuffle($numbers), 0, 4);
    $randomString = $randomAlphabets . $randomNumbers;
    return $randomString;
}

function getStandardDateFormat($date)
{
    $dateString = $date;
    $date = new DateTime($dateString);
    $formattedDate = $date->format('d-M-Y');
    return $formattedDate;
}
