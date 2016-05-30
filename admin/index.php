<?php
chdir($rootDir = dirname(__DIR__));
require_once "init.php";

$action = '';
if (isset($_GET['a'])){
    $action = $_GET['a'];
}
//$_GET['a'] = $_GET['a'] ?? '';

$page = new \Controller\PageController($pdo);

switch($_GET['a']){
    case "ajouter":
        $page->ajoutAction();
        break;
    case "lister":
    default:
        $page->listeAction();

}