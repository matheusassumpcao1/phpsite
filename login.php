<!doctype html>
<html>  
<head>  
  <title>Login</title>
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

  <center><h2>Login</h2></center>
  
  <form action="" method="POST">
    <fieldset>
      Usuario:<input type="text" name="user"> <br/>  
      Senha:<input type="password" name="pass" class="input"> <br/>   
      <input type="submit" value="Logar" name="submit"/>
    </fieldset> 
  </form>
  <?php  
    if(isset($_POST["submit"])){  
      
        if(!empty($_POST['user']) && !empty($_POST['pass'])) {  
            $user=$_POST['user'];  
            $pass=$_POST['pass'];  
        
            //Funcoes de inicializacao
            $con=mysqli_connect('localhost','root','') or die(mysql_error());  
            mysqli_select_db($con, 'user_registration') or die("cannot select DB");  
        
            $query=mysqli_query($con, "SELECT * FROM login WHERE username='".$user."' AND password='".$pass."'");  
            $numrows=mysqli_num_rows($query);  
            if($numrows!=0)  
            {  
                while($row=mysqli_fetch_assoc($query))  
                {  
                    $dbusername=$row['username'];  
                    $dbpassword=$row['password'];  
                }  
        
                if($user == $dbusername && $pass == $dbpassword)  
                {  
                    session_start();  
                    $_SESSION['sess_user']=$user;  
        
                    /* Redireciona o browser */  
                    header("Location: member.php");  
                }  
            } else {  
                echo "Usuario ou senha invalido(s)";
            }  
        
        } else {  
            echo "Preencha todos os campos.";  
        }  
    }  
    ?>
  </body>  
  </html>   
