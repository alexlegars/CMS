<?php
chdir($rootDir = dirname(__DIR__));
require_once "init.php";

$action = '';
if (isset($_GET['a'])){
    $action = $_GET['a'];
}
//$_GET['a'] = $_GET['a'] ?? '';
$page = new \Controller\PageController($pdo);

switch($action){
    case "detail":
       // $page->detailsAction();
        break;
    case "lister":
    default:
        $page->listeAction();

}