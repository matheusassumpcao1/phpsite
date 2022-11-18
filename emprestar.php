<?php
include 'dbConfig.php';

$livro_selecionado = $_POST["id_livro"];

$stmt = mysqli_prepare($db, "UPDATE livros SET emprestado='1' WHERE id_livro=?");
$stmt2 = mysqli_prepare($db, "SELECT nome_livro FROM `livros` WHERE id_livro=?");

mysqli_stmt_bind_param($stmt,"i",$livro_selecionado);
mysqli_stmt_bind_param($stmt2,"i",$livro_selecionado);

mysqli_stmt_execute($stmt);
mysqli_stmt_execute($stmt2);

mysqli_stmt_bind_result($stmt2,$nome_livro);
while(mysqli_stmt_fetch($stmt2)){
    $arquivo = 'modificacoes.txt';
    $fp = fopen($arquivo, "a+");
    fwrite($fp, "O livro \"$nome_livro\" foi emprestrado. \n");
    fclose($fp);
}

header("Location: bibliotecario.php");

?>