<?php
include("header.php");
require 'Classes/Connect.php';
require 'Classes/Produtos.php';
require 'Classes/Categoria.php';

$nome = filter_input(INPUT_POST, "nome");
$preco = filter_input(INPUT_POST, "preco");
$categoria_id = filter_input(INPUT_POST, "categoria");
$categorias = new Categoria(); //Instanciando a classe categoria
$cats = $categorias->listar(); //chamando o Método para chamar as categorias
if (!empty($nome && $preco)) {
    $prod = new Produtos(); // Instanciando a classe Produtos
    $cadastro = $prod->cadastrar($categoria_id, $nome, $preco); //Chamando o Método para cadastrar os produtos no DB
    if ($cadastro) {
        header("Location: index.php");
    } else {
        echo "<script>alert('Produto não cadastrado')</script>";
    }
}
?>
<form name="produtos" method="POST" class="form-control">
    <label class="form-label">Nome do produto: </label>
    <input type="text" name="nome" class="form-control" required>

    <label class="form-label">Preço: </label>
    <input type="text" name="preco" class="form-control" required>

    <label class="form-label">Categoria: </label>
    <select name="categoria" class="form-select">
        <option selected>Escolha uma categoria</option>
        <?php
        foreach ($cats as $cat) {
            echo '<option value=' . $cat['id'] . '>' . $cat['titulo'] . '</option>';
        }
        ?>
    </select>
    <br>
    <input type="submit" value="Cadastrar" name="submit" class="btn btn-secondary">
    <a href="index.php" class="btn btn-primary">Listar</a>


</form>
</div><!-- /container   -->
</body>

</html>