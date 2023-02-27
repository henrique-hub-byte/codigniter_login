$(document).ready(function() {
    $.ajax({
        url: 'http://localhost:8000/Home/lista_registros',
        dataType: 'json',
        success: function(data) {
            var tableHtml = '';
            $.each(data, function(index, value) {
                tableHtml += '<tr>';
                tableHtml += '<td>' + value.id + '</td>';
                tableHtml += '<td>' + value.nome + '</td>';
                tableHtml += '<td>' + value.email + '</td>';
                tableHtml += '<td>' + value.telefone + '</td>';
                tableHtml += '<td><button class="btn-editar" data-id="' + value.id + '">Editar</button></td>';
                tableHtml += '<td><button class="btn-deletar" data-id="' + value.id + '">Deletar</button></td>';
                tableHtml += '</tr>';
            });
            $('#lista-usuarios').html(tableHtml);
        }
    });
});

$(document).on('click', '.btn-editar', function() {
    var id = $(this).data('id');
    // redireciona para a página de edição com o ID do registro
    window.location.href = 'http://localhost:8000/Register/carregar_registro/' + id;
});

$(document).on('click', '.btn-deletar', function() {
    var id = $(this).data('id');
    // exibe uma confirmação antes de deletar o registro
    if (confirm('Tem certeza que deseja deletar esse registro?')) {
        $.ajax({
            url: 'http://localhost:8000/Home/deletar_registro/' + id,
            dataType: 'json',
            success: function(data) {
                // recarrega a tabela após deletar o registro
                window.location.reload();
            }
        });
    }
});