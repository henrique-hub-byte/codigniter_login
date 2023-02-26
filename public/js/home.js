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
                tableHtml += '</tr>';
            });
            $('#lista-usuarios').html(tableHtml);
        }
    });
});