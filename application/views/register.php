<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="/public/css/main.css">
    <link rel="stylesheet" href="/public/css/register.css">
    <title>Cadastro</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="<?php echo base_url('public/js/register.js'); ?>"></script>
</head>

<body>
    <h1>criando a conta</h1>
    <form id="form-register" method="POST">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" required></input>
        <br>
        <label for="email">Email:</label>
        <input type="email" name="email" required></input>
        <br>
        <label for="telefone">Telefone:</label>
        <input type="text" name="Telefone" required></input>
        <br>
        <label for="senha">Senha:</label>
        <input type="password" name="senha" required></input>
        <br>
        <input type="submit" value="Cadastrar">
        <br>
        <?php echo anchor('login', 'Já tem uma conta? Crie aqui para logar', array('class' => 'my-class')); ?>

    </form>
    

</body>

</html>