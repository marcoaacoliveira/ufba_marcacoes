<?php require(dirname(dirname(__FILE__)).'/includes/header.php') ?>
<h1>Usuários</h1>
<table>
    <thead>
        <td>Login</td>
        <td>Email</td>
        <td>CPF</td>
        <td>Phone</td>
    </thead>
    <tbody>
    <?php foreach($users as $user) { ?>
        <tr>
            <td><?php echo $user->login ?></td>
            <td><?php echo $user->email ?></td>
            <td><?php echo $user->cpf ?></td>
            <td><?php echo $user->phone ?></td>
        </tr>
    <?php } ?>
    </tbody>
</table>
<?php require(dirname(dirname(__FILE__)).'/includes/footer.php') ?>

