<?php
class Produtos extends Connect
{
    public int $id;
    public string $categoria_id;
    public string $nome;
    public string $preco;
    public object $connect;


    public function listar(): array //Método para listar todos os produtos
    {
        $this->connect = $this->connect();
        $query = "SELECT p.id, p.nome, c.titulo, p.preco FROM produtos p join categorias c on c.id = p.categoria_id";
        $result = $this->connect->prepare($query);
        $result->execute();
        $retorno = $result->fetchAll();
        return $retorno;
    }

    public function cadastrar(string $categoria_id, string $nome, string $preco): bool // Método para cadastrar novos produtos
    {
        $this->connect = $this->connect();
        $query = "INSERT INTO produtos (categoria_id, nome, preco) values ('$categoria_id', '$nome', '$preco');";
        $result = $this->connect->prepare($query);

        $result->execute();
        if ($result->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }
    public function getId(int $id): array // Método para pegar um produto por ID
    {
        $usuario = [];
        $this->connect = $this->connect();
        $query = $this->connect->prepare("SELECT * FROM produtos WHERE id = :id");
        $query->bindValue(':id', $id);
        $query->execute();

        if ($query->rowCount() > 0) {
            $usuario = $query->fetch(PDO::FETCH_ASSOC);
            return $usuario;
        } else {
            die();
        }
    }
    public function editar($categoria_id, $nome, $preco): bool //Método para editar um produto
    {
        $this->connect = $this->connect();
        $id = filter_input(INPUT_POST, 'id');
        $categoria_id = filter_input(INPUT_POST, 'categoria');
        $nome = filter_input(INPUT_POST, 'nome');
        $preco = filter_input(INPUT_POST, 'preco');
        $query = $this->connect->prepare('UPDATE produtos SET categoria_id = :categoria_id, nome = :nome, preco = :preco WHERE produtos.id = :id');
        $query->bindValue(':categoria_id', $categoria_id);
        $query->bindValue(':nome', $nome);
        $query->bindValue(':preco', $preco);
        $query->bindValue(':id', $id);
        $query->execute();
        if ($query->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }
    public function delete($id): bool //Método para apagar um produto
    {
        $this->connect = $this->connect();
        $query = $this->connect->prepare("DELETE FROM produtos WHERE id = :id");
        $query->bindValue(':id', $id);
        $query->execute();
        if ($query->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }
}
