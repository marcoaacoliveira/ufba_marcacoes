<?php require(dirname(dirname(__FILE__)).'/includes/header.php');
require(dirname(dirname(__FILE__)).'/includes/sidebar.php');
?>
<div class="conteudo-left">
    <h1>Cadastro de médico</h1>
    <form action="/animal/store/<?php echo $id; ?>" method="post">
        <label>Dias de consulta</label>
        <input name="available_days" type="text" />
        <label>Horário de inicio da consulta</label>
        <input name="available_hour_begin" type="text" />
        <label>Horário final das consultas</label>
        <input name="available_hour_end" type="text" />
        <label>Especie</label>
        <input name="type" type="text" />
    </form>
</div>
<?php require(dirname(dirname(__FILE__)).'/includes/footer.php') ?>