<h1 class="titulo-crud">Listar Férias</h1>

<?php
$sql = "SELECT f.*, func.nome_funcionario
        FROM ferias f
        LEFT JOIN funcionario func ON f.funcionario_id_funcionario = func.id_funcionario";
$res = $conn->query($sql);
$qtd = $res->num_rows;

if($qtd > 0){
    echo "<p>Encontrou <b>$qtd</b> resultado(s)</p>";
    echo "<table class='table table-hover table-striped table-bordered'>";
    echo "<tr>
            <th>#</th>
            <th>Período Aquisitivo</th>
            <th>Data Início</th>
            <th>Quantidade de Dias</th>
            <th>Funcionário</th>
            <th>Ações</th>
          </tr>";

    while($row = $res->fetch_object()){
        echo "<tr>
                <td>{$row->id_ferias}</td>
                <td>{$row->periodo_aquisitivo}</td>
                <td>{$row->data_inicio_ferias}</td>
                <td>{$row->quantidade_ferias}</td>
                <td>{$row->nome_funcionario}</td>
                <td>
                    <button onclick=\"location.href='?page=editar_ferias&id_ferias={$row->id_ferias}';\" class='btn btn-success'>Editar</button>
                    <button onclick=\"if(confirm('Tem certeza que deseja excluir?')){location.href='?page=salvar_ferias&acao=excluir&id_ferias={$row->id_ferias}';}else{false;}\" class='btn btn-danger'>Excluir</button>
                </td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "<p>Não encontrou resultado</p>";
}
?>