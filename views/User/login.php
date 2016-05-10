<?php
session_start();
require(dirname(dirname(__FILE__)) . '/includes/header.php');
if (isset($_SESSION['log'])) {
    echo $_SESSION['log'];
    unset($_SESSION['log']);
}
?>

    <form action="/user/auth" method="post">
        <label>Login</label>
        <input name="login" type="text"/>
        <label>Senha</label>
        <input name="password" type="password"/>
        <input type="submit"/>
    </form>
<?php require(dirname(dirname(__FILE__)) . '/includes/footer.php') ?>