<?php 

session_start();

class UserController{

    public function index(){
        header("Location: /Treinamento2020/views/admin/user/index.php");
    }

    public function create(){
        header("Location: /Treinamento2020/views/admin/user/create.php");
    }

    public function store(){
        if($_POST['password'] != $_POST['password_confirmation']){
            $_SESSION['erroSenha'] = "Suas senhas não batem";
            header("Location: /Treinamento2020/views/admin/user/create.php");
        }else{
            User::create($_POST['name'], $_POST['email'], $_POST['type'], $_POST['password']);            
            header("Location: /Treinamento2020/views/admin/user/index.php");
        }
    }

    public function edit($id){
        header("Location: /Treinamento2020/views/admin/user/edit.php?id={$id[0]}");
    }

    public function profile(){
        header("Location: /Treinamento2020/views/admin/user/profile.php");
    }

    public function update($id){
        if($_POST['password'] != $_POST['password_confirmation']){
            $_SESSION['erroSenha'] = "Suas senhas não batem";
            header("Location: /Treinamento2020/views/admin/user/edit.php?id={$id[0]}");
        }else{
            User::update($id[0], $_POST['name'], $_POST['email'], $_POST['type'], $_POST['password']);           
            header("Location: /Treinamento2020/views/admin/user/index.php");
        }
        
    }

    public function delete($id){
        User::delete($id[0]);
        header("Location: /Treinamento2020/views/admin/user/index.php");
    }

    public static function all(){
        return User::all();
    }
    
    public function check(){
        $user = User::find($_POST['email'], $_POST['password']);
        if($user){
            $_SESSION['user'] = $user;
            header("Location: /Treinamento2020/views/admin/dashboard.php");
        }else{
            $_SESSION['erroLogin'] = "Credenciais Incorretas";
            header("Location: /Treinamento2020/views/login.php");
        }
    }

    public static function verifyLogin(){
        if($_SESSION['user'] == null){            
            header("Location: /Treinamento2020/views/login.php");
        }
    }
    
    public static function verifyAdmin(){
        $user = $_SESSION['user'];    
        if($user->getType() != "admin"){            
            header("Location: /Treinamento2020/views/admin/dashboard.php");
        }
    }

    public static function logout(){
        $_SESSION['user'] = null;
        header("Location: /Treinamento2020/views/login.php");
    }

    public static function get($id){
        return User::get($id);
    }
}