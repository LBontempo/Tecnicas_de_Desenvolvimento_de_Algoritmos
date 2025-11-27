<h1>Salvar Cargo</h1>

<?php
switch ($_REQUEST['acao']) {

    case 'cadastrar':
        $nome = $_POST['nome_cargo'];
        $sql = "INSERT INTO cargo (nome_cargo) VALUES ('{$nome}')";
        $res = $conn->query($sql);

        if($res){
            echo "<script>alert('Cargo cadastrado com sucesso');</script>";
            echo "<script>location.href='?page=listar_cargo';</script>";
        } else {
            echo "<script>alert('Erro: {$conn->error}');</script>";
        }
    break;

    case 'editar':
        $id = $_POST['id_cargo'];
        $nome = $_POST['nome_cargo'];
        $sql = "UPDATE cargo SET nome_cargo='{$nome}' WHERE id_cargo={$id}";
        $res = $conn->query($sql);

        if($res){
            echo "<script>alert('Cargo atualizado com sucesso');</script>";
            echo "<script>location.href='?page=listar_cargo';</script>";
        } else {
            echo "<script>alert('Erro: {$conn->error}');</script>";
        }
    break;

    case 'excluir':
        $id = $_REQUEST['id_cargo'];
        $sql = "DELETE FROM cargo WHERE id_cargo={$id}";
        $res = $conn->query($sql);

        if($res){
            echo "<script>alert('Cargo excluído com sucesso');</script>";
            echo "<script>location.href='?page=listar_cargo';</script>";
        } else {
            echo "<script>alert('Erro: {$conn->error}');</script>";
        }
    break;
}
?>