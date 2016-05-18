<?php
session_start();
require(dirname(dirname(__FILE__)) . '/includes/header.php');
if (isset($_SESSION['log'])) {
    echo $_SESSION['log'];
    unset($_SESSION['log']);
}
?>

    <form action="/user/auth" method="post">
        <div id="centro-main">
            <div id="centro-div">
                <img src="/vendor/img/logo.png" alt="" width="50%" height="50%">
                <p><input name="login" type="text" class="feedback-input form-input" placeholder="Usuário" id="name" required="required" /></p>
                <p><input name="password" type="password" class="feedback-input form-input" placeholder="Senha" id="name" required="required"/></p>
                <div class="submit">
                    <input type="submit" value="Acessar" id="button"/>
                    <div class="ease"></div>
                </div>
            </div>
        </div>
    </form>



<?php require(dirname(dirname(__FILE__)) . '/includes/footer.php') ?>