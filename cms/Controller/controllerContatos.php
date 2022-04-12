<?php

     function excluirContato($id)
     {

        if($id != 0 &&  !empty($id) && is_numeric($id))
        {   

            require_once("model/bd/contato.php");

            if(deleteContato($id))
            {
                return true;
            }else
            {
                return array('idErro' => 3,
                'message' => "O banco não pode excluir o registro.");
            }
        }else
        {
            return array('idErro' => 4,
                         'message' => "Não é possivel excluir o registro sem informar um id valido.");
        }
     }
     
     
      function listarContato()
      {
        require_once("model/bd/contato.php");

        $dados = selectAllContato();

        if(!empty($dados))
        {
            return $dados;
        }else
        {
            return false;
        }

      }    
?>