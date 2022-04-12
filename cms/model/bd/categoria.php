<?php
  require_once("conexaomysql.php");

  function insertCategoria($dadosCategoria){

     $conexao = conexaoMysql();

     $sql = "insert into tblcategoria
            (categoria)
            values(
         '".$dadosCategoria["categoria"]."');";  
    
    if (mysqli_query($conexao, $sql)){
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

  function selectAllCategorias(){
    $conexao = conexaoMysql();
    $sql = "select * from tblcategoria order by idcategoria desc";
    $result = mysqli_query($conexao, $sql);

    if($result)
    {
      $cont =0;
      while($rsDados = mysqli_fetch_assoc($result))
      {
        $arrayDados[$cont] = array(
          "id"        => $rsDados["idcategoria"],
          "categoria"      => $rsDados["categoria"],
        );
        $cont++;
      }   
        
        fecharConexaoMysql($conexao);

        return $arrayDados;
    }
  }

  function deleteCategoria($id){

    $conexao = conexaoMysql();

    $sql = "delete from tblcategoria where idcategoria =".$id;

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

  function updateCategoria($dadosCategoria){
    $conexao = conexaoMysql();

    $sql = "update tblcategoria set 
            categoria = '".$dadosCategoria["categoria"] ."';";  

    if (mysqli_query($conexao, $sql))
      {

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

  function selectByidCategoria($id){
    $conexao = conexaoMysql();
    $sql = "select * from tblcategoria where idcategoria = ".$id;
    $result = mysqli_query($conexao, $sql);

    if($result){
      if($rsDados = mysqli_fetch_assoc($result)){
        $arrayDados = array(
          "id"        => $rsDados["idcategoria"],
          "categoria" => $rsDados["categoria"]
        );
    }
    fecharConexaoMysql($conexao);
    return $arrayDados;
    }
  }
?>