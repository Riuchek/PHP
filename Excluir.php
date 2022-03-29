<?php
include "conexao.php";
if(isset($_GET["codProd"])){$codProd=$_GET['codProd'];}
try{
            $comando = $conexao->prepare ("DELETE from produtos where codProd = ?");
            $comando->bindParam(1,$codProd);
             if ($comando -> execute())
            {
                if ($comando->rowCount() > 0)
                {
                    $codProd = null;
                    $retornoJSON = "Exclusão efetuada com sucesso!";
                }
                else{
                    $retornoJSON = "Erro ao tentar excluir produto!";
                }
            } 
    }
catch(PDOException $erro){
            $retornoJSON = "Erro: " . $erro -> getMessage();
        }
        echo $retornoJSON;
?>
