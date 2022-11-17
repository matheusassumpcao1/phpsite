<?php
include 'dbConfig.php';

$livro_selecionado = $_POST["id_livro"];

$stmt = mysqli_prepare($db, "UPDATE livros SET emprestado='0' WHERE id_livro=?");

mysqli_stmt_bind_param($stmt,"i",$livro_selecionado);

mysqli_stmt_execute($stmt);

header("Location: bibliotecario.php");