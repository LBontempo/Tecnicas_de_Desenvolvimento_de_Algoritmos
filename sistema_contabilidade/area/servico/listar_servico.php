<h1 class="titulo-crud">Listar Serviços</h1>
<?php
$sql = "SELECT * FROM servico";
$res = $conn->query($sql);

if(!$res){
    echo "<p>Erro na consulta: {$conn->error}</p>";
    echo "<p>Query executada: $sql</p>";
} else {
    $qtd = $res->num_rows;

    if($qtd > 0){
        echo "<p>Encontrou <b>$qtd</b> resultado(s)</p>";
        echo "<table class='table table-hover table-striped table-bordered'>";
        echo "<tr>
                <th>#</th>
                <th>Departamento</th>
                <th>Assunto</th>
                <th>Descrição</th>
                <th>Expectativa</th>
                <th>Ações</th>
              </tr>";

        while($row = $res->fetch_object()){
            echo "<tr>";
            echo "<td>{$row->id_servico}</td>";
            echo "<td>{$row->departamento_servico}</td>";
            echo "<td>" . ($row->assunto_servico ?? '-') . "</td>";
            echo "<td>{$row->descricao_servico}</td>";
            echo "<td>" . ($row->expectativa_servico ? date('d/m/Y', strtotime($row->expectativa_servico)) : '-') . "</td>";
            echo "<td>
                    <button onclick=\"location.href='?page=editar_servico&id_servico={$row->id_servico}';\" class='btn btn-success'>Editar</button>
                    <button onclick=\"if(confirm('Tem certeza que deseja excluir?')){location.href='?page=salvar_servico&acao=excluir&id_servico={$row->id_servico}';}else{false;}\" class='btn btn-danger'>Excluir</button>
                  </td>";
            echo "</tr>";
        }
        echo "</table>";

    } else {
        echo "<p>Não encontrou resultado</p>";
    }
}
?>
