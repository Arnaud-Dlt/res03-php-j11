<?php

require 'managers/AbstractManager.php';
require 'models/User.php';

class UserManager extends AbstractManager{
    
    public function getAllUsers() : array
    {
        $query=$this->db->prepare("SELECT * FROM users");
        $query->execute();
        $getAllUsers=$query->fetchAll(PDO::FETCH_ASSOC);
    
        $tabusers=[];
        foreach($getAllUsers as $user){
            $object=new User($user['id'], $user['email'],$user['username'],$user['password']);
            array_push($tabusers, $object);
        }
        return $tabusers;
    }
    public function getUserById(int $id) : User
    {
        $query=$this->db->prepare("SELECT * FROM users WHERE id= :id");
        $parameters= ['id' => $id];
        $query->execute($parameters);
        $getUserById=$query->fetch(PDO::FETCH_ASSOC);
        $newAuthor=new User($getUserById['id'], $getUserById['email'],$getUserById['username'],$getUserById['password']);
    
        return $newAuthor;
    }
    public function insertUser(User $user) : User
    {
        $query=$this->db->prepare("INSERT INTO users VALUES (null, :email, :username,:password)");
        $parameters= [
            'email'=> $user->getEmail(),
            'username' =>$user->getUsername(),
            'password' => $user->getPassword()
            ];
        $query->execute($parameters);
    
        $getUser=$query->fetch(PDO::FETCH_ASSOC);
    
        return $user;
    }
    public function editUser(User $user) : void
    {
        $query=$this->db->prepare("UPDATE users SET email = :email, username=:username, password=:password WHERE users.id=:id");
        $parameters= [
            'id' => $user->getId(),
            'email'=> $user->getEmail(),
            'username' =>$user->getUserame(),
            'password' => $user->getPassword()
            ];
        $query->execute($parameters);
        $allUsers=$query->fetch(PDO::FETCH_ASSOC);
    }
}


?>