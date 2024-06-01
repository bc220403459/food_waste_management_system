<?php
function fileNameWithBasePath($fileName){
    $basePath='./';
    $fileNameWithBasePath=$basePath.$fileName;
    // var_dump($fileNameWithBasePath); exit;
    return $fileNameWithBasePath;
}