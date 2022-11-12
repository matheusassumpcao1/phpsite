<!doctype html>  
<html>  
<head>  
    <title>Registro</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>  
<body>   
    <center><h1>Bem vindo a numseiquela</h1></center>
    <p>
        <a href="register.php">
            Registrar
        </a>
        | 
        <a href="login.php">
            Login
        </a>
    </p>  

    <center><h2>Formulario de Registro</h2></center>  

    <form action="" method="POST">  
        <!--<legend>-->  
        <fieldset>   
            Usuario:<input type="text" name="user"><br/>  
            Senha:<input type="password" name="pass" class="input"><br/>
            Tipo de usuário: <select name="tipo">
                <option value="aluno">Aluno</option>
                <option value="professor">Professor</option>
                <option value="adm">Administrador</option>
            </select><br>
            <input type="submit" value="Registrar-se" name="submit" />     
        </fieldset>  
        <!--</legend>-->  
</form>
<?php  
    if(isset($_POST["submit"])){  
        if(!empty($_POST['user']) && !empty($_POST['pass'])) 
        {  
            $user=$_POST['user'];  
            $pass=$_POST['pass'];  
            $con=mysqli_connect('localhost','root','') or die(mysql_error());  
            mysqli_select_db($con ,'user_registration') or die("cannot select DB");  
            $query=mysqli_query($con, "SELECT * FROM login WHERE username='".$user."'");  
            $numrows=mysqli_num_rows($query);  
            if($numrows==0)  
            {  
                $sql="INSERT INTO login(username,password) VALUES('$user','$pass')";  
            
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
?>   
</body>  
</html>