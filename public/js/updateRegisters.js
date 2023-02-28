/* $(document).on('submit', '#form-update', function(e) {
    e.preventDefault();
    var nome = $('#nome').val();
    var email = $('#email').val();
    var telefone = $('#telefone').val();
    var senha = $('#senha').val();
    var id = $(this).data('id');
    var dados = {
        nome: nome,
        email: email,
        telefone: telefone,
        senha: senha
    };
    console.log("antes do ajax")
    $.ajax({
        url: 'http://localhost:8000/Register/atualizar_registro/' + id,
        type: 'POST',
        dataType: 'json',
        data: JSON.stringify(dados),
        success: function(data) {
            console.log("dentro do success")
            if (data.success) {
                alert('Registro atualizado com sucesso!');
                window.location.href = 'http://localhost:8000/Home';
            } else {
                console.log("error")
                alert('Erro ao atualizar registro!');
            }
        }
    });
    console.log("fora do ajax")
});
 */
$(document).ready(function() {
    var id = $('#form-update').data('id');
    $.ajax({
        url: 'http://localhost:8000/Register/carregar_registro/' + id,
        dataType: 'json',
        success: function(data) {
            $('input[name="id"]').val(data.id);
            $('input[name="nome"]').val(data.nome);
            $('input[name="email"]').val(data.email);
            $('input[name="telefone"]').val(data.telefone);
            $('input[name="senha"]').val(data.senha);
        }
    });
});