<?php
    function navActive($page, $key) {
            if ($page == $key){
                # echo "active";
                return "active";
            }
        }
    
    function getConn() {
    # Dados para conexão
    $host = "localhost";
    $username = "root";
    $passwd = "caelum";
    $dbname = "fp73";

    #Abrindo uma conexão com o DB
    return mysqli_connect($host, $username, $passwd, $dbname);
    // var_dump($conn);
    }

    function getProductById($conn, $id){
        $query = "SELECT * FROM produtos WHERE id={$id}";
        return mysqli_query($conn, $query);
    }

    function getProducts($conn) {
      $query = "SELECT 
      p.id,
      p.nome AS nome_produto,
      p.preco,
      p.quant,
      c.nome AS nome_categoria
      FROM
          produtos AS p
      INNER JOIN 
          categorias AS c
      ON
          (p.id_categoria =c.id);";
      $result = mysqli_query($conn, $query);
      return $result;
    }

    function getProduct($result){
        return mysqli_fetch_assoc($result);
    }

    function addProduct($conn, $nome, $preco, $quant, $idcateg){
        $query = "INSERT INTO produtos (nome, preco, quant, id_categoria) VALUES ('{$nome}', {$preco}, '{$quant}' , '{$idcateg}')";
        return mysqli_query($conn, $query);
    }

    function updateProduct($conn, $id, $nome, $quant, $preco){
        if($id && is_numeric($id)) {
            $query = "UPDATE produtos SET nome='{$nome}', quant='{$quant}', preco={$preco} WHERE id = '{$id}'";
            return mysqli_query($conn, $query);
        }
        return false;    
    }

    function removeProduct($conn, $id){
        if($id && is_numeric($id)){
            $query = "DELETE FROM produtos WHERE id={$id}";
            return mysqli_query($conn, $query);
        }
        return false;
    }
    function getCategories($conn){
        $query = "SELECT * FROM categorias";
        return mysqli_query($conn, $query);
    }


?>