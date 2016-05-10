<?php require(dirname(dirname(__FILE__)).'/includes/header.php');
session_start();
if (isset($_SESSION['log'])) {
    echo $_SESSION['log'];
    unset($_SESSION['log']);
}

?>
<h1>Olá, seja bem vindo as marcações de consulta</h1>
<?php require(dirname(dirname(__FILE__)).'/includes/footer.php') ?>