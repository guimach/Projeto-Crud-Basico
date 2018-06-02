<?php
  #include_once("utils.php");
?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Projeto CRUD</a>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
        <li class="nav-item <?= navActive($page, "LISTA")?>">
            <a class="nav-link" href="lista.php">Listagem <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item <?= navActive($page, "CADASTRO")?>">
            <a class="nav-link" href="cadastro.php">Cadastro</a>
        </li>
        <!-- <li class="nav-item <?= navActive($page, "EDITAR")?>">
            <a class="nav-link" href="editar.php">Editar</a>
        </li> -->
        </ul>
        <form class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
    </div>
    </nav>