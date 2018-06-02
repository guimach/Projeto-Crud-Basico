<?php
    include("inc/utils.php");
    $page = "LISTA";
    $conn = getConn();
    #var_dump($conn);
    

    if($conn) {
      $result = getProducts($conn);
      #var_dump( mysqli_fetch_assoc($result));
    }
?>

<!doctype html>
<html lang="en">
  <head>
    <?php include("inc/header.php"); ?>
    <title>Projeto CRUD - Listagem</title>
  </head>
  <body>
    <?php include("inc/navbar.php"); ?>

    <div class="container">
      <br>
      <?php include_once("inc/alerts.php");?>
      <table class="table table-hover">
    <thead class="thead-dark">
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nome</th>
        <th scope="col">Quantidade</th>
        <th scope="col">Preco</th>
        <th scope="col">Categoria</th>
        <th scope="col">Ações</th>
      </tr>
    </thead>
    <tbody>
      <?php while($prod = mysqli_fetch_assoc($result)): ?>
      <tr>
        <th scope="row"><?=$prod["id"]?></th>
        <td><?=$prod["nome_produto"]?></td>
        <td><?=$prod["quant"]?></td>
        <td><?=$prod["preco"]?></td>
        <td><?=$prod['nome_categoria']?></td>
        <td>
          <!-- <a href="editar.php">Editar</a> | -->
          <form action="editar.php" method="GET">
            <input type="hidden" name="id" value="<?= $prod["id"] ?>">
            <input type="hidden" name="message">
            <button type="submit" class="btn btn-info">Editar</button>
          </form>

          <!-- <a href="excluir.php?id=<?=$prod["id"]?>">Excluir</a> -->
          <form action="excluir.php" method="POST">
            <input type="hidden" name="id" value="<?= $prod["id"] ?>">
            <button type="submit" class="btn btn-danger">Excluir</button>
          </form>

        </td>
      </tr>
    <?php endwhile; ?>

    </tbody>
  </table>
    </div>

  </body>
</html>