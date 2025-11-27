<h1 class="titulo-crud">Editar Cargo</h1>

<?php
$id = $_GET['id_cargo'];
$sql = "SELECT * FROM cargo WHERE id_cargo={$id}";
$res = $conn->query($sql);
$row = $res->fetch_assoc();
?>

<h1>Editar Cargo</h1>

<form action="?page=salvar_cargo" method="POST">
    <input type="hidden" name="acao" value="editar">
    <input type="hidden" name="id_cargo" value="<?php echo $row['id_cargo']; ?>">

    <div class="mb-3">
        <label>Nome do Cargo
            <input type="text" name="nome_cargo" class="form-control" value="<?php echo $row['nome_cargo']; ?>" required>
        </label>
    </div>

    <div class="mb-3">
        <button type="submit" class="btn btn-primary">Atualizar</button>
    </div>
</form>
