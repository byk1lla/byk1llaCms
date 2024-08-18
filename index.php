<?php

require './app/init.php';

$route = array_filter(explode("/",$_SERVER["REQUEST_URI"]));


if(!route(1)){
    $route[1] = "index";
}
if(!file_exists(controller($route[1]))){
    $route[1] = "404";

}
if(setting("bakim") && $route[1] != "admin"){
    $route[1] = "bakim";
}
try{
require controller($route[1]);
}

catch(Exception $ex){
    $errorMessage = "Plugin'de bir hata oluştu lütfen daha sonra tekrar deneyiniz.";
    $errorType = get_class($ex);
    $detail = [
        "message" => $ex->getMessage(),
        "type" => get_class($ex),
        "file" => $ex->getFile(),
        "line" => $ex->getLine(),

    ];
    require main_view("err");

}catch(Error $er){
    $detail = [
        "message" => $er->getMessage(),
        "type" => get_class($er),
        "file" => $er->getFile(),
        "line" => $er->getLine(),
    ];
    $errorMessage = "Beklenmedik bir hata oluştu lütfen daha sonra tekrar deneyiniz.";
    require main_view("err");

}