<h1 class="titulo-crud">Editar Funcionário</h1>

<?php
    $id = (int) $_REQUEST['id_funcionario'];

    $sql = "SELECT * FROM funcionario WHERE id_funcionario = $id";
    $res = $conn->query($sql);

    if($res->num_rows > 0){
        $row = $res->fetch_object();
    } else {
        echo "<p>Funcionário não encontrado!</p>";
        exit;
    }
?>

<form action="?page=salvar_funcionario" method="POST">

    <input type="hidden" name="acao" value="editar">
    <input type="hidden" name="id_funcionario" value="<?php echo $row->id_funcionario; ?>">

    <div class="mb-3">
        <label>Nome
            <input type="text" name="nome_funcionario" 
                   value="<?php echo $row->nome_funcionario; ?>" 
                   class="form-control" required>
        </label>
    </div>

    <div class="mb-3">
        <label>Salário
            <input type="number" step="0.01" name="salario_funcionario"
                   value="<?php echo $row->salario_funcionario; ?>" 
                   class="form-control" required>
        </label>
    </div>

    <div class="mb-3">
        <label>Cargo
            <select name="cargo_id_cargo" class="form-control" required>
                <option value="">--Escolha um Cargo--</option>

                <?php
                // lista cargos disponíveis
                $cargos = $conn->query("SELECT * FROM cargo ORDER BY nome_cargo");

                while($c = $cargos->fetch_object()){
                    $selected = ($c->id_cargo == $row->cargo_id_cargo) ? "selected" : "";
                    echo "<option value='{$c->id_cargo}' $selected>{$c->nome_cargo}</option>";
                }
                ?>
            </select>
        </label>
    </div>

    <div class="mb-3">
        <button type="submit" class="btn btn-primary">Editar</button>
    </div>

</form>
