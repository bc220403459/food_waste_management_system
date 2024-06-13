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

  
function errorShow($var)
{
    echo "<pre style='background-color:black; color:red; font-size:15pt; padding-top:6px; padding-bottom:6px; padding-left:4px'><strong><span style='font-style:none'>Error:</span></strong> ";
    print_r($var);
    exit;
}


function basePath()
{
    return __DIR__ . '/../';
}

function getStandardDateFormat($date)
{
    $dateString = $date;
    $date = new DateTime($dateString);
    $formattedDate = $date->format('d-M-Y');
    return $formattedDate;

}
