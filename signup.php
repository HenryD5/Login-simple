<?php require_once 'database.php' ;

$message='';
 

if (!empty($_POST['email']) && !empty($_POST['password'])) {
    $consulta = "INSERT INTO users(email, clave) VALUES(?,?)";
    $email = $_POST['email'];
    $pass= $_POST['password'];
    $sentencia = $oConex ->prepare($consulta);
    $password = password_hash($pass, PASSWORD_BCRYPT);
    $resultado = $sentencia -> execute ([$email, $password]);
    
    if($resultado === true){
        $message = 'Successfully created new user';
      } else {
        $message = 'Sorry there must have been an issue creating your account';
      }
    
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/styles.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
</head>
<body>
<?php require 'partials/header.php' ?>

<?php if(!empty($message)): ?>
<p><?= $message?></p>
<?php endif;?>

    <h1>Signup</h1>
    <span><a href="login.php">or Login</a></span>
    <form action="signup.php" method="post">
    <input type="text" name="email" value="" placeholder="Enter your email">
    <input type="password" name="password" placeholder ="Enter your password">
    <input type="password" name="confirm_password" placeholder ="Confirm your password">
    <input type="submit"value="Send">
    </form>
</body>
</html>