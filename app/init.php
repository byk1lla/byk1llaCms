<?php
ob_start();
session_start();
error_reporting(E_ERROR);

function loadClasses($class){
    require __DIR__ ."/classes/". ucfirst($class).".php";
}
spl_autoload_register('loadClasses');


$config = require  'config.php';
try{

$db = new PDO("mysql:host=".$config['db']['host'] .";dbname=".$config['db']['name'],$config['db']['user'],$config['db']['pass'] );
$user = new User($db);
$category = new Category($db);
$portfolio = new Portfolio($db);
$customer = new Customer($db);
$service = new Service($db);
$statHandler = new StatusHandler();
$product = new Product($db);

}catch (PDOException $ex){
    $errorMessage = "Veritabanında bir hata oluştu! Lütfen daha sonra tekrar deneyiniz.";
    $detail = [
        "message" => $ex->getMessage(),
        "type" => get_class($ex),
        "file" => $ex->getFile(),
        "line" => $ex->getLine(),

    ];
    $_SESSION["error"] = 1;

}

require "settings.php";
foreach(glob("./app/helpers/*.php") as $helper){
//    echo $helper . PHP_EOL;
    require $helper;
}

if($_SESSION["error"]){
    require main_view("err");
    unset($_SESSION["error"]);
    exit;
}