<h1 class="titulo-crud">Salvar Serviço</h1>

<?php
switch ($_REQUEST['acao']) {

    case 'cadastrar':
        $departamento = $_POST['departamento_servico'];
        $assunto      = !empty($_POST['assunto_servico']) ? $_POST['assunto_servico'] : NULL;
        $descricao    = $_POST['descricao_servico'];
        $expectativa  = $_POST['expectativa_servico'];

        $expectativa = !empty($expectativa) ? date('Y-m-d', strtotime($expectativa)) : NULL;

        $sql = "INSERT INTO servico 
                    (departamento_servico, assunto_servico, descricao_servico, expectativa_servico)
                VALUES
                    ('{$departamento}', " . ($assunto ? "'{$assunto}'" : "NULL") . ",
                     '{$descricao}', " . ($expectativa ? "'{$expectativa}'" : "NULL") . ")";

        $res = $conn->query($sql);

        if($res){
            echo "<p>Serviço cadastrado com sucesso!</p>";
            echo "<script>location.href='?page=listar_servico';</script>";
        } else {
            echo "<p>Erro ao cadastrar: {$conn->error}</p>";
            echo "<p>Query executada: $sql</p>";
        }
    break;

    case 'editar':
        $id           = (int)$_POST['id_servico'];
        $departamento = $_POST['departamento_servico'];
        $assunto      = !empty($_POST['assunto_servico']) ? $_POST['assunto_servico'] : NULL;
        $descricao    = $_POST['descricao_servico'];
        $expectativa  = $_POST['expectativa_servico'];

        $expectativa = !empty($expectativa) ? date('Y-m-d', strtotime($expectativa)) : NULL;

        $sql = "UPDATE servico SET
                    departamento_servico='{$departamento}',
                    assunto_servico=" . ($assunto ? "'{$assunto}'" : "NULL") . ",
                    descricao_servico='{$descricao}',
                    expectativa_servico=" . ($expectativa ? "'{$expectativa}'" : "NULL") . "
                WHERE id_servico={$id}";

        $res = $conn->query($sql);

        if($res){
            echo "<script>alert('Serviço editado com sucesso');</script>";
            echo "<script>location.href='?page=listar_servico';</script>";
        } else {
            echo "<p>Erro ao editar: {$conn->error}</p>";
            echo "<p>Query executada: $sql</p>";
        }
    break;

    case 'excluir':
        $id = (int)$_REQUEST['id_servico'];

        $sql = "DELETE FROM servico WHERE id_servico={$id}";
        $res = $conn->query($sql);

        if($res){
            echo "<script>alert('Serviço excluído com sucesso');</script>";
            echo "<script>location.href='?page=listar_servico';</script>";
        } else {
            echo "<p>Erro ao excluir: {$conn->error}</p>";
            echo "<p>Query executada: $sql</p>";
        }
    break;
}
?>