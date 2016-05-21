<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>HOSPVET</title>
    <link href="../../vendor/css/style.css" rel="stylesheet">
     <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
     <script src="../../vendor/js/script.js" type="text/javascript"></script>
</head>
<body>
    <div class="conteudo">
        <div class="top">
            <div class="float-right user">
                <img src="" alt="">
                <div id='cssmenu' class="float-right">
                    <ul>
                        <li class='active'><a href='#'><?php echo $_SESSION['login']; ?></a>
                            <ul>
                                <li><a href='#'>Perfil</a></li>
                                <li><a href='#'>Configurações</a></li>
                                <li><a href='#'>Sair</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
        </div>
    </div>
