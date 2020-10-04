<?php 
    require_once "../../../DB/Connection.php";
    require_once "../../../models/User.php";
    require_once "../../../controllers/UserController.php";
    UserController::verifyLogin();
    UserController::verifyAdmin();   
?>


<html>

    <?php  
        if($_SESSION['erroSenha'] =! null){
            echo $_SESSION['erroSenha'];
            $_SESSION['erroSenha'] = null;
        }   
    ?>

    <form action="/Treinamento2020/user/store" method="post">
        <input name="name" placeholder="Nome">
        <input type="email" name="email" placeholder="Email">
        <select name="type">
            <option value="">Selecione um tipo</option>
            <option value="admin">Administrador</option>
            <option value="user">Usuário comum</option>
        </select>
        <input type="password" name="password"placeholder="Digite sua senha">
        <input type="password" name="password_confirmation"placeholder="Confirme sua senha">
        <button type="submit"> Cadastrar </button>        
    </form>

</html>