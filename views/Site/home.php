<?php require(dirname(dirname(__FILE__)).'/includes/header.php');
session_start();
if (isset($_SESSION['log'])) {
    unset($_SESSION['log']);
}

?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>Olá, seja bem vindo as marcações de consulta</h1>
        </section>

        <!-- Main content -->
        <section class="content">
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

<?php require(dirname(dirname(__FILE__)).'/includes/footer.php') ?>