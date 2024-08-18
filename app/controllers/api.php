<?php
$json = [];

header('Content-Type: application/json; charset=utf-8');
$type =  route(2);
if(!$type){
    exit;
}
if(file_exists(controller("api/" .$type ))){
    require_once(controller("api/" .$type ));
}

echo json_encode($json);