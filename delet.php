<?php
include("header.php");
require 'Classes/Connect.php';
require 'Classes/Produtos.php';
require 'Classes/Categoria.php';

$prod = new Produtos(); //Instancia a classe

$id = filter_input(INPUT_GET, 'id');
$deletar = $prod->delete($id); // Chama o método delete 
if ($deletar) {
    header('location: index.php');
} else {
    echo "<script>alert('Produto não excluido')</script>";
}
