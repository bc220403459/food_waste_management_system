<?php
session_start();
// var_dump($_SESSION); exit;
session_destroy();
header("location: ../pages/sign-in.php");