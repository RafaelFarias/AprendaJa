<div class="panel panel-default">
    <div class="panel-heading">Cadastro de Processos</div>
    <div class="panel-body">

        <form class="form" role="form" action="" method="POST">

            <div class="row">
                <div class="col-sm-2">
                    <div class="form-group">
                        <label for="nr_processo">Número Processo:</label>
                        <input type="text" class="form-control" name="nr_processo" placeholder="Número Processo"
                               required="true" pattern="[0-9]+" title="Insira um numero" value="<?= isset($processo['nr_processo'])?$processo['nr_processo']:'' ?>"/>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="dt_inicial">Data:</label>
                        <input type="text" class="form-control datepicker" name="dt_inicial" id="data" placeholder="Data" value="<?= isset($processo['dt_inicial'])?$processo['dt_inicial']:'' ?>">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-10">
                    <div class="form-group">
                        <label for="ds_um">Parte 1 (Requerente):</label>
                        <input type="text" class="form-control" name="ds_um" placeholder="Parte 1 (Requerente)" value="<?= isset($processo['ds_um'])?$processo['ds_um']:'' ?>"/>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-10">
                    <div class="form-group">
                        <label for="ds_dois">Parte 2 (Réu):</label>
                        <input type="text" class="form-control" name="ds_dois" placeholder="Parte 2 (Requerente)" value="<?= isset($processo['ds_dois'])?$processo['ds_dois']:'' ?>"/>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-10">
                    <div class="form-group">
                        <label for="ds_processo">Descrição Processo:</label><br/>
                        <textarea rows="5" cols="128" name="ds_processo" placeholder="Descrição do Processo"> <?= isset($processo['ds_processo'])?$processo['ds_processo']:'' ?></textarea>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="form-group" align="center">
                    <a href="?c=processo" class="btn btn-danger">Cancelar</a>
                    <button type="submit" class="btn btn-success">Salvar</button>
                </div>
            </div>
        </form>
    </div>
</div>