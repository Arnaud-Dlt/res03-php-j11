<?php
require 'services/Router.php';

$user=new User("test@test.fr","test","test");
$um=new UserManager();
$user=$um->insertUser($user);

$router = new Router ();

if(isset($_GET["route"])){
    
    $route=$_GET['route'];
    
    $router->checkRoute($route);
}

else {
    $router->checkRoute("");
};

?>