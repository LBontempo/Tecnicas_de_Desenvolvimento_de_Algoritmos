<h1 class="titulo-crud">Salvar Férias</h1>

<?php
switch ($_REQUEST['acao']) {

    case 'cadastrar':
        $periodo   = $_POST['periodo_aquisitivo'];
        $inicio    = $_POST['data_inicio_ferias'];
        $quantidade = (int)$_POST['quantidade_ferias'];
        $funcionario = (int)$_POST['funcionario_id_funcionario'];

        $sql = "INSERT INTO ferias
                    (periodo_aquisitivo, data_inicio_ferias, quantidade_ferias, funcionario_id_funcionario)
                VALUES
                    ('{$periodo}', '{$inicio}', {$quantidade}, {$funcionario})";

        $res = $conn->query($sql);

        if($res){
            echo "<p>Férias cadastradas com sucesso!</p>";
        } else {
            echo "<p>Erro ao cadastrar: {$conn->error}</p>";
            echo "<p>Query executada: $sql</p>";
        }
    break;

    case 'editar':
        $id         = (int)$_POST['id_ferias'];
        $periodo    = $_POST['periodo_aquisitivo'];
        $inicio     = $_POST['data_inicio_ferias'];
        $quantidade = (int)$_POST['quantidade_ferias'];
        $funcionario = (int)$_POST['funcionario_id_funcionario'];

        $sql = "UPDATE ferias SET
                    periodo_aquisitivo='{$periodo}',
                    data_inicio_ferias='{$inicio}',
                    quantidade_ferias={$quantidade},
                    funcionario_id_funcionario={$funcionario}
                WHERE id_ferias={$id}";

        $res = $conn->query($sql);

        if($res){
            echo "<script>alert('Férias editadas com sucesso');</script>";
            echo "<script>location.href='?page=listar_ferias';</script>";
        } else {
            echo "<p>Erro ao editar: {$conn->error}</p>";
            echo "<p>Query executada: $sql</p>";
        }
    break;

    case 'excluir':
        $id = (int)$_REQUEST['id_ferias'];

        $sql = "DELETE FROM ferias WHERE id_ferias={$id}";
        $res = $conn->query($sql);

        if($res){
            echo "<script>alert('Férias excluídas com sucesso');</script>";
            echo "<script>location.href='?page=listar_ferias';</script>";
        } else {
            echo "<p>Erro ao excluir: {$conn->error}</p>";
            echo "<p>Query executada: $sql</p>";
        }
    break;
}
?>

