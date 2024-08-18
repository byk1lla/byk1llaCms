<?php

function admin_view($view)
{
    return PATH. "/admin/views/" . $view . ".php";
}

function admin_controller($controller)
{
    return PATH . '/admin/controllers/' . $controller . '.php';
}