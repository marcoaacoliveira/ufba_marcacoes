<?php require(dirname(dirname(__FILE__)).'/includes/header.php') ?>
    <h1>Cadastro de animal</h1>
    <form action="/animal/store/<?php echo $id; ?>" method="post">
        <label>Nome</label>
        <input name="login" type="text" />
        <label>Raça</label>
        <input name="race" type="text" />
        <label>Nascimento</label>
        <input name="birthday" type="text" />
        <label>Especie</label>
        <input name="type" type="text" />
    </form>
<?php require(dirname(dirname(__FILE__)).'/includes/footer.php') ?>