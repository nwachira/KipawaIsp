<?php

$protocol = (!empty($_SERVER["HTTPS"]) && $_SERVER["HTTPS"] !== "off" || $_SERVER["SERVER_PORT"] == 443) ? "https://" : "http://";
$host = $_SERVER["HTTP_HOST"];
$baseDir = rtrim(dirname($_SERVER["SCRIPT_NAME"]), "/\\");
define("APP_URL", $protocol . $host . $baseDir);

// Live, Dev, Demo
$_app_stage = "Live";

// Database PHPNuxBill
$db_host	    = "localhost";
$db_user        = "phpmyadmin";
$db_pass    	= "P@22word";
$db_name	    = "kipawa3";

// Database Radius
$radius_host	    = "localhost";
$radius_user        = "phpmyadmin";
$radius_pass    	= "P@22word";
$radius_name	    = "kipawa3";

if($_app_stage!="Live"){
    error_reporting(E_ERROR);
    ini_set("display_errors", 1);
    ini_set("display_startup_errors", 1);
}else{
    error_reporting(E_ERROR);
    ini_set("display_errors", 0);
    ini_set("display_startup_errors", 0);
}