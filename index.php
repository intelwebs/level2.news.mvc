<?php
error_reporting(E_ALL);
ob_start();

require_once __DIR__ . '/autoload.php';

$ctrl = isset($_GET['ctrl']) ? $_GET['ctrl'] : 'News';
$act = isset($_GET['act']) ? $_GET['act'] : 'All';


$controllerClassName = $ctrl . 'Controller';
require_once __DIR__.'/controllers/' . $controllerClassName . '.php';

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
    $view->display('404.php');
}