<?php
    include("inc/utils.php");
    $page = "CADASTRO";
    $conn = getConn();

   if($conn && $_POST) {
        $added = addProduct ($conn, $_POST['nome'], $_POST['preco'], $_POST['quant'], $_POST['id_categoria']);
            
        if ( $added ){
            header("Location: lista.php?action=add&message=success");
        } else {
            header("Location: cadastro.php?action=add&message=failed");
        }
    }

    if ($conn){
        $categories = getCategories($conn);
        #var_dump($categories);
    }

?>


<!doctype html>
<html lang="en">
  <head>
    <?php include("inc/header.php"); ?>
    <title>Projeto CRUD - Cadastro</title>
  </head>
  <body>
    <?php include("inc/navbar.php"); ?>
    
    <div class="container">
        <?php include_once("inc/alerts.php");?>
        <form action="cadastro.php" method="POST">

            <div class="form-row">
            <!-- Produto -->
                <div class="form-group col-md-12">
                <label for="produto">Produto</label>
                <input type="texto" name="nome" class="form-control" id="produto" placeholder="Produto">
                </div>
            
            <!-- Quantidade -->
                <div class="form-group col-md-6">
                <label for="quantidade">Quantidade</label>
                <input type="quantidade" name="quant" class="form-control" id="quantidade" placeholder="Quantidade">
                </div>
            
            <!-- Preco -->
                <div class="form-group col-md-6">
                    <label for="preço">Preco</label>
                    <input type="text" name="preco" class="form-control" id="preco" placeholder="Preço">
                </div>
            </div>
            <?php while($categ = mysqli_fetch_assoc($categories)): #var_dump($categ); ?>
                <div class="form-check">
                        <input class="form-check-input" type="radio" 
                        name="id_categoria" id="categ_<?=$categ['id']?>" value="<?=$categ['id']?>" >
                        <label class="form-check-label" for="categ_<?=$categ['id']?>">
                        <?=$categ['nome'] ?>
                                    
                        </label>
                </div>
                    
             <?php endwhile; ?>
           
            <br>
                    
            <button type="submit" class="btn btn-primary">Cadastrar</button>
        </form>
    </div>

  </body>
</html>