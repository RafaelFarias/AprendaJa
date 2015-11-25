<div class="panel panel-default">
    <div class="panel-heading">Listagem de Processos</div>
    <div class="panel-body">

        <form class="form-inline" role="form" method="GET" action="">
            <div class="row">
                <div class="col-sm-10">
                    <div class="form-group">
                        <label for="numeroProcesso">Número do Processo:</label>
                        <input type="text" class="form-control" name="nrProcesso" placeholder="Número Processo"
                               value="<?= isset($_GET['nrProcesso']) ? $_GET['nrProcesso'] : '' ?>">
                        <button type="submit" class="btn btn-primary">Consultar</button>
                        <?php if (isset($_GET['nrProcesso'])): ?><a href="?" class="btn btn-danger" onClick="limpa()">Limpar</a><?php endif; ?>
                    </div>
                </div>
                <div class="col-sm-2">
                    <a href="?c=processo&a=adicionar" class="btn btn-success">Cadastrar Processos</a>
                </div>
            </div>
        </form>

        <br/>
        <br/>
        <br/>

        <table class="table">
            <thead>
            <tr>
                <th>Número Processo</th>
                <th>Data</th>
                <th>Parte 1</th>
                <th>Parte 2</th>
                <th>Descrição Processo</th>
                <th>Prazo</th>
                <th>Ações</th>
            </tr>
            </thead>
            <tbody>

            <?php
            if ($listaProcessos)
                foreach ($listaProcessos as $processo) {
                    $class = 'success';
                    if ($processo['fl_processo'] == 'A') {
                        $class = 'info';
                    }

                    echo '<tr class="' . $class . '">';
                    echo '<td>' . $processo['nr_processo'] . '</td>';
                    echo '<td>' . $processo['dt_inicial'] . '</td>';
                    echo '<td>' . $processo['ds_um'] . '</td>';
                    echo '<td>' . $processo['ds_dois'] . '</td>';
                    echo '<td>' . $processo['ds_processo'] . '</td>';
                    echo '<td>' . $processo['nr_prazo'] . '</td>';
                    echo '<td><a href="?c=processo&a=editar&id=' . $processo['id_processo'] . '"><span class="glyphicon glyphicon-edit"></span></a> <a href="?c=processo&a=deletar&id=' . $processo['id_processo'] . '"><span class="glyphicon glyphicon-trash"></span></a><td>';
                }
            ?>
            </tbody>
        </table>
    </div>
</div>