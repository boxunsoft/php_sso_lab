<?php
/**
 * Created by PhpStorm.
 * User: Jordy
 * Date: 2019/3/27
 * Time: 11:29 AM
 */
$rootPath = dirname(dirname(dirname(__DIR__)));
require $rootPath . '/vendor/autoload.php';

$app = \Alf\Application::getInstance();
$app->main($rootPath, 'Mobile');