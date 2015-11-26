<?php

class Usuario
{

    var $nome;
    var $email;
    var $senha;

    function salvarUsuario($nome = null, $email = null, $senha = null)
    {

        $db = DB::criar('padrao');
        $sql = 'INSERT INTO usuario (nm_usuario, ds_email, nr_senha) VALUES ("' . $nome . '", "' . $email . '", "' . $senha . '")';
        return $db->query($sql);
    }

    function adicionar($campos = array())
    {
        if (count($campos) == 0) {
            return false;
        }

        $db = DB::criar('padrao');

        foreach ($campos as $nome => $valor) {

            if ($_POST[$nome] != '') {
                $camposN[] = $nome;
                $numberOrString = is_numeric($_POST[$nome]) ? $_POST[$nome] : '"' . $_POST[$nome] . '"';
                $camposV[] = $numberOrString;
            }
        }

        $sql = 'INSERT INTO usuario(' . implode(', ', $camposN) . ') VALUES ' . '(' . implode(', ', $camposV) . ')';
        return $db->query($sql);
    }

    function logUsuario()
    {

        $db = DB::criar('padrao');
        $sql = 'INSERT INTO logs (login, data_hora) VALUES ' . '("' . $_SESSION['usuario']['ds_email'] . '", "' . date('d/m/Y h:i:s') . '")';
        return $db->query($sql);
    }

    function autenticar($email, $senha)
    {

        $db = DB::criar('padrao');

        # começa a montar o select
        $sql = 'select * from usuario WHERE ds_email = "' . $email . '" AND nr_senha = "' . $senha . '"';
        $usuario = $db->query($sql);

        $user = $usuario->fetch_all(MYSQLI_ASSOC);

        if ($user) {
            $usuario->free();
            $_SESSION["usuario"] = $user[0];
            return true;
        } else {
            return false;
        }
    }

    function deslogar()
    {
        unset($_SESSION["usuario"]);
    }

    public function atualizar($campos = array(), $id)
    {
        if (count($campos) == 0) {
            return false;
        }

        $db = DB::criar('padrao');

        foreach ($campos as $nome => $valor) {

            if ($_POST[$nome] != '') {
                $numberOrString = is_numeric($_POST[$nome]) ? $_POST[$nome] : '"' . $_POST[$nome] . '"';

                $camposNV[] = $nome . '=' . $numberOrString;
            }
        }

        $sql = 'UPDATE usuario SET ' . implode(', ', $camposNV) . ' where id_usuario = ' . $id;
        return $db->query($sql);
    }

    public function deletar($id)
    {
        if (!$id) {
            return false;
        }

        $db = DB::criar('padrao');
        $sql = 'DELETE FROM usuario where id_usuario = ' . $id;
        return $db->query($sql);
    }

    public function listar($pesquisa = array())
    {
        # cria uma conexão usando a configuração
        # "padrao" da classe Config em config.php
        $db = DB::criar('padrao');

        # começa a montar o select
        $sql = "select * from usuario";

        # monta o Where de acordo com a
        # lista de condições.
        $where = '';

        if ($pesquisa)
            foreach ($pesquisa as $campo => $value) {
                $where = ' where ' . $campo . ' = ' . $value;
            }

        # termina de montar o SQL
        $sql .= $where;
        # executa o SQL e retorna a lista de usuarios
        $resultado = $db->query($sql);

        if ($resultado) {
            $lista = $resultado->fetch_all(MYSQLI_ASSOC);
            $resultado->free();
            return $lista;
        } else {
            return $resultado;
        }
    }

    public function pesquisar($pesquisa)
    {
        $item = self::listar($pesquisa);
        return $item[0];
    }

    function getNome()
    {
        return $this->nome;
    }

    function getCpf()
    {
        return $this->cpf;
    }

    function getSexo()
    {
        return $this->sexo;
    }

    function getData_nascimento()
    {
        return $this->data_nascimento;
    }

    function getEndereco()
    {
        return $this->endereco;
    }

    function getEmail()
    {
        return $this->email;
    }

    function getTelefone()
    {
        return $this->telefone;
    }

    function getFormacao_academica()
    {
        return $this->formacao_academica;
    }

    function getExperiencia()
    {
        return $this->experiencia;
    }

    function setNome($nome)
    {
        $this->nome = $nome;
    }

    function setCpf($cpf)
    {
        $this->cpf = $cpf;
    }

    function setSexo($sexo)
    {
        $this->sexo = $sexo;
    }

    function setData_nascimento($data_nascimento)
    {
        $this->data_nascimento = $data_nascimento;
    }

    function setEndereco($endereco)
    {
        $this->endereco = $endereco;
    }

    function setEmail($email)
    {
        $this->email = $email;
    }

    function setTelefone($telefone)
    {
        $this->telefone = $telefone;
    }

    function setFormacao_academica($formacao_academica)
    {
        $this->formacao_academica = $formacao_academica;
    }

    function setExperiencia($experiencia)
    {
        $this->experiencia = $experiencia;
    }

}

?>