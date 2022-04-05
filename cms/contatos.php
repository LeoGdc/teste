<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="stylesheet" href="./css/cms/header.css">
  <link rel="stylesheet" href="./css/cms/footer.css">
  <link rel="stylesheet" href="./css/cms/style.css">
  <link rel="stylesheet" href="./css/cms/main.css">
  <link rel="stylesheet" href="./css/cms/footer.css">
  <link rel="stylesheet" href="./css/tabela/style.css">

  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CMS</title>
</head>
<body>
    <header>
      <div class="left-header-cms">
        <div>
          <span>CMS</span>
          <p>Cafeteria bossCoffee</p>
        </div>
          <span>Gerenciamento de conteúdo do site</span>
      </div>
      <div class="right-header-cms">
          <img src="../img/graoCafe.png"/>
      </div>
    </header>
    <main>
      <section>
        <div class="title-section">
          <p>Bem vindo <span>Nome usuário</span></p>
        </div>
        <section class="options-group">
          <div class="options">
            <div class="option">
              <img src="./img/carrinho.png">
              <p>Adm. de produtos</p>
            </div>
            <div class="option">
              <img src="./img/carrinho.png">
              <p>Adm. de categorias</p>
            </div>
            <div class="option">
              <img src="./img/carrinho.png"> 
              <p>Contatos</p>
            </div>
            <div class="option">
              <img src="./img/carrinho.png">
              <p>Usuários</p>
            </div>
            <div class="option">
              <img src="./img/carrinho.png">
              <p>Logout</p>
            </div>
          </div>
        </section>
      </section>
      <div id="consultaDeDados">
            <table id="tblConsulta" >
                <tr>
                    <td id="tblTitulo" colspan="6">
                        <h1> Consulta de Dados.</h1>
                    </td>
                </tr>
                <tr id="tblLinhas">
                    <td class="tblColunas destaque"> Nome </td>
                    <td class="tblColunas destaque"> Celular </td>
                    <td class="tblColunas destaque"> Email </td>
                    <td class="tblColunas destaque"> Opções </td>
                </tr>
                
               <?php
                    require_once('./controller/controllerContatos.php');
                    $listContato = listarContato();

                    foreach($listContato as $item)
                    {

               ?>
                <tr id="tblLinhas">
                    <td class="tblColunas registros"><?= $item['nome']?></td>
                    <td class="tblColunas registros"><?= $item['celular']?></td>
                    <td class="tblColunas registros"><?= $item['email']?></td>
                   
                    <td class="tblColunas registros">

                            <a>
                                <img src="img/edit.png" alt="Editar" title="Editar" class="editar">
                            </a>

                            <a>
                                <img src="img/trash.png" alt="Excluir" title="Excluir" class="excluir">
                            </a>

                            <img src="img/search.png" alt="Visualizar" title="Visualizar" class="pesquisar">
                    </td>
                </tr>

                <?php
                 }
                ?>

            </table>
        </div>
    </main>
    <footer>

    </footer>
</body>
</html>