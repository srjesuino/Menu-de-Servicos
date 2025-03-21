<?php
// Define a classe Login
class Login
{
    // Propriedade privada para armazenar a conexão SOAP
    private $conn;

    // Método construtor da classe
    public function __construct()
    {
        try {
            // Tenta estabelecer uma conexão com o serviço SOAP via WSDL
            $this->conn = new SoapClient("http://192.168.10.194:8180/ws0201/MADWS001.apw?WSDL");
        } catch (Exception $e) {
            // Encerra a execução e exibe mensagem de erro se a conexão falhar
            die("Erro ao conectar ao serviço: " . $e->getMessage());
        }
    }

    // Método para validar um usuário
    public function validaUsuario($username, $password)
    {
        try {
            // Chama o método VALIDAUSUARIO do serviço SOAP com os parâmetros username e password
            $result = $this->conn->VALIDAUSUARIO(array("CUSUARIO" => $username, "CSENHA" => $password));
            // Extrai o ID (cid) do resultado retornado pelo serviço
            $cid = $result->VALIDAUSUARIORESULT->AUSUARIO->OWUSUARIO->CID;
            // Extrai o nome do usuário do resultado retornado pelo serviço
            $nome = $result->VALIDAUSUARIORESULT->AUSUARIO->OWUSUARIO->CNOME;
            // Retorna um array com o nome e o cid do usuário
            return [
                'nome' => $nome,
                'cid' => $cid
            ];
        } catch (Exception $e) {
            // Retorna false se ocorrer uma exceção durante a validação
            return false;
        }
    }
}
?>