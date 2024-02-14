<?php
include("header.php");
require 'Classes/Connect.php';
require 'Classes/Produtos.php';
require 'Classes/Categoria.php';
?>
<h1 class="text-center">
    Lista de Produtos
</h1>
<table class="table table-hover table-bordered table-striped">
    <?php
    $produtos = new Produtos();
    $list = $produtos->listar();

    echo "<tr>";
    echo "<th>#</th>";
    echo "<th>Nome</th>";
    echo "<th>Categoria</th>";
    echo "<th>Preço</th>";
    echo "<th>Ação</th>";
    echo "</tr>";
    foreach ($list as $produto) { //For each para percorrer todos os itens da tabela produtos
        echo "<tr>";
        echo "<td>" . $produto['id'] . '</td>';
        echo "<td>" . $produto['nome'] . '</td>';
        echo "<td>" . $produto['titulo'] . '</td>';
        echo "<td> R$ " . number_format($produto['preco'], 2, ",", ".") . '</td>';
        echo "<td> " . '<a href="edit.php?id=' . $produto['id'] . '" class="btn btn-success">Editar </a> ';
        echo '<a href="delet.php?id=' . $produto['id'] . '" class="btn btn-danger">Excluir    </a> </td>';
        echo "</tr>";
    }
    ?>
</table>

<a href="cadastrar.php" class="btn btn-secondary">Cadastrar</a>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>