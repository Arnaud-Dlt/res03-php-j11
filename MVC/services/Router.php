<?php
class Router {
    private UserController $userCtrl;
    
    
    public function __construct(){
        $this-> userCtrl = new UserController();
    }

    function checkRoute(string $route) : void 
    {
        if($route === "users"){
            $this->userCtrl->index();
        }
        else if($route === "user-create"){
            $this->userCtrl->create();
        }
        else if($route === "user-edit"){
            $this->userCtrl->edit();
        }
        else {
            $userCtrl->index();
        }
    }
}

?>