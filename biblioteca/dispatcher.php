<?php

require_once 'biblioteca/request.php';
require_once 'biblioteca/visao.php';
require_once 'biblioteca/controle.php';
require_once 'biblioteca/config.php';
require_once 'biblioteca/banco.php';

$controle = Request::get('c');
$acao = Request::get('a');
session_start();

if ($controle == '') {
    # agora definimos um controle padrão
    # quando nenhum controle for informado
    $controle = "Login";
}

# verifica se o arquivo de controle existe na pasta controle
if (file_exists("controles/{$controle}Controle.php")) {
    # inclui o controle na página
    require_once "controles/{$controle}Controle.php";
} else {
    die("O controle <strong>{$controle}</strong> não existe na pasta controle do MVC");
}

# adiciona a terminação Controle
# ao nome do controle
$controle .= 'Controle';

# instancia o controle
$controle = new $controle();

# agora,verificamos de a ação foi informada
if ($acao == "") {
    # se não informamos a ação
    # usamos o método padrão index
    $acao = 'index';
}
# verifica se o método existe no objeto controle
if (method_exists($controle, $acao)) {
    # se existir, executa o método
    $controle->$acao();
} else {
    # se não existir, emite uma mensagem de erro
    die('Page not found!!!');
}

