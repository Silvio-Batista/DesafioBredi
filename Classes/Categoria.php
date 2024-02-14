<?php
class Categoria extends Connect
{
     public object $connect; //faz a conexão do banco de dados com a class Categoria
    public function listar():array //Lista todas caregorias
    {
        $this->connect = $this->connect();
        $query = "SELECT id, titulo FROM categorias";
        $result = $this->connect->prepare($query);
        $result->execute();
        $retorno = $result->fetchAll();
        return $retorno;
    }
}