<h1 class="titulo-crud">Cadastrar Férias</h1>

<form action="?page=salvar_ferias" method="POST">

    <input type="hidden" name="acao" value="cadastrar">

    <div class="mb-3">
        <label>Período Aquisitivo
            <input type="text" name="periodo_aquisitivo" class="form-control" required>
        </label>
    </div>

    <div class="mb-3">
        <label>Data de Início
            <input type="date" name="data_inicio_ferias" class="form-control" required>
        </label>
    </div>

    <div class="mb-3">
        <label>Quantidade de Dias
            <input type="number" name="quantidade_ferias" class="form-control" required>
        </label>
    </div>

    <div class="mb-3">
        <label>Funcionário
            <select name="funcionario_id_funcionario" class="form-control" required>
                <option value="">--Escolha um funcionario--</option>
                <?php
                $res = $conn->query("SELECT * FROM funcionario ORDER BY nome_funcionario");
                while($row = $res->fetch_object()){
                    echo "<option value='{$row->id_funcionario}'>{$row->nome_funcionario}</option>";
                }
                ?>
            </select>
        </label>
    </div>

    <div class="mb-3">
        <button type="submit" class="btn btn-primary">Enviar</button>
    </div>

</form>

