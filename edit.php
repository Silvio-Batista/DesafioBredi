<?php
include("header.php");
require 'Classes/Connect.php';
require 'Classes/Produtos.php';
require 'Classes/Categoria.php';

$prod = new Produtos();

$id = filter_input(INPUT_GET, 'id');
$categoria_id = filter_input(INPUT_POST, 'categoria');
$nome = filter_input(INPUT_POST, 'nome');
$preco = filter_input(INPUT_POST, 'preco');

$listId = $prod->getId($id);
$categoria = new Categoria();
$cats = $categoria->listar();

if ($listId) {
    $editar = $prod->editar($id, $categoria_id, $nome);
    if ($editar) {
        header("Location: index.php");
    }
}
?>
<h1 class="text-center">Editar Produto</h1>

<form method="post" class="form-control">

    <input type="hidden" name="id" value="<?= $listId['id'] ?>">

    <label class="form-label" for="Nome">Nome do Produto: </label>
    <input class="form-control" type="text" name="nome" value="<?= $listId['nome'] ?>"><br>

    <label class="form-label" for="preco">Preço do Produto: </label>
    <input class="form-control" type="text" name="preco" value="<?= number_format($listId['preco'], 2, ',', '.') ?>"><br>
    <label>Categoria: </label>
    <select name="categoria" class="form-select">
        <?php
        foreach ($cats as $cat) {
            echo '<option value=' . $cat['id'] . '>' . $cat['titulo'] . '</option>';
        }
        ?>

    </select> <br><br>
    <input type="submit" class="btn btn-success" value="Editar">
    <a href="index.php" class="btn btn-primary">Voltar</a>


</form>
</div><!-- /container   -->
</body>