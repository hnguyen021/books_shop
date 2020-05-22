<?php
    $supported_controller = array(
        "home"=>array("index","error","login","logined","logout","search"),
        "cart"=>array("index","buy","delete","update","finish","bill","remove","cancel"),
        "book"=>array("category","country","index","preview"),
        "admin"=>array("index","login","handle","view","logout","managebook","upload","uploaded","delete","update")
        
        
    );
    if(!array_key_exists($controller,$supported_controller)||!in_array($action,$supported_controller[$controller])){
        $controller ="home";
        $action ="error";
    }
    require_once("controllers/".$controller."_controller.php");
    $className = ucfirst($controller)."Controller";
    

    $obj= new $className();
    $obj->$action();


?>
