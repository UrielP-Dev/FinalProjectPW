$(document).ready(function() {
    $("#login-form").on('submit', function(event) {

        event.preventDefault(); // Prevent the form from submitting

        // Definition of the alert to show error messages
        const errorAlert = $('#error-alert');
        const errorContainer = $('#error-container');

        // Definition of the alert to show error messages
        const successAlert = $('#success-alert');
        const succesContainer = $('#success-container');

        const showErrorMessage = (msg) => {
            succesContainer.hide();
            errorContainer.show();
            errorAlert.text(msg);
        }
        
        const showSuccessMessage = (msg) => {
            errorContainer.hide();
            succesContainer.show();
            successAlert.text(msg);
        }

        // Check if email is empty or password has the correct length
        const email = $('#user-email').val().trim();
        const password = $('#password').val();
        const loginAsAdmin = $('#admin-login').is(':checked');

        if (email === '') {
            showErrorMessage('El correo electronico no puede estar vacio');
            return;
        }

        if (!validateEmail(email)) {
            showErrorMessage('El correo electronico proporcionado no es valido');
            return;
        }

        if (password.length < 8) {
            showErrorMessage('La contraseña debe de contener al menos 8 caracteres');
            return;
        } 

        // Implementation of POST request with ajax
        $.ajax({
            type: 'POST',
            url: '../Access/Login_Process.php',
            data: {
                'user-email': email,
                'password': password,
                'admin-login': loginAsAdmin
            },
            success: function(response) {
                if (response.status === 1) {
                    showErrorMessage(response.message);
                    return;
                }

                showSuccessMessage('Usted sera redirigido a la pagina principal en unos momentos.');
                
                if (loginAsAdmin) {
                    setTimeout(function() {
                        window.location.href = '../Home/HomeAdmin.php';
                    }, 3000);
                } else {
                    setTimeout(function() {
                        window.location.href = '../Home/HomeClient.php';
                    }, 3000);
                    
                }
            },
            error: function(xhr, status, message) {
                showErrorMessage('Ocurrio un error con la conexion al servidor. ' + message);
            }
        });

    });
});

const validateEmail = (email) => {
    return String(email)
      .toLowerCase()
      .match(
        /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|.(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
      );
  };