<?php 

class HomeController{

    public function login(){
        header("Location:/Trainee-EcompJr-2020/views/login.php");
    }

    public function index(){
        header("Location:/Trainee-EcompJr-2020/views/home.php");
    }
}