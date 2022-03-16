<?php
$app_root2 = "/oop1.7";
require_once $_SERVER["DOCUMENT_ROOT"] . "$app_root2/models/City.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "$app_root2/models/User.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "$app_root2/service/CityLoader.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "$app_root2/service/DBManager.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "$app_root2/service/Logger.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "$app_root2/service/MessageService.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "$app_root2/service/Container.php";
session_start();

//print json_encode($_SERVER); exit;
$request_uri = explode("/", $_SERVER['REQUEST_URI']);
$app_root = "/" . $request_uri[1] . "/" . $request_uri[2];


require_once "connection_data.php";
require_once "html_functions.php";
require_once "form_elements.php";
require_once "sanitize.php";
require_once "validate.php";
require_once "security.php";

require_once "access_control.php";


//initialize $old_post
$old_post = [];

if ( key_exists( 'OLD_POST', $_SESSION ) AND is_array( $_SESSION['OLD_POST']) )
{
    $old_post = $_SESSION['OLD_POST'];
    $_SESSION['OLD_POST'] = [];
}

$configuration =[
    "servername" => "localhost",
    "username" => "root",
    "password" => "rootpaswoord",
    "dbname" => "steden2",
];

//$logger = new Logger();
//$dbm= new DBManager($configuration,$logger);
//$ms = new MessageService();