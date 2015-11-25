<?php

/**
 * Classe controle básica
 * para testar o nosso MVC
 */
class DashboardControle extends Controle {

    function __construct() {
        parent::__construct();

        //Verifica se o usuario já está logado
        if (!$_SESSION['usuario']) {
            header("Location: ?c=login");
        }
    }

    /**
     * Método que exibe todos processos
     */
    public function index() {


        $this->modelo('Aula');
        
        # Uso o modelo para listar ou pesquisar
        $listaAulas = (isset($_GET['assunto'])) ? array($this->Aula->pesquisar(array('nr_processo' => $_GET['nrProcesso']))) : $this->Aula->listar();
        
        # vincular a variável lista dentro da visão.
        $this->visao->bind('listaAulas', $listaAulas);

        $this->visao->render('Dashboard/index');
    }

    /**
     * método que serve pra inserir o processo
     */
    public function adicionar() {

        if ($_POST) {
            $this->modelo('Processo');

            $processo = $this->Processo->adicionar($_POST);

            if ($processo) {
                $this->visao->bind('success', true);
            } else {
                $this->visao->bind('success', false);
            }

            header("Location: ?c=processo");
        } else {
            $this->visao->render('Processo/adicionar');
        }
    }

    /**
     * método que serve pra editar o processo
     */
    public function editar() {

        $this->modelo('Processo');

        if ($_POST) {

            $processo = $this->Processo->atualizar($_POST, $_GET['id']);

            if ($processo) {
                $this->visao->bind('success', true);
            } else {
                $this->visao->bind('success', false);
            }

            header("Location: ?c=processo");
        } else {
            $processo = $this->Processo->pesquisar(array(`id_processo` => $_GET['id']));
            $this->visao->bind('processo', $processo);

            $this->visao->render('Processo/editar');
        }
    }

    /**
     * método que serve pra deletar o processo
     */
    public function deletar() {

        $this->modelo('Processo');
        $processo = $this->Processo->deletar($_GET['id']);

        if ($processo) {
            header("Location: ?c=processo");
            $this->visao->bind('success', true);
        } else {
            $this->visao->bind('success', false);
        }
    }

}
