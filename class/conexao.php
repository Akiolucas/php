<?php
class conexao
{
    private $dbname ="";
    private  $user = "";
    private $password = "";
    private $host= "";


    public function conectar(){
       try
       {
         $con = new PDO("mysql:host=$this->host;dbname=$this->dbname",$this->user,$this->password);
         $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $con;
       } 

       catch(PDOException $exception)
        {
            include "erro.php";
            $objeto = new Erro();
            $objeto->arquivoLog($exception); // adiciona detalhes sobre a exceção no arquivo.
        }
        catch(Error $e)
        {
            include "erro.php";
            $erro = new Erro();
            $erro->descricao($e); // exibe detalhes sobre o Erro.
        }

    
    }
}

?>