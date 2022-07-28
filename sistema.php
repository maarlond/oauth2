<?php
session_start();
require_once 'classes/conexaobd-class.php';

    if(isset($_SESSION) && !empty($_SESSION)){

        $sql = $pdo->prepare("SELECT * FROM organizacao WHERE nome = :nome");
        $sql->bindValue(':nome', $_SESSION['sessaoauth']['soe:organizacao']);
        $sql->execute();
        $returnOrg[] = $sql->fetchAll(PDO::FETCH_ASSOC);

        $sql = $pdo->prepare("SELECT * FROM usuario WHERE nome = :nome AND matricula = :matricula AND  fk_organizacao = :cod_organizacao_soe");
        $sql->bindValue(':nome', $_SESSION['sessaoauth']['name'] );
        $sql->bindValue(':matricula', $_SESSION['sessaoauth']['soe:matricula']);
        $sql->bindValue(':cod_organizacao_soe', $_SESSION['sessaoauth']['soe:codOrganizacao']);
        $sql->execute();
        $returnUser = $sql->fetchAll(PDO::FETCH_ASSOC);

        //Faz o insert da organização ou atualiza a Organização
        if(empty($returnOrg[0])){
            try{
                $sql = $pdo->prepare("INSERT INTO organizacao (cod_organizacao_soe, nome, tem_acesso ) VALUES (:cod_organizacao_soe, :name, :tem_acesso)");
                $sql->bindValue(':cod_organizacao_soe', $_SESSION['sessaoauth']['soe:codOrganizacao']);
                $sql->bindValue(':name', $_SESSION['sessaoauth']['soe:organizacao']);
                $sql->bindValue(':tem_acesso', NULL);
                $return[] = $sql->execute();

            }catch(PDOException $e){
                echo $e->getMessage()."<br>";
            }
        }
        // Quando já existe uma Sigla cadastrada aqui somente é criado o vinculo do codigo SOEWEB
        else if(empty($returnOrg[0][0]['cod_organizacao_soe'])){
            try{
                $sql = $pdo->prepare("UPDATE organizacao SET cod_organizacao_soe = :cod_organizacao_soe WHERE nome = :name ");
                $sql->bindValue(':cod_organizacao_soe', $_SESSION['sessaoauth']['soe:codOrganizacao']);
                $sql->bindValue(':name', $_SESSION['sessaoauth']['soe:organizacao']);

                $return[] = $sql->execute();

            }catch(PDOException $e){
                echo $e->getMessage()."<br>";
            }
        }
        //Faz o insert do usuario
        if(empty($returnUser)){
            try{
                $sql = $pdo->prepare("INSERT INTO usuario (matricula, nome, fk_organizacao, data_ultimo_login ) VALUES (:matricula, :nome, :fk_organizacao, NOW() )");
                $sql->bindValue(':matricula', $_SESSION['sessaoauth']['soe:matricula']);
                $sql->bindValue(':nome', $_SESSION['sessaoauth']['name'] );
                $sql->bindValue(':fk_organizacao',$_SESSION['sessaoauth']['soe:codOrganizacao']);
                $return[] = $sql->execute();

            }catch(PDOException $e){
                echo $e->getMessage();
            }
        }
        //Faz o update do horario de login
        else {
            try{
                $sql = $pdo->prepare("UPDATE usuario SET data_ultimo_login = NOW() WHERE nome = :nome AND matricula = :matricula ");
                $sql->bindValue(':nome', $_SESSION['sessaoauth']['name'] );
                $sql->bindValue(':matricula', $_SESSION['sessaoauth']['soe:matricula']);
                $return[] = $sql->execute();

            }catch(PDOException $e){
                echo $e->getMessage();
            }
        }

        redirecionaSistema($_SESSION['sistema']);
    }
    function redirecionaSistema($sistema){
        switch($sistema){
            case "reservas":
                header("Location:../reservas/dist/index.php");
            break;
            case "adi":
                header("Location:../adi/index.php");
            break;
            default:
                header("Location:../oauth2/intermediaria.php");
            break;
        }

    }