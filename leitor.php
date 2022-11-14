
<?php
//Include database config file
    require_once 'dbConfig.php';

//Get image data from database
    $sql = "SELECT img FROM livros ORDER BY id_livro DESC";
    $result = $db->query($sql);
//Authentication Session
    session_start();  
    if(!isset($_SESSION["sess_user"]))
    {
        header("location:login.php");  
    } else {  
?>  
<!doctype html>  
<html>  
<head>  
    <title>Área do Leitor</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>  
<body>  
    <h2>Bem vindo, <?=ucfirst($_SESSION['sess_user']);?>!</h2><br>

    <a href="logout.php">Deslogar</a>

    <div class="container">
        <h1>Teste recebimento de imagens Database usando PHP</h1>

        <div class="galeria">
            <?php if($result->num_rows > 0){ ?>
            <div class="img-box">
                <?php while($row = $result->fetch_assoc()){ ?>
                <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['img']); ?>"/>
                <?php } ?>
            </div>
            <?php }else { ?>
            <p>Imagens nao encontradas</p>
            <?php } ?>
        </div>
        </div>



</body>  
</html>  
<?php  
    }  
?>  
