<?php require(dirname(dirname(__FILE__)).'/includes/header.php') ?>
    <form action="/user/store" method="post">
        <label>Login</label>
        <input name="login" type="text" />
        <label>Senha</label>
        <input name="password" type="password" />
        <input type="submit" />
    </form>
<?php require(dirname(dirname(__FILE__)).'/includes/footer.php') ?>