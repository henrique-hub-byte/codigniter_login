<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#form-login').submit(function(e){
                e.preventDefault();
                $.ajax({
                    type: 'POST',
                    url: "http://localhost/codeigniter3_0/index.php/login/logar",
                    data: $('#form-login').serialize(),
                    dataType: 'json',
                    success: function(data) {
                        if (data.status == 'success') {
                            alert(data.mensagem);
                        } else {
                            alert(data.mensagem);
                        }
                    },
                    error: function() {
                        alert('Ocorreu um erro ao processar sua solicitação');
                    }
                });
            });
        });
    </script>
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
</body>        
</html>