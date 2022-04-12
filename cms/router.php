<?php
    $action     = (String) null;
    $component  = (String) null;

    if($_SERVER["REQUEST_METHOD"] == "POST" || $_SERVER["REQUEST_METHOD"] == "GET")
    {
        $component  = strtoupper($_GET["component"]);
        $action     = strtoupper($_GET["action"]);

        switch ($component)
        {
            case "CONTATOS";
            require_once("Controller/controllerContatos.php");

               if($action == "DELETAR")
                {

                    $idContato = $_GET["id"];

                    // chama a função de excluir na controller
                    $resposta = excluirContato($idContato);

                    if(is_bool($resposta))
                    {
                        if($resposta)
                        {
                            echo("<script>
                                    alert('Registro excluido com sucesso');
                                    window.location.href = 'contatos.php'; 
                                </script>");
                        }
                    }elseif(is_array($resposta))
                    {
                        echo("<script>
                                alert('".$resposta['message']."');
                                window.history.back(); 
                            </script>");
                    }
                }
                break;

            case "CATEGORIAS";
            
            require_once("Controller/controllerCategorias.php");
        }
    }
?>