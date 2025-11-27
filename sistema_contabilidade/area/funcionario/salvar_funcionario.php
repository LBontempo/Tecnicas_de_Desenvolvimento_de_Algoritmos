<h1 class="titulo-crud">Salvar Funcionários</h1>

<?php
switch ($_REQUEST['acao']) {

    case 'cadastrar':
        $nome    = $_POST['nome_funcionario'];
        $salario = number_format($_POST['salario_funcionario'], 2, '.', '');
        $cargo   = (int)$_POST['cargo_id_cargo'];

        $sql = "INSERT INTO funcionario 
                    (nome_funcionario, salario_funcionario, cargo_id_cargo)
                VALUES 
                    ('{$nome}', '{$salario}', {$cargo})";

        $res = $conn->query($sql);

        if($res){
            echo "<p>Cadastrado com sucesso!</p>";
        } else {
            echo "<p>Erro ao cadastrar: {$conn->error}</p>";
            echo "<p>Query executada: $sql</p>";
        }
    break;

    case 'editar':
        $id      = (int)$_POST['id_funcionario']; 
        $nome    = $_POST['nome_funcionario'];
        $salario = number_format($_POST['salario_funcionario'], 2, '.', '');
        $cargo   = (int)$_POST['cargo_id_cargo'];

        $sql = "UPDATE funcionario SET
                    nome_funcionario='{$nome}',
                    salario_funcionario='{$salario}',
                    cargo_id_cargo={$cargo}
                WHERE id_funcionario={$id}";

        $res = $conn->query($sql);

        if($res){
            echo "<script>alert('Editado com sucesso');</script>";
            echo "<script>location.href='?page=listar_funcionario';</script>";
        } else {
            echo "<script>alert('Erro ao editar: {$conn->error}');</script>";
            echo "<p>Query executada: $sql</p>";
        }
    break;

    case 'excluir':
        $id = (int)$_REQUEST['id_funcionario'];

        $sql = "DELETE FROM funcionario WHERE id_funcionario={$id}";
        $res = $conn->query($sql);

        if($res){
            echo "<script>alert('Excluído com sucesso');</script>";
            echo "<script>location.href='?page=listar_funcionario';</script>";
        } else {
            echo "<script>alert('Erro ao excluir: {$conn->error}');</script>";
            echo "<p>Query executada: $sql</p>";
        }
    break;
}
?>