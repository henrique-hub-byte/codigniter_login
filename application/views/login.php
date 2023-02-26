<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="/public/css/login.css">
    <link rel="stylesheet" href="/public/css/main.css">
    <title>Login</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="<?php echo base_url('public/js/login.js'); ?>"></script>
</head>

<body>
    <h1>Login</h1>
    <form id="form-login" method="POST">
        <label for="email">Email:</label>
        <input type="email" name="email" required></input>
        <br>
        <label for="senha">Senha:</label>
        <input type="password" name="senha" required></input>
        <br>
        <input type="submit" value="Entrar">
    </form>
    <?php echo anchor('register', 'Ainda não tem uma conta? Crie aqui'); ?>

</body>

</html>