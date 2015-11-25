<?php

/**
 * Classe controle básica
 * para testar o nosso MVC
 */
class ProcessoControle extends Controle
{

    /**
     * Método que exibe todos processos
     */
    public function index()
    {
        # carrega o modelo
        $this->modelo('Processo');

        # defino uma variável para receber a lista
        $lista = array();

        # Uso o modelo para listar ou pesquisar
        $listaProcessos = (isset($_GET['nrProcesso']) && is_numeric($_GET['nrProcesso'])) ? array($this->Processo->pesquisar(array('nr_processo' => $_GET['nrProcesso']))) : $this->Processo->listar();

        # vincular a variável lista dentro da visão.
        $this->visao->bind('listaProcessos', $listaProcessos);

        # indico a visão para renderizar no navegador
        $this->visao->render('Processo/index');
    }

    /**
     * método que serve pra inserir o processo
     */
    public function adicionar()
    {

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
    public function editar()
    {

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
    public function deletar()
    {

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