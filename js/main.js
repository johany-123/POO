$(document).ready(function () {

    $("#loginForm").submit(function (event) {
      event.preventDefault();
  
      // Obtener los valores de los campos de entrada
      var username = $.trim($('input[name="username"]').val()); // Eliminar espacios en blanco al inicio y al final
      var password = $.trim($('input[name="password"]').val());
       //console.log("console trim", "user", username, " pas", password);
  
    
        // Sanitizar datos antes de enviarlos (opcional, solo como precaución adicional)
        password = encodeURIComponent(password);
  
        loginUser(username,password)
  
  
    });
  });
  
  
  
  
  
  function loginUser(username, password) {
  
      
      $.ajax({
        url: "./backend/login.php",
        method: "POST",
        data: { username: username, password: password },
        dataType: "json",
        success: function (response) {
          console.log("REspuesta nuevo user");
          console.log(response);
    
          if (response.status === "success") {
            window.location.href = "./views/home.php";
          } else if (response.status === "error") {
            if (response.message === "El usuario está inactivo") {
              // Usuario inactivo
            } else {
              // Credenciales inválidas u otro error
              console.log("Error: " + response.message);
              $('input[name="username"]').val("");
              $('input[name="password"]').val("");
            }
          } else {
            console.log("Otro error");
            $("#result").html("<p>Error in AJAX call</p>");
          }
        },
      });
    }

