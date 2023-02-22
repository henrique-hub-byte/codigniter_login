<!DOCTYPE html>
<html>

<head>
    <title>Home</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $.ajax({
                url: '<?php echo base_url('getRegisters'); ?>',
                dataType: 'json',
                success: function(data) {
                    var tableHtml = '';
                    $.each(data, function(index, value) {
                        tableHtml += '<tr>';
                        tableHtml += '<td>' + value.id + '</td>';
                        tableHtml += '<td>' + value.nome + '</td>';
                        tableHtml += '<td>' + value.email + '</td>';
                        tableHtml += '<td>' + value.telefone + '</td>';
                        tableHtml += '</tr>';
                    });
                    $('#lista-usuarios').html(tableHtml);
                }
            });
        });
    </script>
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
