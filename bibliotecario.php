<?php   
    session_start();  
    if(!isset($_SESSION["sess_user"]))
    {
        header("location:login.php");  
    } else {  
?>  
<!doctype html>  
<html>  
<head>  
    <title>Área do Bibliotecario</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>  
<body>   
    <h2>Bem vindo, <?=ucfirst($_SESSION['sess_user']);?>!</h2><br>
    <a href="logout.php">Deslogar</a>
    <div class="container">
        <h1>Livros disponiveis</h1>

        <div>
            <?php include 'tabelaBibliotecario.php'; ?>
        </div>
	</div> 
</body>  
</html>  
<?php  
    }  
?>  
