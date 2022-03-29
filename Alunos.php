<?php

include "conexao.php";

if (isset($_GET["codProd"])) {
    $codProd = $_GET["codProd"];
}
if (isset($_GET["descricao"])) {
    $descricao = $_GET["descricao"];
}
if (isset($_GET["valor"])) {
    $valor = $_GET["valor"];
}
if (isset($_GET["quant"])) {
    $quant = $_GET["quant"];
}
if (isset($_GET["formaPagto"])) {
    $formaPagto = $_GET["formaPagto"];
}
if (isset($_GET["botao"])) {
    $botao = $_GET["botao"];
}


function prazo($valor, $quant)
{

    $resultado = 1.075*$valor * $quant;
    return $resultado;
}

function vista($valor, $quant)
{
    $resultado = $valor * $quant;
    return  $resultado;
}

if ($formaPagto == "prazo") {

    $valorFinal = prazo($valor, $quant);

    try {
        $Comando = $conexao->prepare("INSERT INTO  produtos (codProd,descricao,valor,quant,formaPagto,valorFinal) VALUES (?,?,?,?,?,?)");
        $Comando->bindParam(1, $codProd);
        $Comando->bindParam(2, $descricao);
        $Comando->bindParam(3, $valor);
        $Comando->bindParam(4, $quant);
        $Comando->bindParam(5, $formaPagto);
        $Comando->bindParam(6, $valorFinal);

        if ($Comando->execute()) {
            if ($Comando->rowCount() > 0) {

                $codProd = null;
                $descricao = null;
                $nasc = null;
                $quant = null;
                $formaPagto = null;
                $valorFinal = null;

                $RetornoJSON = "sim";
            } else {
                $RetornoJSON = "deu merda";
            }
        }
    } catch (PDOException $erro) {
        $RetornoJSON = "erro" . $erro->getMessage();
    }
    echo $RetornoJSON;
}

if ($formaPagto == "vista") {

    $valorFinal = vista($valor, $quant);

    try {
        $Comando = $conexao->prepare("INSERT INTO  produtos (codProd,descricao,valor,quant,formaPagto,valorFinal) VALUES (?,?,?,?,?,?)");
        $Comando->bindParam(1, $codProd);
        $Comando->bindParam(2, $descricao);
        $Comando->bindParam(3, $valor);
        $Comando->bindParam(4, $quant);
        $Comando->bindParam(5, $formaPagto);
        $Comando->bindParam(6, $valorFinal);

        if ($Comando->execute()) {
            if ($Comando->rowCount() > 0) {

                $codProd = null;
                $descricao = null;
                $nasc = null;
                $quant = null;
                $formaPagto = null;
                $valorFinal = null;

                $RetornoJSON = "sim";
            } else {
                $RetornoJSON = "deu merda";
            }
        }
    } catch (PDOException $erro) {
        $RetornoJSON = "erro" . $erro->getMessage();
    }
    echo $RetornoJSON;
}




