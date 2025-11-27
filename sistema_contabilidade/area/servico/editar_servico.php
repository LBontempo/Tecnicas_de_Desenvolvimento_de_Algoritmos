<h1>Editar Serviço</h1>
<?php
$id = (int)$_GET['id_servico'];

$sql = "SELECT * FROM servico WHERE id_servico = {$id}";
$res = $conn->query($sql);

if($res->num_rows > 0){
    $row = $res->fetch_object();
} else {
    echo "<p>Serviço não encontrado!</p>";
    exit;
}
?>

<form action="?page=salvar_servico" method="POST">

    <input type="hidden" name="acao" value="editar">
    <input type="hidden" name="id_servico" value="<?php echo $row->id_servico; ?>">

    <div class="mb-3" col-md-4>
        <label for="departamento_servico">Departamento</label>
        <select name="departamento_servico" id="departamento_servico" class="form-control" required>
            <option value="">-- Selecione o Departamento --</option>
            <option value="Contabil" <?= ($row->departamento_servico == 'Contabil') ? 'selected' : '' ?>>Contábil</option>
            <option value="Fiscal" <?= ($row->departamento_servico == 'Fiscal') ? 'selected' : '' ?>>Fiscal</option>
            <option value="Pessoal" <?= ($row->departamento_servico == 'Pessoal') ? 'selected' : '' ?>>Pessoal</option>
            <option value="Condominio" <?= ($row->departamento_servico == 'Condominio') ? 'selected' : '' ?>>Condomínio</option>
            <option value="Regularizacao_Empresas" <?= ($row->departamento_servico == 'Regularizacao_Empresas') ? 'selected' : '' ?>>Regularização de Empresas</option>
            <option value="Imposto_Renda" <?= ($row->departamento_servico == 'Imposto_Renda') ? 'selected' : '' ?>>Imposto de Renda</option>
            <option value="Outros" <?= ($row->departamento_servico == 'Outros') ? 'selected' : '' ?>>Outros</option>
        </select>
    </div>

    <div class="mb-3">
        <label>Assunto
            <input type="text" name="assunto_servico" class="form-control" 
                   value="<?php echo $row->assunto_servico; ?>">
        </label>
    </div>

    <div class="mb-3">
        <label>Descrição
            <textarea name="descricao_servico" style="width:1300px; height:150px" rows="5" class="form-control" required><?php echo $row->descricao_servico; ?></textarea>
        </label>
    </div>

    <div class="mb-3">
        <label>Expectativa de Conclusão
            <input type="date" name="expectativa_servico" class="form-control" 
                value="<?php echo $row->expectativa_servico; ?>">
        </label>
    </div>

    <div class="mb-3">
        <button type="submit" class="btn btn-primary">Salvar Alterações</button>
    </div>

</form>
