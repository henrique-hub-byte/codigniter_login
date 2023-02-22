<!DOCTYPE html>
<html>

<head>
    <title>Cadastro</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#form-login').submit(function(e) {
                e.preventDefault();
                $.ajax({
                    type: 'POST',
                    url: "http://localhost:8000/Register/registrar",
                    data: $('#form-login').serialize(),
                    dataType: 'json',
                    success: function(data) {
                        console.log('-----------------');
                        console.log(JSON.stringify(data));
                        console.log('------------------');
                        if (data.status == 'success') {
                            alert(data.mensagem);
                        } else {
                            alert(data.mensagem);
                        }
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.log(jqXHR.responseText);
                        console.log(textStatus);
                        console.log(errorThrown);
                        alert('Ocorreu um erro ao processar sua solicitação');
                    }
                });
            });
        });
    </script>
</head>

<body>
    <h1>criando a conta</h1>
    <form id="form-login" method="POST">
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
    </form>
    <?php echo anchor('login', 'Já tem uma conta? Crie aqui para logar'); ?>

</body>

</html>