<?php
$app_root2 = "/oop1.5";
require_once $_SERVER["DOCUMENT_ROOT"] . "$app_root2/models/City.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "$app_root2/models/User.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "$app_root2/service/CityLoader.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "$app_root2/service/DBManager.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "$app_root2/service/Logger.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "$app_root2/service/MessageService.php";
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

//initialize $errors array
$errors = [];

if ( key_exists( 'errors', $_SESSION ) AND is_array( $_SESSION['errors']) )
{
    $errors = $_SESSION['errors'];
    $_SESSION['errors'] = [];
}

//initialize $msgs array
$msgs = [];

if ( key_exists( 'msgs', $_SESSION ) AND is_array( $_SESSION['msgs']) )
{
    $msgs = $_SESSION['msgs'];
    $_SESSION['msgs'] = [];
}

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
    "password" => "",
    "dbname" => "steden",
];

$logger = new Logger();
$dbm= new DBManager($configuration,$logger);
$ms = new MessageService();