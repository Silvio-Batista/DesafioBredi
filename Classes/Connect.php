<?php 
abstract class Connect{
    //Instancia e conecta o banco de dados com a aplicação (apenas classes filhas podem acessar)
    private static string $db = "mysql";
    private static string $host = "localhost";
    private static string $user = "root";
    private static string $password = "";
    private static string $dbname = "desafiobredi";
    private static string $port = "3306";
    private static object $connect;

    public  function connect (){ //Método para usar a conexão
        try{
            self::$connect = new PDO(self::$db . ':host=' . self::$host . ';port=' . self::$port . ';dbname=' . self::$dbname, self::$user, self::$password);
            return self::$connect;
        }
        catch (PDOException $e){
            die("Error: ". $e->getMessage());
        }
    } 
}


?>