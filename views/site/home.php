<?php require(dirname(dirname(__FILE__)).'/includes/header.php');
require(dirname(dirname(__FILE__)).'/includes/sidebar.php');
session_start();
if (isset($_SESSION['log'])) {
    echo $_SESSION['log'];
    unset($_SESSION['log']);
}

?>
<div class="conteudo-left">
    <h1 class="mensage">
        Olá, seja bem vindo as marcações de consulta
    </h1>
</div>
<!-- /.content-wrapper 

<?php require(dirname(dirname(__FILE__)).'/includes/footer.php') ?>-->