<?php
function site_url($url = null)
{
    return URL . '/' . $url;
}

function themeassets($url = null){
    return URL . 'public/' . setting("theme") . "/" . $url;
}
function assets($url = null)
{
    return URL . 'public/assets/' . $url;
}
function plugins($pluginName){
    return URL . 'public/plugins/' . $pluginName;
}
function admin_url($url = null)
{
    return URL . 'admin/' . $url;
}

function admin_pub($url = null){
    return URL . 'admin/public' . $url;
}

