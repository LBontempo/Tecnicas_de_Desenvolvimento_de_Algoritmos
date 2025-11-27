<h1 class="titulo-crud">Cadastrar Cargo</h1>

<form action="?page=salvar_cargo" method="POST">
    <input type="hidden" name="acao" value="cadastrar">

    <div class="mb-3">
        <label>Nome do Cargo
            <input type="text" name="nome_cargo" class="form-control" required>
        </label>
    </div>

    <div class="mb-3">
        <button type="submit" class="btn btn-primary">Enviar</button>
    </div>
</form>
