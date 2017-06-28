<?php
/**
 * Created by PhpStorm.
 * User: aptor
 * Date: 18/08/16
 * Time: 10:00
 */
require_once 'vendor/autoload.php';
require_once 'TemplateRenderer.php';
require_once 'vendor/phpmailer/phpmailer/class.phpmailer.php';

spl_autoload_register(function ($class_name) {
    $class_name = str_replace("\\","/",$class_name);
    include $class_name . '.php';
});