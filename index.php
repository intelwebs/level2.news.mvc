<?php
error_reporting(E_ALL);
ob_start();


require_once __DIR__ . '/autoload.php';

$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$pathParts = explode('/', $path);

$ctrl = !empty($pathParts[1]) ? ucfirst($pathParts[1]) : 'News';
$act = !empty($pathParts[2]) ? ucfirst($pathParts[2]) : 'All';


$controllerClassName = 'App\\Controllers\\' . $ctrl;

try
{
    $controller = new $controllerClassName;
    $method = 'action' . $act;
    $items = $controller->$method();
}
catch(E404Exception $e)
{
    $view = new View();
    $view->message = $e->getMessage();
    $view->code = $e->getCode();
    $view->display('error.php');

    $log = new Log;
    $log->putContents($e->getMessage(), $e->getCode());
}