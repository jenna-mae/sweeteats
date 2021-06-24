<?php
session_start();
include("libs/Db.php");
spl_autoload_register(function($class_name) {
    $folders = array("models", "controllers", "views");
    foreach($folders as $folder) {
        if(file_exists($folder."/".$class_name.".php")) {
            include $folder."/".$class_name.".php";
        };
    }
});

$controller = (isset($_GET["controller"])) ? $_GET["controller"] : "pages";
$action = (isset($_GET["action"])) ? $_GET["action"] : "home";

if($controller) {
    $controllerName = ucfirst($controller)."Controller";
    $controllerFile = "controllers/".$controllerName.".php";
    if(file_exists($controllerFile)){
        include($controllerFile);
    } else {
        echo "the controller you asked for is invalid:".$controllerFile;
        die;
    }
}

$oController = new $controllerName();

if(method_exists($oController, $action)){
    $oController->$action();
    if(method_exists($oController, "postTrip")) {
        $oController->postTrip();
    } else {
        echo $oController->state["html"];
    }
} else {
    $oController->error();
    echo $oController->state["html"];
}
?>