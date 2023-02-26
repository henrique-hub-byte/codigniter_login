$(document).ready(function () {
  $("#form-login").submit(function (e) {
    e.preventDefault();
    $.ajax({
      type: "POST",
      url: "http://localhost:8000/Login/logar",
      data: $("#form-login").serialize(),
      dataType: "json",
      success: function (data) {
        console.log("-----------------");
        console.log(JSON.stringify(data));
        console.log("------------------");
        if (data.status == "success") {
          console.log(data.mensagem);
          window.location.replace(data.redirect_url);
        } else {
          SpeechRecognitionAlternative.log(data.mensagem);
        }
      },
      error: function (jqXHR, textStatus, errorThrown) {
        console.log(jqXHR.responseText);
        console.log(textStatus);
        console.log(errorThrown);
        alert("Ocorreu um erro ao processar sua solicitação");
      },
    });
  });
});
