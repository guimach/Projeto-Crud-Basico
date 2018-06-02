<?php
include_once("inc/utils.php");
var_dump($_POST);
$conn = getConnection();

if($conn && $_POST){
    $removed = removeProduct($conn, $_POST['id']);
    if($removed){
        header("Location: lista.php?action=remove&message=success");
    }else {
        header("Location: lista.php?action=remove&message=failed");
    }
}
