<?php

/**
 * Classe modelo de usuário. tem o
 * objetivo de conectar ao banco de dados
 * recuperar, inserir, alterar e apagar os
 * dados dos usuários existentes lá.
 */
class Processo
{

    /**
     * Método criado para listar os usuários
     * existentes na tabela de usuários do
     * banco de dadoss.
     */
    public function listar($pesquisa = array())
    {
        # cria uma conexão usando a configuração
        # "padrao" da classe Config em config.php
        $db = DB::criar('padrao');

        # começa a montar o select
        $sql = "select * from processo";

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

    /**
     * Método criado para encontrar um
     * usuário usando seu ID. Usa o
     * método listar para isso.
     */
    public function pesquisar($pesquisa)
    {
        $item = self::listar($pesquisa);
        return $item[0];
    }

    public function adicionar($campos = array())
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

        $sql = 'INSERT INTO processo(' . implode(', ', $camposN) . ') VALUES ' . '(' . implode(', ', $camposV) . ')';
        return $db->query($sql);
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

        $sql = 'UPDATE processo SET ' . implode(', ', $camposNV) . ' where id_processo = ' . $id;
        return $db->query($sql);
    }

    public function deletar($id)
    {
        if (!$id) {
            return false;
        }

        $db = DB::criar('padrao');
        $sql = 'DELETE FROM processo where id_processo = ' . $id;
        return $db->query($sql);
    }

}