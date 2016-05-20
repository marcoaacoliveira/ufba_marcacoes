<?php require(dirname(dirname(__FILE__)).'/includes/header.php') ?>
    <h1>Cancelamento de consulta</h1>
    <form action="/appointment/delete/<?php echo $id; ?>" method="post">
    </form>
<?php require(dirname(dirname(__FILE__)).'/includes/footer.php') ?>