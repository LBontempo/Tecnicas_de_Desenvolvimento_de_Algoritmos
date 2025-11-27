<h1 class="titulo-crud">Cadastrar Serviço</h1>

<form action="?page=salvar_servico" method="POST">

    <input type="hidden" name="acao" value="cadastrar">

    <div class="mb-3" col-md-4>
    <label for="departamento_servico">Departamento</label>
    <select name="departamento_servico" id="departamento_servico" class="form-control" required>
        <option value="">-- Selecione o Departamento --</option>
        <option value="Contabil">Contábil</option>
        <option value="Fiscal">Fiscal</option>
        <option value="Pessoal">Pessoal</option>
        <option value="Condominio">Condomínio</option>
        <option value="Regularizacao_Empresas">Regularização de Empresas</option>
        <option value="Imposto_Renda">Imposto de Renda</option>
        <option value="Outros">Outros</option>
    </select>
</div>

    <div class="mb-3">
        <label>Assunto
            <input type="text" name="assunto_servico" class="form-control">
        </label>
    </div>

    <div class="mb-3">
        <label>Descrição
            <textarea name="descricao_servico" class="form-control" style="width:1300px; height:150px" rows="5" required></textarea>
        </label>
    </div>

    <div class="mb-3">
    <label>Expectativa de Conclusão
        <input type="date" name="expectativa_servico" class="form-control" 
               value="<?php echo isset($row) ? $row->expectativa_servico : ''; ?>">
    </label>
</div>

    <div class="mb-3">
        <button type="submit" class="btn btn-primary">Enviar</button>
    </div>

</form>