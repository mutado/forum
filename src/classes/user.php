<?php

class User{
    private $username;
    private $email;
    private $uid;
    private $level;
    public function __construct($username,$email,$uid,$level){
        $this->username = $username;
        $this->email = $email;
        $this->uid = $uid;
        $this->level = $level;
    }
    public function GetUsername(){return $this->username;}
    public function GetEmail(){return $this->email;}
    public function GetUid(){return $this->uid;}
    public function GetLevel(){return $this->level;}
}