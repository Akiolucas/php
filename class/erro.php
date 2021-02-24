<?php
class Erro
{
 public function descricao($erro){
    echo "<h3>Erro de escrita</h3>";
    echo "<h4>Mensagem: ".  $erro->getMessage()."</h4>";
    echo "<h4>Linha: ".     $erro->getLine()."</h4>";
    echo "<h4>Arquivo: ".   $erro->getFile(). "</h4>";
    echo "<h4>Código: ".    $erro->getCode()."</h4>";
 }

 public function arquivoLog($exception){

    $fusoHorario = new DateTimeZone('America/Sao_Paulo');
    $dataHora_atual = new DateTime('now', $fusoHorario);

    $pasta= "log";
    $arquivoTxt= "log.txt";

    //textos
    $mensagem= "\t Mensagem: ". $exception->getMessage();
    $linha= "\t na linha: ". $exception->getLine();
    $arquivo= "\t no arquivo: ". $exception->getFile();
    $codigo= "\t Código: ". $exception->getCode(). "\t\r\n";

    if(!is_dir($pasta)){
        mkdir($pasta); // criar a pasta.
    }
    $criar = fopen($pasta."/".$arquivoTxt,"a+"); // criar o arquivo caso ele não exista e adicionar ponteiro no final do conteúdo.

    fwrite($criar, $dataHora_atual->format("d/m/Y H:i:s") . $mensagem. $linha. $arquivo. $codigo); // escrever dentro do arquivo.
            
            //  liberar da memoria fechar o arquivo.
    fclose($criar);

    echo "<h3>Código: ". $exception->getCode(). "</h3>";
    include_once "../view/erro.php";
    
    
 }
}

?>