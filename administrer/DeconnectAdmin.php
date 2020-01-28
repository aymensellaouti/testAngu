<?php
/**
 * Created by PhpStorm.
 * User: aymen
 * Date: 14/03/16
 * Time: 08:13
 */
session_start();
session_unset();
session_destroy();

$redirect="../adconnecti.php";
include 'redirection.php';
?>