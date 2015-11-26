<?php

/**
 * Classe controle básica
 * para testar o nosso MVC
 */
class LoginControle extends Controle {

    /**
     * Método que exibe todos processos
     */
    public function index() {


        //Verifica se o usuario já está logado
        if (isset($_SESSION['usuario'])) {
            header("Location: ?c=dashboard");
        }


        if ($_POST) {

            $this->modelo('Usuario');

            $usuario = $this->Usuario->autenticar($_POST['email'], $_POST['senha']);

            if ($usuario) {
                $this->Usuario->logUsuario();
                header("Location: ?c=dashboard");
                $this->visao->bind('success', true);
            } else {
                $this->visao->bind('success', false);
            }
        }

        $this->visao->render('Login/index');
    }

    /**
     * método que serve pra inserir o processo
     */
    public function adicionar() {

        if ($_POST) {
            $this->modelo('Usuario');

            $usuario = $this->Usuario->salvarUsuario($_POST['nome'], $_POST['email'], $_POST['senha']);


            if ($usuario) {
                header("Location: ?c=login");
                $this->visao->bind('success', true);
            } else {
                $this->visao->bind('success', false);
            }
        } else {
            $this->visao->render('Login/adicionar');
        }
    }
    
    public function deslogar() {
        $this->modelo('Usuario');
        $this->Usuario->deslogar();
        header("Location: ?c=login");
    }

}
