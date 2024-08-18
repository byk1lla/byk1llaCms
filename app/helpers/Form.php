<?php

function post($val)
{
    if(isset($_POST[$val])){
        if(is_array($_POST[$val])){
            return array_map(function ($item){
                return (trim($item));
            }, $_POST[$val]);
        }
        return (trim($_POST[$val]));
    }
}
function get($val)
{
    if(isset($_GET[$val])){
        if(is_array($_GET[$val])){
            return array_map(function ($item){
                return (trim($item));
            }, $_GET[$val]);
        }
        return (trim($_GET[$val]));
    }

}