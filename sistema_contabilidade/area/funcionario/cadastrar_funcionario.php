<h1 class="titulo-crud">Cadastrar Funcionário</h1>

<form action="?page=salvar_funcionario" method="POST">
    
    <input type="hidden" name="acao" value="cadastrar">

    <div class="mb-3">
        <label>Nome
            <input type="text" name="nome_funcionario" class="form-control" required>
        </label>
    </div>

    <div class="mb-3">
        <label>Salário
            <input type="number" step="0.01" name="salario_funcionario" class="form-control" required>
        </label>
    </div>

    <div class="mb-3">
        <label>Cargo
            <select name="cargo_id_cargo" class="form-control" required>
                <option value="">--Escolha um Cargo--</option>
                <?php
                $res = $conn->query("SELECT * FROM cargo ORDER BY nome_cargo");
                while($row = $res->fetch_object()){
                    echo "<option value='{$row->id_cargo}'>{$row->nome_cargo}</option>";
                }
                ?>
            </select>
        </label>
    </div>

    <div class="mb-3">
        <button type="submit" class="btn btn-primary">Enviar</button>
    </div>

</form>