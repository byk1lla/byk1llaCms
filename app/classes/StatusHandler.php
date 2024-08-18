<?php

class StatusHandler
{

    public static function add($status,$app){
        if ($status == 1 || ($status > 0 && is_numeric($status))) {
            $_SESSION['alert_message'] = "$app başarıyla eklendi!";
            $_SESSION['alert_type'] = 'success';
        } else {
            if($status !== 1){
                switch ($status) {
                    case "already":
                        $_SESSION['alert_message'] = 'Bu bilgilerle bir ' . $app . ' zaten mevcut!';
                        $_SESSION['alert_type'] = 'warning';
                        return $status;
                        break;
                    case "empty":
                        $_SESSION['alert_message'] = 'Lütfen alanları doldurun!';
                        $_SESSION['alert_type'] = 'error';
                        break;
                    default:
                        $_SESSION['alert_message'] = 'Bir şeyler ters gitti...';
                        $_SESSION['alert_type'] = 'error';
                        break;
                }
            }else{
                $_SESSION['alert_message'] = 'ben bir orospu çocuğuyum';
                $_SESSION['alert_type'] = 'warning';
            }
        }
    }

    public static function delete($status,$app){
        if ( $status > 0) {
            $_SESSION['alert_message'] = "$app başarıyla silindi!";
            $_SESSION['alert_type'] = 'success';
        } else {
            switch ($status) {
                default:
                    $_SESSION['alert_message'] = 'Bir şeyler ters gitti...';
                    $_SESSION['alert_type'] = 'error';
                    break;
            }
        }
    }
    public static function update($status,$app){
        if ($status == 1) {
            $_SESSION['alert_message'] = "$app başarıyla güncellendi!";
            $_SESSION['alert_type'] = 'success';
        } else {
            switch ($status) {
                case $status === 0:
                    $_SESSION['alert_message'] = 'Bir şeyler ters gitti...';
                    $_SESSION['alert_type'] = 'error';
                    break;
            }
        }
    }


}