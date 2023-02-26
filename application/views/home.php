<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="/public/css/main.css">
    <link rel="stylesheet" href="/public/css/home.css">
    <title>Home</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="<?php echo base_url('public/js/home.js'); ?>"></script>
</head>

<body>
    <h1>criando a conta</h1>
    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th>Nome</th>
                <th>Email:</th>
                <th>Telefone</th>
            </tr>
        </thead>
        <tbody id="lista-usuarios"></tbody>
    </table>
</body>

</html>
