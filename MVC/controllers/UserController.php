<?php
require 'controllers/AbstractController.php';
require 'managers/UserManager.php';

class UserController extends AbstractController{
    private UserManager $manager;
    
    public function __construct()
    {
        $this->manager = new UserManager("db.3wa.io", "3306","arnauddeletre","900979afbcfa4468bcb42cce8d75b844");
    }
    
    
    public function index()
    {
        $users=$this->manager->getAllUsers();
        $this->render("index", ["users"=>$users]);
    }
    
    public function create(array $post)
    {
        $user = new User($post['email'], $post['username'], $post['password']);
        $users=$this->manager->insertUser($user);
        $this->render("create", ["users"=>$users]);
    }
    
    public function edit(array $post)
    {
        
    }
}


?>