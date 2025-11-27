<h1 class="titulo-crud">Editar Férias</h1>

<?php
$id = (int)$_GET['id_ferias'];

$sql = "SELECT * FROM ferias WHERE id_ferias = {$id}";
$res = $conn->query($sql);

if($res->num_rows > 0){
    $row = $res->fetch_object();
} else {
    echo "<p>Férias não encontrada!</p>";
    exit;
}
?>

<form action="?page=salvar_ferias" method="POST">

    <input type="hidden" name="acao" value="editar">
    <input type="hidden" name="id_ferias" value="<?php echo $row->id_ferias; ?>">

    <div class="mb-3">
        <label>Período Aquisitivo
            <input type="text" name="periodo_aquisitivo" class="form-control" 
                   value="<?php echo $row->periodo_aquisitivo; ?>" required>
        </label>
    </div>

    <div class="mb-3">
        <label>Data de Início
            <input type="date" name="data_inicio_ferias" class="form-control" 
                   value="<?php echo $row->data_inicio_ferias; ?>" required>
        </label>
    </div>

    <div class="mb-3">
        <label>Quantidade de Dias
            <input type="number" name="quantidade_ferias" class="form-control" 
                   value="<?php echo $row->quantidade_ferias; ?>" required>
        </label>
    </div>

    <div class="mb-3">
        <label>Funcionário
            <select name="funcionario_id_funcionario" class="form-control" required>
                <?php
                $res_func = $conn->query("SELECT * FROM funcionario ORDER BY nome_funcionario");
                while($f = $res_func->fetch_object()){
                    $selected = ($f->id_funcionario == $row->funcionario_id_funcionario) ? 'selected' : '';
                    echo "<option value='{$f->id_funcionario}' {$selected}>{$f->nome_funcionario}</option>";
                }
                ?>
            </select>
        </label>
    </div>

    <div class="mb-3">
        <button type="submit" class="btn btn-primary">Salvar Alterações</button>
    </div>

</form>