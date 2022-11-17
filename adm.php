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
    <title>Area do Administrador</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>  
<body>
    
    <center><h2>Area do Administrador</h2></center>  
    <center><h2>Registro de novos Usuários</h2></center>  

    <a href="logout.php">Deslogar</a>


    <form action="" method="POST">  
        <!--<legend>-->  
        <fieldset>   
            Usuario:<input type="text" name="user"><br/>  
            Senha:<input type="password" name="pass" class="input"><br/>
            Tipo de usuário: <select name="tipo">
                <option value="leitor">Leitor</option>
                <option value="bibliotecario">Bibliotecario</option>
                <option value="adm">Administrador</option>
            </select><br>
            <input type="submit" value="Registrar-se" name="submit" />     
        </fieldset>  
        <!--</legend>-->  
</form>
<?php  
    if(isset($_POST["submit"])){  
        if(!empty($_POST['user']) && !empty($_POST['pass']) && !empty($_POST['tipo'])) 
        {  
            $user=$_POST['user'];  
            $pass=$_POST['pass'];
            $tipo=$_POST['tipo']; 
            $con=mysqli_connect('localhost','root','') or die(mysql_error());  
            mysqli_select_db($con ,'user_registration') or die("cannot select DB");  
            $query=mysqli_query($con, "SELECT * FROM login WHERE username='".$user."'");  
            $numrows=mysqli_num_rows($query);  
            if($numrows==0)  
            {  
                $sql="INSERT INTO login(username,password,tipo) VALUES('$user','$pass','$tipo')";  
            
                $result=mysqli_query($con ,$sql);  
                    if($result)
                    {  
                        echo "Conta criada com sucesso!";  
                    } else {  
                        echo "Failure!";  
                    }  
            
            } else {  
                echo "Esse usuario já existe.";  
            }  
        
        } else {  
            echo "Preencha todos os campos.";  
        }  
    }
}    
?>   
</body>  
</html>