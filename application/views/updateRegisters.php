<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="/public/css/main.css">
    <link rel="stylesheet" href="/public/css/register.css">
    <title>Atualizando registros</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="<?php echo base_url('public/js/updateRegisters.js'); ?>"></script>
</head>
<body>
    <h1>Atualizando registros</h1>
    <form id="form-update" data-id="<?php echo $register[0]->id; ?>" method="POST">
        <input type="hidden" name="id" value="<?php echo $register[0]->id; ?>"> <!-- campo oculto para armazenar o ID do registro -->
        <label for="nome">Nome:</label>
        <input type="text" name="nome" value="<?php echo $register[0]->nome; ?>" required>
        <br>
        <label for="email">Email:</label>
        <input type="email" name="email" value="<?php echo $register[0]->email; ?>" required>
        <br>
        <label for="telefone">Telefone:</label>
        <input type="text" name="telefone" value="<?php echo $register[0]->telefone; ?>" required>
        <br>
        <label for="senha">Senha:</label>
        <input type="password" name="senha" value="" required>
        <br>
        <input type="submit" value="Atualizar">
    </form>
</body>

</html>
