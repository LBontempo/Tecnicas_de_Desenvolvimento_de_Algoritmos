<h1 class="titulo-crud">Listar Cargos</h1>
<?php
$sql = "SELECT * FROM cargo";
$res = $conn->query($sql);
$qtd = $res->num_rows;

if($qtd > 0){
    print "<p>Encontrou <b>$qtd</b> resultado(s)</p>";
    print "<table class='table table-hover table-striped table-bordered'>";
    print "<tr>";
    print "<th>#</th>";
    print "<th>Nome do Cargo</th>";
    print "<th>Ações</th>";
    print "</tr>";

    while($row = $res->fetch_object()){
        print "<tr>";
        print "<td>".$row->id_cargo."</td>";
        print "<td>".$row->nome_cargo."</td>";
        print "<td>
            <button onclick=\"location.href='?page=editar_cargo&id_cargo=".$row->id_cargo."';\" class='btn btn-success'>Editar</button>
            <button onclick=\"if(confirm('Tem certeza que deseja excluir?')){location.href='?page=salvar_cargo&acao=excluir&id_cargo=".$row->id_cargo."';}else{false;}\" class='btn btn-danger'>Excluir</button>
        </td>";
        print "</tr>";
    }
    print "</table>";
} else {
    print "<p>Não encontrou resultado</p>";
}
?>