<?php

    require_once("conexaomysql.php");
    
    // função para listar todos os contatos do BD
    function selectAllContato()
    {
        // Abre a conexao com o banco
        $conexao = conexaoMysql();

        // script para listar todos os dados do BD
        $sql = "select * from tblcontatos order by idcontato desc";
        // essa linha executa o script no BD e garda o retorno dos dados 
        $result = mysqli_query($conexao, $sql);
        //valida se o BD retornou registros
        
        if($result)
        {
            //mysqli_fetch_assoc() - permite converter os dados do BD
            //em um array para manipular no PHP
            //Nesta repetição estamos, convertendo os dados do BD em um array ($result), além de
            //o proprio while conseguir gerenciar a qtde de vezes que deverá ser feita a repetição
            $cont =0;
            while($rsDados = mysqli_fetch_assoc($result))
            {
                $arrayDados[$cont] = array(
                    "id"        => $rsDados["idcontato"],
                    "nome"      => $rsDados["nome"],
                    "celular"   => $rsDados["celular"],
                    "email"     => $rsDados["email"],
                );
                $cont++;
            }   
            
            // solicita o fechamento da conexão com o BD
            fecharConexaoMysql($conexao);
            if(empty($arrayDados)){
                return false;
            }else{
                return $arrayDados;
            }
             
        }
    }


    // função para realizar o delete no BD
    function deleteContato($id)
    {
        // abre a conexão como BD
        $conexao = conexaoMysql();

        
        $sql = "delete from tblcontatos where idcontato =".$id;

       if(mysqli_query($conexao, $sql)){
            if(mysqli_affected_rows($conexao)){
                $statusResultado = true;
            }else{
                $statusResultado = false;
            }

        }else{
            $statusResultado = false;
        }

        fecharConexaoMysql($conexao);
        return $statusResultado;
    }
?>