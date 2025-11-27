<h1 class="titulo-crud">Listar Funcionários</h1>
<?php
$sql = "SELECT f.*, c.nome_cargo 
        FROM funcionario f
        LEFT JOIN cargo c ON f.cargo_id_cargo = c.id_cargo";
$res = $conn->query($sql);
$qtd = $res->num_rows;

if($qtd > 0){
    print "<p>Encontrou <b>$qtd</b> resultado(s)</p>";
    print "<table class='table table-hover table-striped table-bordered'>";
    print "<tr>";
    print "<th>#</th>";
    print "<th>Nome</th>";
    print "<th>Salário</th>";
    print "<th>Cargo</th>";
    print "<th>Ações</th>";
    print "</tr>";

    while($row = $res->fetch_object()){
        print "<tr>";
        print "<td>".$row->id_funcionario."</td>";
        print "<td>".$row->nome_funcionario."</td>";
        print "<td>R$ ".number_format($row->salario_funcionario, 2, ',', '.')."</td>";
        print "<td>".$row->nome_cargo."</td>";
        print "<td>
            <button onclick=\"location.href='?page=editar_funcionario&id_funcionario=".$row->id_funcionario."';\" class='btn btn-success'>Editar</button>
            <button onclick=\"if(confirm('Tem certeza que deseja excluir?')){location.href='?page=salvar_funcionario&acao=excluir&id_funcionario=".$row->id_funcionario."';}else{false;}\" class='btn btn-danger'>Excluir</button>
        </td>";
        print "</tr>";
    }
    print "</table>";
} else {
    print "<p>Não encontrou resultado</p>";
}
?>