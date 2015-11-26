<?php

/**
 * Classe controle básica
 * para testar o nosso MVC
 */
class AulaControle extends Controle {

    function __construct() {
        parent::__construct();

        //Verifica se o usuario já está logado
        if (!$_SESSION['usuario']) {
            header("Location: ?c=login");
        }
    }
    
    /**
     * método que serve pra inserir o processo
     */
    public function adicionar() {

        if ($_POST) {

            if (!Helper::valid($_POST)) {
                header("Location: ?c=aula&a=adicionar&valid=0");
                exit;
            }

            $this->modelo('Aula');

            $dados = array(
                'nm_titulo_aula' => $_POST['nm_titulo_aula'],
                'ds_descricao_aula' => $_POST['ds_descricao_aula'],
                'fl_status_aula' => 'A',
                'nr_valor_aula' => $_POST['nr_valor_aula'],
                'qt_vagas' => $_POST['qt_vagas'],
                'dt_aula' => $_POST['dt_aula'],
                'id_professor' => $_SESSION['usuario']['id_usuario'],
                'duracao' => $_POST['duracao']
            );

            $processo = $this->Aula->adicionar($dados);

            if ($processo) {
                $this->visao->bind('success', true);
            } else {
                $this->visao->bind('success', false);
            }

            header("Location: ?c=dashboard");
        } else {
            $this->visao->render('Aula/adicionar');
        }
    }

    /**
     * método que serve pra editar o processo
     */
    public function editar() {

        $this->modelo('Aula');

        if ($_POST) {

            $processo = $this->Processo->atualizar($_POST, $_GET['id']);

            if ($processo) {
                $this->visao->bind('success', true);
            } else {
                $this->visao->bind('success', false);
            }

            header("Location: ?c=processo");
        } else {
            $aula = $this->Aula->pesquisar(array(`id_aula` => $_GET['id']));
            $this->visao->bind('aula', $aula);

            $this->visao->render('Aula/editar');
        }
    }

    /**
     * método que serve pra deletar o processo
     */
    public function deletar() {

        $this->modelo('Aula');

        $processo = $this->Aula->deletar($_GET['id']);

        if ($processo) {
            header("Location: ?c=dashboard");
            $this->visao->bind('success', true);
        } else {
            $this->visao->bind('success', false);
        }
    }

}
