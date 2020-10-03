<?php
    session_start();
?>
<html>

    <?php  
        if($_SESSION['erroLogin']){
            echo $_SESSION['erroLogin'];
            $_SESSION['erroLogin'] = null;
        }else{
            $_SESSION['erroLogin'] = null;
        }
    ?>

    <form action="/Treinamento2020/user/check" method="post">
        <input name="email" placeholder="email">        
        <input name="password" type="password" placeholder="password">
        <button type="submit"> Entrar </button>        
    </form>
</html>