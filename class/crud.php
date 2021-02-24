<?php

class Crud{
    private $atributo;
    private $atributo2;
    private $atributo3;
    private $con;


    function __set($variavel,$valor){
        $this->$variavel = $valor;
    }

    function __get($variavel){
        return $this->$variavel;
    }

    function __construct(){
        try{
            include "conexao.php";
            $obj = new conexao();
            $this->con= $obj->conectar();
            
        }
        catch(Exception $exception)
        {
            include "erro.php";
            $objeto = new Erro();
            $objeto->arquivoLog($exception); // adiciona detalhes sobre a exceção no arquivo.
        }
        catch (Error $e) 
        {
            include "erro.php";
            $erro = new Erro();
            $erro->descricao($e); // exibe detalhes sobre o Erro.
        }
    }

    public function create()
    {
        try
        {
            $comando = "INSERT INTO tabela (nomeColuna,nomeColuna) VALUES (?,?)";
            $valores = array($this->atributo2,
                            $this->atributo3);

            $stmt = $this->con->prepare($comando);
            $stmt->execute($valores);
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

    public function read()
    {
        try
        {
            $comando = "SELECT * FROM tabela WHERE id= ?";
            $valor = array($this->atributo);
            $stmt = $this->con->prepare($comando);
            $stmt->execute($valor);
            $dados = $stmt->fetchAll();
            return $dados;
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

    public function update()
    {
        try
        {
            $comando = "UPDATE * FROM tabela WHERE id= ?";
            $valor = array($this->atributo);
            $stmt = $this->con->prepare($comando);
            $stmt->execute($valor);
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

    public function delete()
    {
        try
        {
            $comando = "DELETE * FROM tabela WHERE id= ?";
            $valor = array($this->atributo);
            $stmt = $this->con->prepare($comando);
            $stmt->execute($valor);
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