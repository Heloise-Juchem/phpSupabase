<?php
    $mensagem= ""; 
    $tipoMensagem= "";
    $host= "aws-1-sa-east-1.pooler.supabase.com";
    $port= "6543";
    $database = "postgres";
    $user= "postgres.aqhrvgkxcwghinpmdkwp";
    $password= "123helo@Helo";

try{
    $dsn ="pgsql:host=$host;port=$port;dbname=$database;sslmode=require";
    $pdo = new PDO($dsn, $user, $password);
    $mensagem = "Conectado com sucesso!";
    $tipoMensagem = "Sucesso!";
}catch(PDOException $e){
    die("Erro ao conectar no Supabase: " . $e->getMessage());
    $mensagem = "Falha ao conectar ao Supabase! ";

    $tipoMensagem ="Erro!";
}

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        $sql = "SELECT email,senha FROM cadastro WHERE email = :email";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
         ':email' => $email
        ]);
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
        if($usuario['senha'] == $senha){
            header('Location: dashboard.php');
            exit;
        }else{
            $mensagem = "Usuário ou senha incoreto!";
            $tipoMensagem = "Erro!";
        }
    }
?>



<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Login</title>
</head>
<body>
    <h1>Login</h1>
    <form method="post" action="">
        <label for="email">Email</label>
        <input type="email" id="email" name="email"><br/>
        <label for="senha">Senha</label>
        <input type="passaword" id="senha" name="senha"><br/>
        <input type="submit" values="Entrar"><br/>
        <input type="reset" values="limpar"><br/>
        <a href="cadastro.php">Novo por aqui? Cadastre-se</a>
    </form>    
</body>
</html>