<?php
include_once("inc/utils.php");
var_dump($_POST);
$conn = getConn();

if($conn && $_POST){
    $removed = removeProduct($conn, $_POST['id']);
    if($removed){
        header("Location: lista.php?action=remove&message=success");
    }else {
        header("Location: lista.php?action=remove&message=failed");
    }
}
